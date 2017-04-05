<?php
/*
+--------------------------------------------------------------------+
| CiviCRM version 4.7                                                |
+--------------------------------------------------------------------+
| Copyright CiviCRM LLC (c) 2004-2017                                |
+--------------------------------------------------------------------+
| This file is a part of CiviCRM.                                    |
|                                                                    |
| CiviCRM is free software; you can copy, modify, and distribute it  |
| under the terms of the GNU Affero General Public License           |
| Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
|                                                                    |
| CiviCRM is distributed in the hope that it will be useful, but     |
| WITHOUT ANY WARRANTY; without even the implied warranty of         |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
| See the GNU Affero General Public License for more details.        |
|                                                                    |
| You should have received a copy of the GNU Affero General Public   |
| License and the CiviCRM Licensing Exception along                  |
| with this program; if not, contact CiviCRM LLC                     |
| at info[AT]civicrm[DOT]org. If you have questions about the        |
| GNU Affero General Public License or the licensing of CiviCRM,     |
| see the CiviCRM license FAQ at http://civicrm.org/licensing        |
+--------------------------------------------------------------------+
*/
/**
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2017
 *
 * Generated from xml/schema/CRM/Price/PriceFieldValue.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:f0ace0187969a76ff45c62032e8303a2)
 */
require_once 'CRM/Core/DAO.php';
require_once 'CRM/Utils/Type.php';
/**
 * CRM_Price_DAO_PriceFieldValue constructor.
 */
class CRM_Price_DAO_PriceFieldValue extends CRM_Core_DAO {
  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  static $_tableName = 'civicrm_price_field_value';
  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var boolean
   */
  static $_log = false;
  /**
   * Price Field Value
   *
   * @var int unsigned
   */
  public $id;
  /**
   * FK to civicrm_price_field
   *
   * @var int unsigned
   */
  public $price_field_id;
  /**
   * Price field option name
   *
   * @var string
   */
  public $name;
  /**
   * Price field option label
   *
   * @var string
   */
  public $label;
  /**
   * >Price field option description.
   *
   * @var text
   */
  public $description;
  /**
   * Price field option pre help text.
   *
   * @var text
   */
  public $help_pre;
  /**
   * Price field option post field help.
   *
   * @var text
   */
  public $help_post;
  /**
   * Price field option amount
   *
   * @var string
   */
  public $amount;
  /**
   * Number of participants per field option
   *
   * @var int unsigned
   */
  public $count;
  /**
   * Max number of participants per field options
   *
   * @var int unsigned
   */
  public $max_value;
  /**
   * Order in which the field options should appear
   *
   * @var int
   */
  public $weight;
  /**
   * FK to Membership Type
   *
   * @var int unsigned
   */
  public $membership_type_id;
  /**
   * Number of terms for this membership
   *
   * @var int unsigned
   */
  public $membership_num_terms;
  /**
   * Is this default price field option
   *
   * @var boolean
   */
  public $is_default;
  /**
   * Is this price field value active
   *
   * @var boolean
   */
  public $is_active;
  /**
   * FK to Financial Type.
   *
   * @var int unsigned
   */
  public $financial_type_id;
  /**
   * Portion of total amount which is NOT tax deductible.
   *
   * @var float
   */
  public $non_deductible_amount;
  /**
   * Class constructor.
   */
  function __construct() {
    $this->__table = 'civicrm_price_field_value';
    parent::__construct();
  }
  /**
   * Returns foreign keys and entity references.
   *
   * @return array
   *   [CRM_Core_Reference_Interface]
   */
  static function getReferenceColumns() {
    if (!isset(Civi::$statics[__CLASS__]['links'])) {
      Civi::$statics[__CLASS__]['links'] = static ::createReferenceColumns(__CLASS__);
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName() , 'price_field_id', 'civicrm_price_field', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName() , 'membership_type_id', 'civicrm_membership_type', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName() , 'financial_type_id', 'civicrm_financial_type', 'id');
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'links_callback', Civi::$statics[__CLASS__]['links']);
    }
    return Civi::$statics[__CLASS__]['links'];
  }
  /**
   * Returns all the column names of this table
   *
   * @return array
   */
  static function &fields() {
    if (!isset(Civi::$statics[__CLASS__]['fields'])) {
      Civi::$statics[__CLASS__]['fields'] = array(
        'id' => array(
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Price Field Value ID') ,
          'description' => 'Price Field Value',
          'required' => true,
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
        ) ,
        'price_field_id' => array(
          'name' => 'price_field_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Price Field') ,
          'description' => 'FK to civicrm_price_field',
          'required' => true,
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'FKClassName' => 'CRM_Price_DAO_PriceField',
        ) ,
        'name' => array(
          'name' => 'name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Name') ,
          'description' => 'Price field option name',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'label' => array(
          'name' => 'label',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Label') ,
          'description' => 'Price field option label',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'description' => array(
          'name' => 'description',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Description') ,
          'description' => '>Price field option description.',
          'rows' => 2,
          'cols' => 60,
          'default' => 'NULL',
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'html' => array(
            'type' => 'TextArea',
          ) ,
        ) ,
        'help_pre' => array(
          'name' => 'help_pre',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Help Pre') ,
          'description' => 'Price field option pre help text.',
          'rows' => 2,
          'cols' => 60,
          'default' => 'NULL',
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'html' => array(
            'type' => 'TextArea',
          ) ,
        ) ,
        'help_post' => array(
          'name' => 'help_post',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Help Post') ,
          'description' => 'Price field option post field help.',
          'rows' => 2,
          'cols' => 60,
          'default' => 'NULL',
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'html' => array(
            'type' => 'TextArea',
          ) ,
        ) ,
        'amount' => array(
          'name' => 'amount',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Amount') ,
          'description' => 'Price field option amount',
          'required' => true,
          'maxlength' => 512,
          'size' => 8,
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'count' => array(
          'name' => 'count',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Count') ,
          'description' => 'Number of participants per field option',
          'default' => 'NULL',
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'max_value' => array(
          'name' => 'max_value',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Max Value') ,
          'description' => 'Max number of participants per field options',
          'default' => 'NULL',
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'weight' => array(
          'name' => 'weight',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Order') ,
          'description' => 'Order in which the field options should appear',
          'default' => '1',
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'membership_type_id' => array(
          'name' => 'membership_type_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Membership Type') ,
          'description' => 'FK to Membership Type',
          'default' => 'NULL',
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'FKClassName' => 'CRM_Member_DAO_MembershipType',
          'html' => array(
            'type' => 'Select',
          ) ,
        ) ,
        'membership_num_terms' => array(
          'name' => 'membership_num_terms',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Membership Num Terms') ,
          'description' => 'Number of terms for this membership',
          'default' => 'NULL',
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'is_default' => array(
          'name' => 'is_default',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Is Default Price Field Option?') ,
          'description' => 'Is this default price field option',
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'html' => array(
            'type' => 'CheckBox',
          ) ,
        ) ,
        'is_active' => array(
          'name' => 'is_active',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Price Field Value is Active') ,
          'description' => 'Is this price field value active',
          'default' => '1',
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
        ) ,
        'financial_type_id' => array(
          'name' => 'financial_type_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Financial Type') ,
          'description' => 'FK to Financial Type.',
          'default' => 'NULL',
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'FKClassName' => 'CRM_Financial_DAO_FinancialType',
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'table' => 'civicrm_financial_type',
            'keyColumn' => 'id',
            'labelColumn' => 'name',
          )
        ) ,
        'non_deductible_amount' => array(
          'name' => 'non_deductible_amount',
          'type' => CRM_Utils_Type::T_MONEY,
          'title' => ts('Non-deductible Amount') ,
          'description' => 'Portion of total amount which is NOT tax deductible.',
          'required' => true,
          'precision' => array(
            20,
            2
          ) ,
          'default' => '0.0',
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
      );
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'fields_callback', Civi::$statics[__CLASS__]['fields']);
    }
    return Civi::$statics[__CLASS__]['fields'];
  }
  /**
   * Return a mapping from field-name to the corresponding key (as used in fields()).
   *
   * @return array
   *   Array(string $name => string $uniqueName).
   */
  static function &fieldKeys() {
    if (!isset(Civi::$statics[__CLASS__]['fieldKeys'])) {
      Civi::$statics[__CLASS__]['fieldKeys'] = array_flip(CRM_Utils_Array::collect('name', self::fields()));
    }
    return Civi::$statics[__CLASS__]['fieldKeys'];
  }
  /**
   * Returns the names of this table
   *
   * @return string
   */
  static function getTableName() {
    return CRM_Core_DAO::getLocaleTableName(self::$_tableName);
  }
  /**
   * Returns if this table needs to be logged
   *
   * @return boolean
   */
  function getLog() {
    return self::$_log;
  }
  /**
   * Returns the list of fields that can be imported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &import($prefix = false) {
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'price_field_value', $prefix, array());
    return $r;
  }
  /**
   * Returns the list of fields that can be exported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &export($prefix = false) {
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'price_field_value', $prefix, array());
    return $r;
  }
}
