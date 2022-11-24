<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "war_storekeepers".
 *
 * @property int $id
 * @property int $war__id
 * @property int $users__id
 * @property string $created_at
 * @property int $created_by
 * @property string|null $created_ip
 * @property string $modified_at
 * @property int $modified_by
 * @property string|null $modified_ip
 */
class WarStorekeepers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'war_storekeepers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['war__id', 'users__id', 'created_at', 'created_by', 'modified_at', 'modified_by'], 'required'],
            [['war__id', 'users__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['war__id', 'users__id'], 'unique', 'targetAttribute' => ['war__id', 'users__id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'war__id' => 'War  ID',
            'users__id' => 'Users  ID',
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
     * @return \common\models\base\query\WarStorekeepersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\WarStorekeepersQuery(get_called_class());
    }
}
