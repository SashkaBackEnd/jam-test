<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "matrix_tokens_owners".
 *
 * @property int $id
 * @property int $users__id
 * @property int|null $profile__sponsor__id
 * @property string|null $profile__upline
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MatrixTokensOwners extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matrix_tokens_owners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id'], 'required'],
            [['users__id', 'profile__sponsor__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['profile__upline'], 'string', 'max' => 4096],
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
            'profile__sponsor__id' => 'Profile  Sponsor  ID',
            'profile__upline' => 'Profile  Upline',
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
     * @return \common\models\base\query\MatrixTokensOwnersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MatrixTokensOwnersQuery(get_called_class());
    }
}
