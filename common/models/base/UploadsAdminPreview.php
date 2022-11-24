<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "uploads_admin_preview".
 *
 * @property int $id
 * @property int|null $uploads_admin__id
 * @property string|null $lang
 * @property int|null $local_path
 * @property string|null $local_name
 * @property string|null $type
 * @property string|null $date_upload
 * @property int|null $is_main
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UploadsAdminPreview extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uploads_admin_preview';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uploads_admin__id', 'local_path', 'is_main', 'created_by', 'modified_by'], 'integer'],
            [['date_upload', 'created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 10],
            [['local_name', 'type'], 'string', 'max' => 50],
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
            'uploads_admin__id' => 'Uploads Admin  ID',
            'lang' => 'Lang',
            'local_path' => 'Local Path',
            'local_name' => 'Local Name',
            'type' => 'Type',
            'date_upload' => 'Date Upload',
            'is_main' => 'Is Main',
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
     * @return \common\models\base\query\UploadsAdminPreviewQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UploadsAdminPreviewQuery(get_called_class());
    }
}
