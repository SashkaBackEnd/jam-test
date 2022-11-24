<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "finance_objects".
 *
 * @property int $id
 * @property string|null $alias
 * @property string|null $title
 * @property string|null $table_name Имя таблицы для связи
 * @property string|null $created_at Дата создания записи. Техническое поле
 * @property int|null $created_by ID ВебПользователя кто создавал запись. Техническое поле
 * @property string|null $created_ip
 * @property string|null $modified_at Дата редактирования записи. Техническое поле
 * @property int|null $modified_by ID ВебПользователя кто вносил изменения. Техническое поле
 * @property string|null $modified_ip
 */
class FinanceObjects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_objects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'modified_at'], 'safe'],
            [['created_by', 'modified_by'], 'integer'],
            [['alias', 'title', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['table_name'], 'string', 'max' => 50],
            [['alias'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'title' => 'Title',
            'table_name' => 'Table Name',
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
     * @return \common\models\base\query\FinanceObjectsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FinanceObjectsQuery(get_called_class());
    }
}
