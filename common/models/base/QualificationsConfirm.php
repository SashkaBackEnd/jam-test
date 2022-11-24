<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "qualifications_confirm".
 *
 * @property int $id
 * @property int $users__id
 * @property int $qualifications_id
 * @property int $marketing_periods__id
 * @property int $type 1 - доля, 2 - подтверждение
 * @property float $gpv
 * @property float $ppv
 * @property float|null $gpv_sum
 * @property float $pgpv
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class QualificationsConfirm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'qualifications_confirm';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id', 'qualifications_id', 'marketing_periods__id', 'type'], 'required'],
            [['users__id', 'qualifications_id', 'marketing_periods__id', 'type', 'created_by', 'modified_by'], 'integer'],
            [['gpv', 'ppv', 'gpv_sum', 'pgpv'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
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
            'qualifications_id' => 'Qualifications ID',
            'marketing_periods__id' => 'Marketing Periods  ID',
            'type' => 'Type',
            'gpv' => 'Gpv',
            'ppv' => 'Ppv',
            'gpv_sum' => 'Gpv Sum',
            'pgpv' => 'Pgpv',
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
     * @return \common\models\base\query\QualificationsConfirmQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\QualificationsConfirmQuery(get_called_class());
    }
}
