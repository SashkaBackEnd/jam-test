<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "war_warehouse_lang".
 *
 * @property int $id
 * @property string|null $lang ru en
 * @property int|null $war_warehouse__id
 * @property string|null $name Название склада
 * @property string|null $adress
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class WarWarehouseLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'war_warehouse_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['war_warehouse__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 60],
            [['adress'], 'string', 'max' => 255],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lang' => 'Lang',
            'war_warehouse__id' => 'War Warehouse  ID',
            'name' => 'Name',
            'adress' => 'Adress',
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
     * @return \common\models\base\query\WarWarehouseLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\WarWarehouseLangQuery(get_called_class());
    }
}
