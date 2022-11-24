<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "system_design".
 *
 * @property int $id
 * @property int|null $attachment__id
 * @property string $name
 * @property string $object_alias
 * @property string $title
 * @property int|null $is_active
 * @property string|null $preview
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class SystemDesign extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_design';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['attachment__id', 'is_active', 'created_by', 'modified_by'], 'integer'],
            [['name', 'object_alias', 'title'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['name'], 'string', 'max' => 200],
            [['object_alias', 'title', 'preview'], 'string', 'max' => 50],
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
            'attachment__id' => 'Attachment  ID',
            'name' => 'Name',
            'object_alias' => 'Object Alias',
            'title' => 'Title',
            'is_active' => 'Is Active',
            'preview' => 'Preview',
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
     * @return \common\models\base\query\SystemDesignQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\SystemDesignQuery(get_called_class());
    }
}
