<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "objects_variables_groups_lang".
 *
 * @property int $id
 * @property int $objects_variables_groups__id
 * @property string $lang
 * @property string $name
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ObjectsVariablesGroupsLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'objects_variables_groups_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['objects_variables_groups__id', 'lang', 'name'], 'required'],
            [['objects_variables_groups__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 5],
            [['name', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['objects_variables_groups__id', 'lang'], 'unique', 'targetAttribute' => ['objects_variables_groups__id', 'lang']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'objects_variables_groups__id' => 'Objects Variables Groups  ID',
            'lang' => 'Lang',
            'name' => 'Name',
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
     * @return \common\models\base\query\ObjectsVariablesGroupsLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ObjectsVariablesGroupsLangQuery(get_called_class());
    }
}
