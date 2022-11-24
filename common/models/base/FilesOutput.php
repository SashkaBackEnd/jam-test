<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "files_output".
 *
 * @property int $id
 * @property string|null $full_filename
 * @property string|null $filename
 * @property string|null $payment_alias
 * @property string|null $content
 * @property int|null $type_file
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class FilesOutput extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'files_output';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_file', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['full_filename', 'filename', 'payment_alias'], 'string', 'max' => 255],
            [['content'], 'string', 'max' => 1000],
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
            'full_filename' => 'Full Filename',
            'filename' => 'Filename',
            'payment_alias' => 'Payment Alias',
            'content' => 'Content',
            'type_file' => 'Type File',
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
     * @return \common\models\base\query\FilesOutputQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FilesOutputQuery(get_called_class());
    }
}
