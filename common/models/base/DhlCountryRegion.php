<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "dhl_country_region".
 *
 * @property string $code
 * @property string $code_alias
 * @property string $supported_as_origin
 * @property string $region_code_in_xml_services_level
 * @property string $name
 * @property string $iso_currency_code_name
 * @property string $unit_weight
 * @property string $unit_dimension
 * @property string $location_type_code
 * @property string $division_type_code_desc
 */
class DhlCountryRegion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dhl_country_region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'code_alias', 'supported_as_origin', 'region_code_in_xml_services_level', 'name', 'iso_currency_code_name', 'unit_weight', 'unit_dimension', 'location_type_code', 'division_type_code_desc'], 'required'],
            [['code', 'code_alias', 'region_code_in_xml_services_level'], 'string', 'max' => 3],
            [['supported_as_origin'], 'string', 'max' => 1],
            [['name'], 'string', 'max' => 255],
            [['iso_currency_code_name', 'location_type_code', 'division_type_code_desc'], 'string', 'max' => 100],
            [['unit_weight', 'unit_dimension'], 'string', 'max' => 10],
            [['code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'code_alias' => 'Code Alias',
            'supported_as_origin' => 'Supported As Origin',
            'region_code_in_xml_services_level' => 'Region Code In Xml Services Level',
            'name' => 'Name',
            'iso_currency_code_name' => 'Iso Currency Code Name',
            'unit_weight' => 'Unit Weight',
            'unit_dimension' => 'Unit Dimension',
            'location_type_code' => 'Location Type Code',
            'division_type_code_desc' => 'Division Type Code Desc',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\DhlCountryRegionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\DhlCountryRegionQuery(get_called_class());
    }
}
