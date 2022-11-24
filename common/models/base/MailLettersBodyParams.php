<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "mail_letters_body_params".
 *
 * @property int $id
 * @property string|null $mail_letters__id
 * @property string|null $letters_param
 * @property string|null $letters_param_value
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MailLettersBodyParams extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mail_letters_body_params';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'modified_at'], 'safe'],
            [['created_by', 'modified_by'], 'integer'],
            [['mail_letters__id', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['letters_param', 'letters_param_value'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mail_letters__id' => 'Mail Letters  ID',
            'letters_param' => 'Letters Param',
            'letters_param_value' => 'Letters Param Value',
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
     * @return \common\models\base\query\MailLettersBodyParamsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MailLettersBodyParamsQuery(get_called_class());
    }
}
