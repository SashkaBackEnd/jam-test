<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "smsmessages".
 *
 * @property int $id
 * @property string $object_alias
 * @property int $object_id
 * @property string|null $text Текст сообщения
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class Smsmessages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smsmessages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['object_alias'], 'required'],
            [['object_id', 'created_by', 'modified_by'], 'integer'],
            [['text'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['object_alias'], 'string', 'max' => 30],
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
            'object_alias' => 'Object Alias',
            'object_id' => 'Object ID',
            'text' => 'Text',
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
     * @return \common\models\base\query\SmsmessagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\SmsmessagesQuery(get_called_class());
    }
}
