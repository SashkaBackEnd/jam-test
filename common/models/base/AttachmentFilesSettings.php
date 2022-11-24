<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "attachment_files_settings".
 *
 * @property int $id
 * @property string $object_alias Псевдоним загружаемого типа файлов
 * @property string $type_upload_path Тип сохранияемого пути:  auto - при вызове метода get_path;  upload_path - используется заданный в ключе "upload_path" путь
 * @property string $upload_path Путь до папки, куда будет загружен файл. У папки должны быть выставлены права на запись, а путь может быть как абсолютным, так и относительным.
 * @property string $allowed_types Типы MIME, описывающие типы файлов, разрешенных для загрузки. Обычно в качестве MIME-типа используется расширение файла. Несколько типов разделяются вертикальной чертой.
 * @property string $not_allowed_types Типы MIME, описывающие типы файлов, не разрешенных для загрузки. Обычно в качестве MIME-типа используется расширение файла. Несколько типов разделяются вертикальной чертой.
 * @property int $overwrite Опции: FALSE/TRUE Если TRUE, и в папке уже есть файл с тем же именем, что и заливаемый, то он будет перезаписан. Если false, то перезаписи не будет, а к имени заливаемого файла добавится порядковый номер.
 * @property int $max_size Максимальный размер файла (в килобайтах). Если ограничения нет, то пишем 0. На заметку: на многих серверах с установленным PHP имеется ограничение на размер заливаемых файлов, записанное в файле php.ini. Как правило, по умолчанию устанавливается 2 МБ (2048 КБ).
 * @property int $max_width Максимальная ширина картинки в пикселях. 0 — не ограниченно.
 * @property int $max_height Максимальная высота картинки в пикселях. 0 — не ограниченно.
 * @property string $prefix_name
 * @property int $encrypt_name Опции: FALSE/TRUE Если TRUE, то имя файла преобразуется в случайным образом сгенерированную строку. Может быть полезно, если хотите, чтобы залитый файл не мог быть распознан заливающим.
 * @property string $encrypt_type может быть strict, normal
 * @property int $remove_spaces Опции: FALSE/TRUE Если TRUE, то все пробелы в имени файла будут преобразованы в знак подчеркивания. Рекомендуется всегда использовать данную опцию.    
 * @property int|null $created_by
 * @property string|null $created_at
 * @property string|null $created_ip
 * @property int|null $modified_by
 * @property string|null $modified_at
 * @property string|null $modified_ip
 */
class AttachmentFilesSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'attachment_files_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['object_alias'], 'required'],
            [['overwrite', 'max_size', 'max_width', 'max_height', 'encrypt_name', 'remove_spaces', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['object_alias', 'allowed_types', 'not_allowed_types', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['type_upload_path', 'upload_path', 'prefix_name'], 'string', 'max' => 50],
            [['encrypt_type'], 'string', 'max' => 20],
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
            'type_upload_path' => 'Type Upload Path',
            'upload_path' => 'Upload Path',
            'allowed_types' => 'Allowed Types',
            'not_allowed_types' => 'Not Allowed Types',
            'overwrite' => 'Overwrite',
            'max_size' => 'Max Size',
            'max_width' => 'Max Width',
            'max_height' => 'Max Height',
            'prefix_name' => 'Prefix Name',
            'encrypt_name' => 'Encrypt Name',
            'encrypt_type' => 'Encrypt Type',
            'remove_spaces' => 'Remove Spaces',
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
     * @return \common\models\base\query\AttachmentFilesSettingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\AttachmentFilesSettingsQuery(get_called_class());
    }
}
