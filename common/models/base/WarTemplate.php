<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "war_template".
 *
 * @property int $id
 * @property int|null $num
 * @property string|null $name
 * @property int|null $type
 * @property int|null $total_count
 * @property float|null $total_price
 * @property int|null $is_deleted
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class WarTemplate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'war_template';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num', 'type', 'total_count', 'is_deleted', 'created_by', 'modified_by'], 'integer'],
            [['total_price'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
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
            'num' => 'Num',
            'name' => 'Name',
            'type' => 'Type',
            'total_count' => 'Total Count',
            'total_price' => 'Total Price',
            'is_deleted' => 'Is Deleted',
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
     * @return \common\models\base\query\WarTemplateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\WarTemplateQuery(get_called_class());
    }
}
