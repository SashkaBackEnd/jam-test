<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "tmp_for_getcourse".
 *
 * @property int $id
 * @property string|null $action
 * @property int|null $getcourse_order__id
 * @property string $status
 * @property string|null $data
 * @property string|null $error_text
 * @property string|null $created_at
 */
class TmpForGetcourse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tmp_for_getcourse';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['getcourse_order__id'], 'integer'],
            [['data', 'error_text'], 'string'],
            [['created_at'], 'safe'],
            [['action'], 'string', 'max' => 30],
            [['status'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'action' => 'Action',
            'getcourse_order__id' => 'Getcourse Order  ID',
            'status' => 'Status',
            'data' => 'Data',
            'error_text' => 'Error Text',
            'created_at' => 'Created At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\TmpForGetcourseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\TmpForGetcourseQuery(get_called_class());
    }
}
