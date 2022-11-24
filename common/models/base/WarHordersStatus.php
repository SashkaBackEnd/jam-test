<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "war_horders_status".
 *
 * @property int $id
 * @property string|null $alias
 * @property int $is_show_for_admin Показывать администратору
 * @property int|null $position
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class WarHordersStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'war_horders_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_show_for_admin', 'position', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias'], 'string', 'max' => 50],
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
            'alias' => 'Alias',
            'is_show_for_admin' => 'Is Show For Admin',
            'position' => 'Position',
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
     * @return \common\models\base\query\WarHordersStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\WarHordersStatusQuery(get_called_class());
    }
}
