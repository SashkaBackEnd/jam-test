<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "getcourse_log".
 *
 * @property int $id
 * @property string|null $action
 * @property string|null $type
 * @property string|null $data
 * @property string|null $created_at
 * @property string|null $created_ip
 */
class GetcourseLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'getcourse_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data'], 'string'],
            [['created_at'], 'safe'],
            [['action'], 'string', 'max' => 60],
            [['type'], 'string', 'max' => 100],
            [['created_ip'], 'string', 'max' => 40],
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
            'type' => 'Type',
            'data' => 'Data',
            'created_at' => 'Created At',
            'created_ip' => 'Created Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\GetcourseLogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\GetcourseLogQuery(get_called_class());
    }
}
