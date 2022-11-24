<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property int $id
 * @property string|null $layout
 * @property int|null $themes__id
 * @property float|null $main_height
 * @property int $is_visible
 * @property int $is_visible_admin
 * @property int $is_edit_admin
 * @property string $langs
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['themes__id', 'is_visible', 'is_visible_admin', 'is_edit_admin', 'created_by', 'modified_by'], 'integer'],
            [['main_height'], 'number'],
            [['langs'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['layout'], 'string', 'max' => 50],
            [['langs', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'layout' => 'Layout',
            'themes__id' => 'Themes  ID',
            'main_height' => 'Main Height',
            'is_visible' => 'Is Visible',
            'is_visible_admin' => 'Is Visible Admin',
            'is_edit_admin' => 'Is Edit Admin',
            'langs' => 'Langs',
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
     * @return \common\models\base\query\PagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PagesQuery(get_called_class());
    }
}
