<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "war_warehouse_rank_lang".
 *
 * @property int $id
 * @property int $war_warehouse_rank__id
 * @property string|null $lang
 * @property string|null $name
 * @property int $created_by
 * @property string $created_at
 * @property string $created_ip
 * @property int|null $modified_by
 * @property string|null $modified_at
 * @property string|null $modified_ip
 */
class WarWarehouseRankLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'war_warehouse_rank_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['war_warehouse_rank__id', 'created_by', 'created_at', 'created_ip'], 'required'],
            [['war_warehouse_rank__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 3],
            [['name'], 'string', 'max' => 128],
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
            'war_warehouse_rank__id' => 'War Warehouse Rank  ID',
            'lang' => 'Lang',
            'name' => 'Name',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'created_ip' => 'Created Ip',
            'modified_by' => 'Modified By',
            'modified_at' => 'Modified At',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\WarWarehouseRankLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\WarWarehouseRankLangQuery(get_called_class());
    }
}
