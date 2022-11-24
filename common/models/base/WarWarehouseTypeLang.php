<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "war_warehouse_type_lang".
 *
 * @property int $id
 * @property string|null $lang ru en
 * @property string|null $description
 * @property int|null $war_warehouse_type__id
 * @property string|null $name
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class WarWarehouseTypeLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'war_warehouse_type_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['war_warehouse_type__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['description'], 'string', 'max' => 500],
            [['name'], 'string', 'max' => 50],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['war_warehouse_type__id', 'lang'], 'unique', 'targetAttribute' => ['war_warehouse_type__id', 'lang']],
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
            'description' => 'Description',
            'war_warehouse_type__id' => 'War Warehouse Type  ID',
            'name' => 'Name',
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
     * @return \common\models\base\query\WarWarehouseTypeLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\WarWarehouseTypeLangQuery(get_called_class());
    }
}
