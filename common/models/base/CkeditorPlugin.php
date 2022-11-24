<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "ckeditor_plugin".
 *
 * @property int $id
 * @property int|null $ckeditor_config__id
 * @property string|null $alias
 * @property string|null $url_path
 * @property int|null $is_used
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class CkeditorPlugin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ckeditor_plugin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ckeditor_config__id', 'is_used', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias'], 'string', 'max' => 50],
            [['url_path'], 'string', 'max' => 1000],
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
            'ckeditor_config__id' => 'Ckeditor Config  ID',
            'alias' => 'Alias',
            'url_path' => 'Url Path',
            'is_used' => 'Is Used',
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
     * @return \common\models\base\query\CkeditorPluginQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CkeditorPluginQuery(get_called_class());
    }
}
