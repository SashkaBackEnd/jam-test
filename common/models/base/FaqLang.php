<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "faq_lang".
 *
 * @property int $id
 * @property int|null $faq__id
 * @property string|null $lang
 * @property string|null $question
 * @property string|null $answer
 * @property string|null $clear_answer
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class FaqLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faq_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['faq__id', 'created_by', 'modified_by'], 'integer'],
            [['question', 'answer', 'clear_answer'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
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
            'faq__id' => 'Faq  ID',
            'lang' => 'Lang',
            'question' => 'Question',
            'answer' => 'Answer',
            'clear_answer' => 'Clear Answer',
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
     * @return \common\models\base\query\FaqLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FaqLangQuery(get_called_class());
    }
}
