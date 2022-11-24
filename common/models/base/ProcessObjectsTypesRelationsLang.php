<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "process_objects_types_relations_lang".
 *
 * @property int $id
 * @property int $process_objects_types_relations__id
 * @property string $lang
 * @property string|null $title
 * @property string|null $description
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProcessObjectsTypesRelationsLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'process_objects_types_relations_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['process_objects_types_relations__id', 'lang'], 'required'],
            [['process_objects_types_relations__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['title', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 200],
            [['process_objects_types_relations__id', 'lang'], 'unique', 'targetAttribute' => ['process_objects_types_relations__id', 'lang']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'process_objects_types_relations__id' => 'Process Objects Types Relations  ID',
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
     * @return \common\models\base\query\ProcessObjectsTypesRelationsLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProcessObjectsTypesRelationsLangQuery(get_called_class());
    }
}
