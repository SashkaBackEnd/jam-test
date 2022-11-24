<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "system_letters_params".
 *
 * @property int $id
 * @property int|null $system_letters__id
 * @property string|null $variable
 * @property string|null $title
 * @property int $is_active
 * @property string|null $created_at
 * @property string|null $created_ip
 * @property int|null $created_by
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class SystemLettersParams extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_letters_params';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['system_letters__id', 'is_active', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['variable'], 'string', 'max' => 50],
            [['title'], 'string', 'max' => 1000],
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
            'system_letters__id' => 'System Letters  ID',
            'variable' => 'Variable',
            'title' => 'Title',
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
            'created_ip' => 'Created Ip',
            'created_by' => 'Created By',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\SystemLettersParamsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\SystemLettersParamsQuery(get_called_class());
    }
}
