<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "api_connect_antares".
 *
 * @property int $id
 * @property int $users__id
 * @property int $is_done
 * @property string $type
 * @property string $data
 */
class ApiConnectAntares extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'api_connect_antares';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id', 'type', 'data'], 'required'],
            [['users__id', 'is_done'], 'integer'],
            [['type', 'data'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'users__id' => 'Users  ID',
            'is_done' => 'Is Done',
            'type' => 'Type',
            'data' => 'Data',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\ApiConnectAntaresQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ApiConnectAntaresQuery(get_called_class());
    }
}
