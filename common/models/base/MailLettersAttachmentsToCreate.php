<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "mail_letters_attachments_to_create".
 *
 * @property int $id
 * @property int $mail_letters_to_create__id
 * @property string|null $file_path Полный путь от root каталога включая название файла
 * @property string|null $file_name Имя файла, которое будет отправлено
 * @property int|null $is_file Реальный файл или его содержимое
 * @property resource|null $content Содержимое файла, для тех случаев, когда is_file = false
 * @property string $created_at
 * @property int $created_by
 * @property string|null $created_ip
 * @property string $modified_at
 * @property int $modified_by
 * @property string|null $modified_ip
 */
class MailLettersAttachmentsToCreate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mail_letters_attachments_to_create';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mail_letters_to_create__id', 'created_at', 'created_by', 'modified_at', 'modified_by'], 'required'],
            [['mail_letters_to_create__id', 'is_file', 'created_by', 'modified_by'], 'integer'],
            [['content'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['file_path'], 'string', 'max' => 4000],
            [['file_name'], 'string', 'max' => 1000],
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
            'mail_letters_to_create__id' => 'Mail Letters To Create  ID',
            'file_path' => 'File Path',
            'file_name' => 'File Name',
            'is_file' => 'Is File',
            'content' => 'Content',
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
     * @return \common\models\base\query\MailLettersAttachmentsToCreateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MailLettersAttachmentsToCreateQuery(get_called_class());
    }
}
