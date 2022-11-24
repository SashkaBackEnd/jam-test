<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "marketing_ranks_lang".
 *
 * @property int $id
 * @property int $marketing_ranks__id
 * @property string $lang
 * @property string|null $title
 * @property string|null $description
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MarketingRanksLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marketing_ranks_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['marketing_ranks__id', 'lang'], 'required'],
            [['marketing_ranks__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['title', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 200],
            [['marketing_ranks__id', 'lang'], 'unique', 'targetAttribute' => ['marketing_ranks__id', 'lang']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'marketing_ranks__id' => 'Marketing Ranks  ID',
            'lang' => 'Lang',
            'title' => 'Title',
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
     * @return \common\models\base\query\MarketingRanksLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MarketingRanksLangQuery(get_called_class());
    }
}
