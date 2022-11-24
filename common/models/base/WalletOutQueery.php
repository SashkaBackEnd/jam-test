<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "wallet_out_queery".
 *
 * @property int $id
 * @property int $ft_id
 * @property string $data
 * @property int $try_count
 * @property int $is_sucsess
 * @property string $date
 */
class WalletOutQueery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wallet_out_queery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ft_id', 'data', 'try_count', 'is_sucsess', 'date'], 'required'],
            [['ft_id', 'try_count', 'is_sucsess'], 'integer'],
            [['data'], 'string'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ft_id' => 'Ft ID',
            'data' => 'Data',
            'try_count' => 'Try Count',
            'is_sucsess' => 'Is Sucsess',
            'date' => 'Date',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\WalletOutQueeryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\WalletOutQueeryQuery(get_called_class());
    }
}
