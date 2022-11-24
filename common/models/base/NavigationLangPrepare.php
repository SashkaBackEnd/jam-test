<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "navigation_lang_prepare".
 *
 * @property int $id
 * @property string|null $lang
 * @property string|null $navigation__alias
 * @property string|null $title
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class NavigationLangPrepare extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'navigation_lang_prepare';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'modified_at'], 'safe'],
            [['created_by', 'modified_by'], 'integer'],
            [['lang'], 'string', 'max' => 2],
            [['navigation__alias'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 200],
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
            'lang' => 'Lang',
            'navigation__alias' => 'Navigation  Alias',
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
     * @return \common\models\base\query\NavigationLangPrepareQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\NavigationLangPrepareQuery(get_called_class());
    }
}
