<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "cities_lang".
 *
 * @property int $id
 * @property int $city__id
 * @property string $lang
 * @property string $name
 * @property string $title
 * @property int|null $city__city_id
 * @property int|null $city__region_id
 * @property int|null $city__country_id
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class CitiesLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cities_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city__id', 'lang', 'name', 'title'], 'required'],
            [['city__id', 'city__city_id', 'city__region_id', 'city__country_id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 1000],
            [['title', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['city__id', 'lang'], 'unique', 'targetAttribute' => ['city__id', 'lang']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city__id' => 'City  ID',
            'lang' => 'Lang',
            'name' => 'Name',
            'title' => 'Title',
            'city__city_id' => 'City  City ID',
            'city__region_id' => 'City  Region ID',
            'city__country_id' => 'City  Country ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'created_ip' => 'Created Ip',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\CitiesLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CitiesLangQuery(get_called_class());
    }
}
