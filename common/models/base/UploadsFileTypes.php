<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "uploads_file_types".
 *
 * @property int $id
 * @property string $alias Тип добавляемого типа файла
 * @property string $title Название
 * @property string|null $description Описание
 * @property int $size Размер файла (в МБ)
 * @property int $is_enabled Разрешен к загрузке
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $created_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 * @property string|null $modified_at
 *
 * @property UploadsMimeTypes[] $uploadsMimeTypes
 */
class UploadsFileTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uploads_file_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias', 'title', 'size'], 'required'],
            [['description', 'created_ip', 'modified_ip'], 'string'],
            [['size', 'is_enabled', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias'], 'string', 'max' => 20],
            [['title'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'description' => 'Description',
            'size' => 'Size',
            'is_enabled' => 'Is Enabled',
            'created_by' => 'Created By',
            'created_ip' => 'Created Ip',
            'created_at' => 'Created At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
            'modified_at' => 'Modified At',
        ];
    }

    /**
     * Gets query for [[UploadsMimeTypes]].
     *
     * @return \yii\db\ActiveQuery|\common\models\base\query\UploadsMimeTypesQuery
     */
    public function getUploadsMimeTypes()
    {
        return $this->hasMany(UploadsMimeTypes::className(), ['alias' => 'alias']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\UploadsFileTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UploadsFileTypesQuery(get_called_class());
    }
}
