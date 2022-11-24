<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "mail_letters_attachments".
 *
 * @property int $id
 * @property int|null $mail_letters__id
 * @property string|null $mail_letters_body__id
 * @property string|null $file_path Полный путь от root каталога включая название файла
 * @property string|null $file_name Имя файла, которое будет отправлено
 * @property string|null $file_mime_type
 * @property int|null $is_file Реальный файл или его содержимое
 * @property resource|null $content Содержимое файла, для тех случаев, когда is_file = false
 * @property string|null $file_size
 * @property string|null $original_name
 * @property string $created_at
 * @property int $created_by
 * @property string|null $created_ip
 * @property string $modified_at
 * @property int $modified_by
 * @property string|null $modified_ip
 */
class MailLettersAttachments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mail_letters_attachments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mail_letters__id', 'is_file', 'created_by', 'modified_by'], 'integer'],
            [['content'], 'string'],
            [['created_at', 'created_by', 'modified_at', 'modified_by'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['mail_letters_body__id', 'file_mime_type', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['file_path'], 'string', 'max' => 4000],
            [['file_name'], 'string', 'max' => 1000],
            [['file_size', 'original_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mail_letters__id' => 'Mail Letters  ID',
            'mail_letters_body__id' => 'Mail Letters Body  ID',
            'file_path' => 'File Path',
            'file_name' => 'File Name',
            'file_mime_type' => 'File Mime Type',
            'is_file' => 'Is File',
            'content' => 'Content',
            'file_size' => 'File Size',
            'original_name' => 'Original Name',
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
     * @return \common\models\base\query\MailLettersAttachmentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MailLettersAttachmentsQuery(get_called_class());
    }
}
