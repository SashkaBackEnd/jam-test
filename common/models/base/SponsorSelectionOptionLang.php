<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "sponsor_selection_option_lang".
 *
 * @property int $id
 * @property int $sponsor_selection_option__id
 * @property string $lang
 * @property string $title
 * @property string $description
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class SponsorSelectionOptionLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sponsor_selection_option_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sponsor_selection_option__id', 'lang', 'title', 'description'], 'required'],
            [['sponsor_selection_option__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['title', 'description'], 'string', 'max' => 100],
            [['created_ip', 'modified_ip'], 'string', 'max' => 255],
            [['lang', 'sponsor_selection_option__id'], 'unique', 'targetAttribute' => ['lang', 'sponsor_selection_option__id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sponsor_selection_option__id' => 'Sponsor Selection Option  ID',
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
     * @return \common\models\base\query\SponsorSelectionOptionLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\SponsorSelectionOptionLangQuery(get_called_class());
    }
}
