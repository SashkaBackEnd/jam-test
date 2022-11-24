<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "translate_lang".
 *
 * @property int $id
 * @property int|null $translate__id
 * @property string|null $lang
 * @property string|null $translate
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class TranslateLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'translate_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['translate__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['translate'], 'string', 'max' => 1000],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['translate__id', 'lang'], 'unique', 'targetAttribute' => ['translate__id', 'lang']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'translate__id' => 'Translate  ID',
            'lang' => 'Lang',
            'translate' => 'Translate',
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
     * @return \common\models\base\query\TranslateLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\TranslateLangQuery(get_called_class());
    }
}
