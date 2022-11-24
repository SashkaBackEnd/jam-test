<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "finance_wallets_view_additional".
 *
 * @property int $id
 * @property int|null $user__id
 * @property int|null $finance_wallets__id
 * @property string|null $title
 * @property string|null $created_at Время создания записи
 * @property int|null $created_by ID веб-пользователя (users.id), который создал запись
 * @property string|null $created_ip IP веб-пользователя (users.id), который создал запись
 * @property string|null $modified_at Время создания записи
 * @property int|null $modified_by ID веб-пользователя (users.id), который внес изменения
 * @property string|null $modified_ip IP веб-пользователя (users.id), который внес изменения
 */
class FinanceWalletsViewAdditional extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_wallets_view_additional';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user__id', 'finance_wallets__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['title', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user__id' => 'User  ID',
            'finance_wallets__id' => 'Finance Wallets  ID',
            'title' => 'Title',
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
     * @return \common\models\base\query\FinanceWalletsViewAdditionalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FinanceWalletsViewAdditionalQuery(get_called_class());
    }
}
