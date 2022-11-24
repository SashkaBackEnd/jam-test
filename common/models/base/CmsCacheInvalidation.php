<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "cms_cache_invalidation".
 *
 * @property int $id
 * @property string|null $key
 * @property int $expiration_time
 */
class CmsCacheInvalidation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cms_cache_invalidation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['expiration_time'], 'integer'],
            [['key'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'expiration_time' => 'Expiration Time',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\CmsCacheInvalidationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CmsCacheInvalidationQuery(get_called_class());
    }
}
