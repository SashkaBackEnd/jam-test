<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "config".
 *
 * @property int $id
 * @property string $alias
 * @property string|null $value
 * @property string|null $cms_packages__name
 * @property string|null $config_groups__alias
 * @property string|null $title
 * @property string|null $description
 * @property string|null $typeof Доступные значения: NULL, boolean, integer, по умолчанию будет распознаватся как строка
 * @property string|null $rule
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class Config extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'config';
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
            [['alias', 'config_groups__alias', 'title', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['value', 'description', 'rule'], 'string', 'max' => 500],
            [['cms_packages__name'], 'string', 'max' => 50],
            [['typeof'], 'string', 'max' => 30],
            [['alias', 'cms_packages__name'], 'unique', 'targetAttribute' => ['alias', 'cms_packages__name']],
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
            'value' => 'Value',
            'cms_packages__name' => 'Cms Packages  Name',
            'config_groups__alias' => 'Config Groups  Alias',
            'title' => 'Title',
            'description' => 'Description',
            'typeof' => 'Typeof',
            'rule' => 'Rule',
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
     * @return \common\models\base\query\ConfigQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ConfigQuery(get_called_class());
    }
}
