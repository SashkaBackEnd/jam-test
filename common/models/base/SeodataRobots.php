<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "seodata_robots".
 *
 * @property int $id
 * @property string|null $standart
 * @property string|null $user_modified
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class SeodataRobots extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seodata_robots';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['standart', 'user_modified'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_by', 'modified_by'], 'integer'],
            [['created_ip', 'modified_ip'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'standart' => 'Standart',
            'user_modified' => 'User Modified',
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
     * @return \common\models\base\query\SeodataRobotsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\SeodataRobotsQuery(get_called_class());
    }
}
