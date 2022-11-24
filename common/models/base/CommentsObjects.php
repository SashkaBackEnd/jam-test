<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "comments_objects".
 *
 * @property int $id
 * @property int $active
 * @property string|null $module_owner
 * @property string|null $module_name Название подключаемого модуля
 * @property string|null $relation_name
 * @property string|null $relation_code Код динамического подключения отношений
 * @property string|null $filter_code
 * @property string|null $link_code
 * @property string|null $object_alias
 * @property string|null $alias_title_code
 * @property string|null $commet_title_code
 * @property string $commet_title_notice
 * @property string|null $print_class
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class CommentsObjects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments_objects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['active', 'created_by', 'modified_by'], 'integer'],
            [['relation_code', 'filter_code', 'link_code', 'alias_title_code', 'commet_title_code', 'commet_title_notice'], 'string'],
            [['commet_title_notice'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['module_owner', 'relation_name', 'object_alias', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['module_name'], 'string', 'max' => 255],
            [['print_class'], 'string', 'max' => 250],
            [['relation_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'active' => 'Active',
            'module_owner' => 'Module Owner',
            'module_name' => 'Module Name',
            'relation_name' => 'Relation Name',
            'relation_code' => 'Relation Code',
            'filter_code' => 'Filter Code',
            'link_code' => 'Link Code',
            'object_alias' => 'Object Alias',
            'alias_title_code' => 'Alias Title Code',
            'commet_title_code' => 'Commet Title Code',
            'commet_title_notice' => 'Commet Title Notice',
            'print_class' => 'Print Class',
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
     * @return \common\models\base\query\CommentsObjectsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CommentsObjectsQuery(get_called_class());
    }
}
