<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "mail_letters_pictures".
 *
 * @property int $id
 * @property int|null $mail_letters__id
 * @property string|null $mail_letters_body__id
 * @property string $file_path
 * @property string $file_cid
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MailLettersPictures extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mail_letters_pictures';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mail_letters__id', 'created_by', 'modified_by'], 'integer'],
            [['file_path', 'file_cid'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['mail_letters_body__id', 'file_cid', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['file_path'], 'string', 'max' => 255],
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
            'file_cid' => 'File Cid',
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
     * @return \common\models\base\query\MailLettersPicturesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MailLettersPicturesQuery(get_called_class());
    }
}
