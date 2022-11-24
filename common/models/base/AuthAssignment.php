<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "AuthAssignment".
 *
 * @property string $itemname
 * @property int $userid
 * @property string|null $bizrule
 * @property string|null $data
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class AuthAssignment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'AuthAssignment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['itemname', 'userid'], 'required'],
            [['userid', 'created_by', 'modified_by'], 'integer'],
            [['bizrule', 'data'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['itemname'], 'string', 'max' => 64],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['itemname', 'userid'], 'unique', 'targetAttribute' => ['itemname', 'userid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'itemname' => 'Itemname',
            'userid' => 'Userid',
            'bizrule' => 'Bizrule',
            'data' => 'Data',
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
     * @return \common\models\base\query\AuthAssignmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\AuthAssignmentQuery(get_called_class());
    }
}
