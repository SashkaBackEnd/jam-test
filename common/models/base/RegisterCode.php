<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "register_code".
 *
 * @property int $id
 * @property string|null $description
 * @property string|null $position_alias
 * @property string|null $html
 * @property int|null $is_active
 * @property int|null $created_by
 * @property string|null $created_at
 * @property string|null $created_ip
 * @property int|null $modified_by
 * @property string|null $modified_at
 * @property string|null $modified_ip
 */
class RegisterCode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'register_code';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['html'], 'string'],
            [['is_active', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['description'], 'string', 'max' => 255],
            [['position_alias', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'position_alias' => 'Position Alias',
            'html' => 'Html',
            'is_active' => 'Is Active',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'created_ip' => 'Created Ip',
            'modified_by' => 'Modified By',
            'modified_at' => 'Modified At',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\RegisterCodeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\RegisterCodeQuery(get_called_class());
    }
}
