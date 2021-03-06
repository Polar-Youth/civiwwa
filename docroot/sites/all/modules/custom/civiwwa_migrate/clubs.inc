<?php
/*
  civiwwa_migrate - Migrations for CivIWWA.
  Copyright (C) 2016  Johan Vervloet

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

/**
 * Created by PhpStorm.
 * User: johanv
 * Date: 12/23/16
 * Time: 11:03 AM
 */
class clubsMigration extends Civimigration {
  protected $entity = 'contact';

  public function __construct(array $arguments) {
    parent::__construct($arguments);
    $this->description = t('Import clubs');

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
      DRUPAL_ROOT . '/' . drupal_get_path('module', 'civiwwa_migrate') . '/data_sources/import.csv',
      $columns);

    // Mapping source and destination.
    $this->map = new MigrateSQLMap($this->machineName,
      // Source keys
      [
        'club' => [ 'type' => 'varchar', 'length' => 255, 'not null' => FALSE ],
      ]
      // Corresponding destination keys
      , MigrateDestinationCivicrmApi::getKeySchema()
    );

    $this->addFieldMapping('organization_name', 'club');
    $this->addFieldMapping('contact_type')->defaultValue('Organization');
    $this->addFieldMapping('contact_sub_type')->defaultValue('Club');
  }

  public function prepareRow($row) {
    if (!parent::prepareRow($row)) {
      return FALSE;
    }
    $clubsToIgnore = [
      '',
      '***',
      '-',
    ];
    if (in_array($row->club, $clubsToIgnore)) {
      return FALSE;
    }
    return TRUE;
  }
}