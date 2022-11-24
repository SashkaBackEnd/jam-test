<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "navigation_types".
 *
 * @property int $id
 * @property string|null $alias
 * @property string|null $label
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_id
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class NavigationTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'navigation_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'modified_at'], 'safe'],
            [['created_by', 'modified_by'], 'integer'],
            [['alias', 'label', 'created_id', 'modified_ip'], 'string', 'max' => 100],
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
            'label' => 'Label',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'created_id' => 'Created ID',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\NavigationTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\NavigationTypesQuery(get_called_class());
    }
}
