<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "store_wishes".
 *
 * @property int $id
 * @property int|null $users__id
 * @property int|null $catalogues_products__id Связь с продуктом каталога
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class StoreWishes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'store_wishes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id', 'catalogues_products__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['users__id', 'catalogues_products__id'], 'unique', 'targetAttribute' => ['users__id', 'catalogues_products__id']],
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
            'catalogues_products__id' => 'Catalogues Products  ID',
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
     * @return \common\models\base\query\StoreWishesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\StoreWishesQuery(get_called_class());
    }
}
