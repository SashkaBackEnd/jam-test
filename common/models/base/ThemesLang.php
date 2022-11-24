<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "themes_lang".
 *
 * @property int $id
 * @property int|null $theme__id
 * @property string|null $lang
 * @property string|null $description
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ThemesLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'themes_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['theme__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['description'], 'string', 'max' => 500],
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
            'theme__id' => 'Theme  ID',
            'lang' => 'Lang',
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
     * @return \common\models\base\query\ThemesLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ThemesLangQuery(get_called_class());
    }
}
