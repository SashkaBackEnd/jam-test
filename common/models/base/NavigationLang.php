<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "navigation_lang".
 *
 * @property int $id
 * @property string|null $lang
 * @property int|null $navigation__id
 * @property string|null $title
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class NavigationLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'navigation_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['navigation__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['title'], 'string', 'max' => 200],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['navigation__id', 'lang'], 'unique', 'targetAttribute' => ['navigation__id', 'lang']],
            [['lang', 'navigation__id'], 'unique', 'targetAttribute' => ['lang', 'navigation__id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lang' => 'Lang',
            'navigation__id' => 'Navigation  ID',
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
     * @return \common\models\base\query\NavigationLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\NavigationLangQuery(get_called_class());
    }
}
