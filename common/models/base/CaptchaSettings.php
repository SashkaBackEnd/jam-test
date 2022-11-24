<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "captcha_settings".
 *
 * @property int $id
 * @property int|null $captcha__id
 * @property string|null $name
 * @property string|null $value
 * @property string|null $type_input
 * @property int|null $required
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class CaptchaSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'captcha_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['captcha__id', 'required', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['name', 'type_input'], 'string', 'max' => 255],
            [['value'], 'string', 'max' => 1000],
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
            'captcha__id' => 'Captcha  ID',
            'name' => 'Name',
            'value' => 'Value',
            'type_input' => 'Type Input',
            'required' => 'Required',
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
     * @return \common\models\base\query\CaptchaSettingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CaptchaSettingsQuery(get_called_class());
    }
}
