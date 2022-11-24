<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "report_config".
 *
 * @property int $id
 * @property int $is_count_user_in_matrix Отдельно считать пользователей, участвующих в матрице. Актуально при установленном модуле AdminMatrix
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ReportConfig extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report_config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_count_user_in_matrix', 'created_by', 'modified_by'], 'integer'],
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
            'is_count_user_in_matrix' => 'Is Count User In Matrix',
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
     * @return \common\models\base\query\ReportConfigQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ReportConfigQuery(get_called_class());
    }
}
