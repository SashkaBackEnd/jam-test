<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "password_restore_links".
 *
 * @property int $id
 * @property int $users__id
 * @property string $hash
 * @property string $created_at
 * @property int $created_by
 * @property string $created_ip
 * @property string $modified_at
 * @property int $modified_by
 * @property string $modified_ip
 * @property int $is_active
 */
class PasswordRestoreLinks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'password_restore_links';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id', 'hash', 'created_at', 'created_by', 'created_ip', 'modified_at', 'modified_by', 'modified_ip', 'is_active'], 'required'],
            [['users__id', 'created_by', 'modified_by', 'is_active'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['hash', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
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
            'hash' => 'Hash',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'created_ip' => 'Created Ip',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\PasswordRestoreLinksQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PasswordRestoreLinksQuery(get_called_class());
    }
}
