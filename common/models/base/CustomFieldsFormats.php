<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "custom_fields_formats".
 *
 * @property int $id
 * @property string $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class CustomFieldsFormats extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'custom_fields_formats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'modified_at'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_by', 'modified_by'], 'integer'],
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
     * @return \common\models\base\query\CustomFieldsFormatsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CustomFieldsFormatsQuery(get_called_class());
    }
}
