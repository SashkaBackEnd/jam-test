<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "config_groups".
 *
 * @property int $id
 * @property string $alias
 * @property string|null $cms_packages__name Конфиги разные модулей можно вложить в группу другого модуля
 * @property string|null $title
 * @property string|null $description
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ConfigGroups extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'config_groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_by', 'modified_by'], 'integer'],
            [['alias', 'title', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['cms_packages__name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 500],
            [['alias'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'cms_packages__name' => 'Cms Packages  Name',
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
     * @return \common\models\base\query\ConfigGroupsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ConfigGroupsQuery(get_called_class());
    }
}
