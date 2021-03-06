<?php
/*
  civiwwa_migrate - Migrations for CivIWWA.
  Copyright (C) 2017  Johan Vervloet

  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU Affero General Public License as
  published by the Free Software Foundation, either version 3 of the
  License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU Affero General Public License for more details.

  You should have received a copy of the GNU Affero General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

class participantsMigration extends CiviMigration {
  protected $entity = 'participant';

  public function getSourceFile() {
    return 'import.csv';
  }

  public function __construct($arguments) {
    parent::__construct($arguments);
    civicrm_initialize();
    $this->description = t('Import participants.');

    $columns = [
      ['row_number', t('Row Number')],
      ['registration_date', t('Registration Date')],
      ['last_name', t('Last Name')],
      ['first_name', t('First Name')],
      ['email', t('Email')],
      ['state_province', t('State/Province')],
      ['postal_code', t('Postal Code')],
      ['city', t('City')],
      ['country', t('Country')],
      ['birth_date', t('Birth Date')],
      ['gender', t('Gender')],
      ['color', t('Color')],
      ['club', t('Club')],
      ['event_id', t('Event ID')],
    ];

    $this->source = new MigrateSourceCSV(
      DRUPAL_ROOT . '/' . drupal_get_path('module', 'civiwwa_migrate') . '/data_sources/' . $this->getSourceFile(),
      $columns);

    // Mapping source and destination.
    $this->map = new MigrateSQLMap($this->machineName,
      // Source keys (unique identification of participant)
      [
        'last_name' => [
          'type' => 'varchar',
          'length' => 255,
          'not null' => FALSE
        ],
        'first_name' => [
          'type' => 'varchar',
          'length' => 255,
          'not null' => FALSE
        ],
        'event_id' => ['type' => 'int', 'not null' => TRUE],
      ]
      // Corresponding destination keys
      , MigrateDestinationCivicrmApi::getKeySchema()
    );

    $this->addFieldMapping('contact_id', 'constructed_key')
      ->sourceMigration('people');
    // Event ID
    $this->addFieldMapping('event_id', 'event_id');
    // Registration date
    $this->addFieldMapping('register_date', 'registration_date');
    // Participated
    $this->addFieldMapping('participant_status_id')->defaultValue('2');
    // Participant
    $this->addFieldMapping('participant_role_id')->defaultValue('1');
    // Source
    $this->addFieldMapping('source')->defaultValue('Import from score board.');
  }

  public function prepareRow($row) {
    if (parent::prepareRow($row) === FALSE) {
      return FALSE;
    }
    // Some participants have first name and last name in the name field.
    // Workaround.
    if (empty($row->first_name)) {
      $words = explode(' ', $row->last_name);
      $row->first_name = $words[0];
      array_shift($words);
      $row->last_name = implode(' ', $words);
    }
    if (!empty($row->birth_date)) {
      $myDateTime = DateTime::createFromFormat('d/m/Y', $row->birth_date);
      if ($myDateTime) $row->birth_date = $myDateTime->format('Y-m-d');
    }
    if (!empty($row->registration_date)) {
      $myDateTime = DateTime::createFromFormat('d/m/Y', $row->registration_date);
      if ($myDateTime) $row->registration_date = $myDateTime->format('Y-m-d');
    }
    $row->constructed_key = [[$row->last_name, $row->first_name]];
    return TRUE;
  }

  public function prepare(&$entity, &$row) {
    // prevent contact_id from existing event from being overwritten.
    if (!empty($entity->id)) {
      $existingParticipant = civicrm_api3('Participant', 'getsingle', ['id' => $entity->id]);
      $entity->contact_id = $existingParticipant['contact_id'];
    }
  }
}
