<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "war_statement".
 *
 * @property int $id
 * @property string $date_from
 * @property string $date_to
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class WarStatement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'war_statement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_from', 'date_to'], 'required'],
            [['date_from', 'date_to', 'created_at', 'modified_at'], 'safe'],
            [['created_by', 'modified_by'], 'integer'],
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
            'date_from' => 'Date From',
            'date_to' => 'Date To',
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
     * @return \common\models\base\query\WarStatementQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\WarStatementQuery(get_called_class());
    }
}
