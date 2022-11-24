<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "admin_verification".
 *
 * @property int $id
 * @property int $users__id
 * @property string|null $start_verificate_process_at
 * @property string|null $complete_verificate_process_at
 * @property int $verificated_status
 * @property int $verificated_step_1_status Шаг 1
 * @property int $verificated_step_2_status Шаг 2
 * @property int $verificated_step_3_status Шаг 3
 * @property int|null $complete_verificated_status
 * @property string|null $start_verificate_step_1
 * @property string|null $complete_verificate_step_1
 * @property string|null $start_verificate_step_2
 * @property string|null $complete_verificate_step_2
 * @property string|null $start_verificate_step_3
 * @property string|null $complete_verificate_step_3
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class AdminVerification extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin_verification';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id'], 'required'],
            [['users__id', 'verificated_status', 'verificated_step_1_status', 'verificated_step_2_status', 'verificated_step_3_status', 'complete_verificated_status', 'created_by', 'modified_by'], 'integer'],
            [['start_verificate_process_at', 'complete_verificate_process_at', 'start_verificate_step_1', 'complete_verificate_step_1', 'start_verificate_step_2', 'complete_verificate_step_2', 'start_verificate_step_3', 'complete_verificate_step_3', 'created_at', 'modified_at'], 'safe'],
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
            'users__id' => 'Users  ID',
            'start_verificate_process_at' => 'Start Verificate Process At',
            'complete_verificate_process_at' => 'Complete Verificate Process At',
            'verificated_status' => 'Verificated Status',
            'verificated_step_1_status' => 'Verificated Step 1 Status',
            'verificated_step_2_status' => 'Verificated Step 2 Status',
            'verificated_step_3_status' => 'Verificated Step 3 Status',
            'complete_verificated_status' => 'Complete Verificated Status',
            'start_verificate_step_1' => 'Start Verificate Step 1',
            'complete_verificate_step_1' => 'Complete Verificate Step 1',
            'start_verificate_step_2' => 'Start Verificate Step 2',
            'complete_verificate_step_2' => 'Complete Verificate Step 2',
            'start_verificate_step_3' => 'Start Verificate Step 3',
            'complete_verificate_step_3' => 'Complete Verificate Step 3',
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
     * @return \common\models\base\query\AdminVerificationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\AdminVerificationQuery(get_called_class());
    }
}
