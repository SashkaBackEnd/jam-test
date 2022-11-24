<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "delivery_systems".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $title
 * @property string|null $description_help
 * @property string|null $brief_text
 * @property string|null $module_class  указание класса с неймспесом 
 * @property int|null $is_show
 * @property int|null $is_active
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class DeliverySystems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'delivery_systems';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description_help', 'brief_text'], 'string'],
            [['is_show', 'is_active', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['name', 'title', 'module_class', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'title' => 'Title',
            'description_help' => 'Description Help',
            'brief_text' => 'Brief Text',
            'module_class' => 'Module Class',
            'is_show' => 'Is Show',
            'is_active' => 'Is Active',
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
     * @return \common\models\base\query\DeliverySystemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\DeliverySystemsQuery(get_called_class());
    }
}
