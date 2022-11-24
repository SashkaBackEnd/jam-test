<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "uploads_mime_types".
 *
 * @property int $id
 * @property string $alias Алиаз добавляемого типа файла
 * @property string $mime_type Mime тип
 * @property string $extension Расширение файла
 * @property int $size Размер файла (в МБ)
 * @property int $is_enabled Разрешен к загрузке
 * @property string $description
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $created_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 * @property string|null $modified_at
 *
 * @property UploadsFileTypes $alias0
 */
class UploadsMimeTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uploads_mime_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mime_type', 'extension', 'description'], 'required'],
            [['size', 'is_enabled', 'created_by', 'modified_by'], 'integer'],
            [['description', 'created_ip', 'modified_ip'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias'], 'string', 'max' => 20],
            [['mime_type'], 'string', 'max' => 100],
            [['extension'], 'string', 'max' => 10],
            [['alias'], 'exist', 'skipOnError' => true, 'targetClass' => UploadsFileTypes::className(), 'targetAttribute' => ['alias' => 'alias']],
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
            'mime_type' => 'Mime Type',
            'extension' => 'Extension',
            'size' => 'Size',
            'is_enabled' => 'Is Enabled',
            'description' => 'Description',
            'created_by' => 'Created By',
            'created_ip' => 'Created Ip',
            'created_at' => 'Created At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
            'modified_at' => 'Modified At',
        ];
    }

    /**
     * Gets query for [[Alias0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\base\query\UploadsFileTypesQuery
     */
    public function getAlias0()
    {
        return $this->hasOne(UploadsFileTypes::className(), ['alias' => 'alias']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\UploadsMimeTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UploadsMimeTypesQuery(get_called_class());
    }
}
