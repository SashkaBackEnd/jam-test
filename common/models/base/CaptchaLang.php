<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "captcha_lang".
 *
 * @property int $id
 * @property int|null $captcha__id
 * @property string|null $lang
 * @property string|null $name
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class CaptchaLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'captcha_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['captcha__id', 'created_by', 'modified_by'], 'integer'],
            [['name'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
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
            'lang' => 'Lang',
            'name' => 'Name',
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
     * @return \common\models\base\query\CaptchaLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CaptchaLangQuery(get_called_class());
    }
}
