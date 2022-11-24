<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "translate_url".
 *
 * @property int $id
 * @property int $translate__id
 * @property string|null $url
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class TranslateUrl extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'translate_url';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['translate__id'], 'required'],
            [['translate__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['url'], 'string', 'max' => 1000],
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
            'translate__id' => 'Translate  ID',
            'url' => 'Url',
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
     * @return \common\models\base\query\TranslateUrlQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\TranslateUrlQuery(get_called_class());
    }
}
