<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "profile_confirm_phone".
 *
 * @property int $id
 * @property int $users__id
 * @property string|null $new_phone
 * @property string|null $confirmed_phone
 * @property int $is_phone_confirm
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProfileConfirmPhone extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile_confirm_phone';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id'], 'required'],
            [['users__id', 'is_phone_confirm', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['new_phone', 'confirmed_phone'], 'string', 'max' => 32],
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
            'users__id' => 'Users  ID',
            'new_phone' => 'New Phone',
            'confirmed_phone' => 'Confirmed Phone',
            'is_phone_confirm' => 'Is Phone Confirm',
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
     * @return \common\models\base\query\ProfileConfirmPhoneQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProfileConfirmPhoneQuery(get_called_class());
    }
}
