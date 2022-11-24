<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "uploads_config".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $value
 */
class UploadsConfig extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uploads_config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'value'], 'string', 'max' => 255],
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
            'value' => 'Value',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\UploadsConfigQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UploadsConfigQuery(get_called_class());
    }
}
