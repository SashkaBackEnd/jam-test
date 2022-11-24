<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "attachment_picture_settings".
 *
 * @property int $id
 * @property int $attachment_files_settings__id
 * @property string $object_alias Псевдоним сохраняемого типа изображения
 * @property string $image_library Указывает библиотеку для обработки. Опции: GD, GD2, ImageMagick, NetPBM. Совместимость: R, C, X, W
 * @property string $library_path Указывает полные пути к библиотеке ImageMagick или NetPBM. Указывайте, если вы их используете. Совместимость: R, C, X
 * @property string $source_image Путь к файлу и его имя. Должен быть прямой серверный путь, не URL. Совместимость: R, C, S, W
 * @property int $dynamic_output Указывает, сохранять ли полученное изображение или использовать для динамического вывода. 
 * @property int $quality Устанавливает качество изображения. Чем выше качество, тем больше размер файла. И наоборот. Опции: 1 - 100% Совместимость: R, C, X, W
 * @property string $new_image Указывает путь и имя изображения для сохранения. Используется при создании копии изображения. Путь долженен быть относительным или абсолютным серверным путем, не URL.
 * @property int $width Устанавливает желаемую ширину изображения. Совместимость: R, C 
 * @property int $height Устанавливает желаемую высоту изображения. Совместимость: R, C 
 * @property int $create_thumb Указывает функции, что надо создать эскиз. Опции: TRUE/FALSE Совместимость: R
 * @property string $thumb_marker Указывает имя для эскиза. Будет вставлено перед расширением файла, например mypic.jpg станет mypic_thumb.jpg Совместимость: R
 * @property int $maintain_ratio Указывает, сохранять пропорции или нет. Опции: TRUE/FALSE Совместимость: R, C
 * @property string $master_dim Устанавливает размеры для создаваемого эскиза и при изменении. Например, вы хотите создать изображение 100 X 75 пикселей. Ели исходное изображение не позволяет изменить размер без сжатия, то данная настройка позволит изменить "жестко" размер. "auto" само определяет, шире или выше данное изображение нужного. Опции: auto, width, height. Совместимость: R
 * @property string $rotation_angle Указывает угол поворота изображения. Учтите, что в PHP градусы измеряются против часовой стрелки, и поворот на 90 градусов вправо будет задан как на 270. Опции: 90, 180, 270, vrt, hor. Совместимость: X 
 * @property int|null $x_axis Устанавливает X координату при обрезке. Например, при 30 обрежет изображение на 30 пикселей слева. Совместимость: C
 * @property int|null $y_axis Устанавливает Y координату при обрезке. Например, при 30 обрежет изображение на 30 пикселей сверху. Совместимость: C
 * @property int $prepare
 * @property string|null $crop_side Устанавливает сторону, на основании которой проводить обрезку изображения. Актуально при prepare = 1. Возможные значения: width, height
 * @property int $white_background
 * @property string|null $proportion_side
 * @property int $is_proportional
 * @property int|null $created_by
 * @property string|null $created_at
 * @property string|null $created_ip
 * @property int|null $modified_by
 * @property string|null $modified_at
 * @property string|null $modified_ip
 */
class AttachmentPictureSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'attachment_picture_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['attachment_files_settings__id', 'object_alias', 'width', 'height', 'thumb_marker'], 'required'],
            [['attachment_files_settings__id', 'dynamic_output', 'quality', 'width', 'height', 'create_thumb', 'maintain_ratio', 'x_axis', 'y_axis', 'prepare', 'white_background', 'is_proportional', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['object_alias', 'library_path', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['image_library', 'thumb_marker'], 'string', 'max' => 50],
            [['source_image', 'new_image'], 'string', 'max' => 200],
            [['master_dim', 'proportion_side'], 'string', 'max' => 20],
            [['rotation_angle', 'crop_side'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'attachment_files_settings__id' => 'Attachment Files Settings  ID',
            'object_alias' => 'Object Alias',
            'image_library' => 'Image Library',
            'library_path' => 'Library Path',
            'source_image' => 'Source Image',
            'dynamic_output' => 'Dynamic Output',
            'quality' => 'Quality',
            'new_image' => 'New Image',
            'width' => 'Width',
            'height' => 'Height',
            'create_thumb' => 'Create Thumb',
            'thumb_marker' => 'Thumb Marker',
            'maintain_ratio' => 'Maintain Ratio',
            'master_dim' => 'Master Dim',
            'rotation_angle' => 'Rotation Angle',
            'x_axis' => 'X Axis',
            'y_axis' => 'Y Axis',
            'prepare' => 'Prepare',
            'crop_side' => 'Crop Side',
            'white_background' => 'White Background',
            'proportion_side' => 'Proportion Side',
            'is_proportional' => 'Is Proportional',
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
     * @return \common\models\base\query\AttachmentPictureSettingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\AttachmentPictureSettingsQuery(get_called_class());
    }
}
