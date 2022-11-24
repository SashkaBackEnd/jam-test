<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "wallets_confirmation_methods_lang".
 *
 * @property int $id
 * @property int|null $wallets_confirmation_methods__id
 * @property string|null $lang
 * @property string|null $title
 * @property string|null $message
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class WalletsConfirmationMethodsLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wallets_confirmation_methods_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['wallets_confirmation_methods__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['title', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['message'], 'string', 'max' => 512],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'wallets_confirmation_methods__id' => 'Wallets Confirmation Methods  ID',
            'lang' => 'Lang',
            'title' => 'Title',
            'message' => 'Message',
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
     * @return \common\models\base\query\WalletsConfirmationMethodsLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\WalletsConfirmationMethodsLangQuery(get_called_class());
    }
}
