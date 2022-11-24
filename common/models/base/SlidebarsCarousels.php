<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "slidebars_carousels".
 *
 * @property int $id
 * @property int $is_allowed Доступна для выбора (может быть доступен только один вид карусели)
 * @property string|null $alias
 * @property string|null $created_at
 * @property string|null $created_ip
 * @property int|null $created_by
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class SlidebarsCarousels extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slidebars_carousels';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_allowed', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'is_allowed' => 'Is Allowed',
            'alias' => 'Alias',
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
     * @return \common\models\base\query\SlidebarsCarouselsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\SlidebarsCarouselsQuery(get_called_class());
    }
}
