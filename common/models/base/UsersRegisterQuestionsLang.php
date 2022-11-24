<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_register_questions_lang".
 *
 * @property int $id
 * @property int|null $users_register_questions__id
 * @property string|null $lang
 * @property string|null $text
 * @property string|null $description
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UsersRegisterQuestionsLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_register_questions_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users_register_questions__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['text', 'description'], 'string', 'max' => 500],
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
            'users_register_questions__id' => 'Users Register Questions  ID',
            'lang' => 'Lang',
            'text' => 'Text',
            'description' => 'Description',
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
     * @return \common\models\base\query\UsersRegisterQuestionsLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersRegisterQuestionsLangQuery(get_called_class());
    }
}
