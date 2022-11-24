<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "attachment_lang".
 *
 * @property int $id
 * @property int $attachment__id
 * @property string $lang
 * @property string|null $title
 * @property string|null $description
 * @property int|null $created_by
 * @property string|null $created_at
 * @property string|null $created_ip
 * @property int|null $modified_by
 * @property string|null $modified_at
 * @property string|null $modified_ip
 */
class AttachmentLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'attachment_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['attachment__id', 'lang'], 'required'],
            [['attachment__id', 'created_by', 'modified_by'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['title'], 'string', 'max' => 1000],
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
            'lang' => 'Lang',
            'title' => 'Title',
            'description' => 'Description',
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
     * @return \common\models\base\query\AttachmentLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\AttachmentLangQuery(get_called_class());
    }
}
