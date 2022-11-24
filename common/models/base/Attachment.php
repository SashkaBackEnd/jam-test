<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "attachment".
 *
 * @property int $id
 * @property string $object_alias
 * @property int $object_id
 * @property string $file_type
 * @property string|null $file_path
 * @property string|null $full_path
 * @property string $secret_name
 * @property string|null $file_name
 * @property string|null $orig_name
 * @property string|null $raw_name
 * @property float|null $file_size
 * @property string|null $file_ext
 * @property int|null $is_image
 * @property string|null $image_type
 * @property int|null $image_width
 * @property int|null $image_height
 * @property string|null $image_size_str
 * @property int $is_main Главное изображение для текущего object_alias
 * @property int|null $status
 * @property int|null $status_by
 * @property string|null $status_at
 * @property int|null $created_by
 * @property string|null $created_at
 * @property string|null $created_ip
 * @property int|null $modified_by
 * @property string|null $modified_at
 * @property string|null $modified_ip
 */
class Attachment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'attachment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['object_alias', 'object_id', 'file_type', 'secret_name'], 'required'],
            [['object_id', 'is_image', 'image_width', 'image_height', 'is_main', 'status', 'status_by', 'created_by', 'modified_by'], 'integer'],
            [['file_size'], 'number'],
            [['status_at', 'created_at', 'modified_at'], 'safe'],
            [['object_alias', 'file_type', 'secret_name', 'image_type', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['file_path', 'file_name', 'orig_name'], 'string', 'max' => 256],
            [['full_path', 'raw_name', 'image_size_str'], 'string', 'max' => 255],
            [['file_ext'], 'string', 'max' => 50],
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
            'file_type' => 'File Type',
            'file_path' => 'File Path',
            'full_path' => 'Full Path',
            'secret_name' => 'Secret Name',
            'file_name' => 'File Name',
            'orig_name' => 'Orig Name',
            'raw_name' => 'Raw Name',
            'file_size' => 'File Size',
            'file_ext' => 'File Ext',
            'is_image' => 'Is Image',
            'image_type' => 'Image Type',
            'image_width' => 'Image Width',
            'image_height' => 'Image Height',
            'image_size_str' => 'Image Size Str',
            'is_main' => 'Is Main',
            'status' => 'Status',
            'status_by' => 'Status By',
            'status_at' => 'Status At',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'created_ip' => 'Created Ip',
            'modified_by' => 'Modified By',
            'modified_at' => 'Modified At',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\AttachmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\AttachmentQuery(get_called_class());
    }
}
