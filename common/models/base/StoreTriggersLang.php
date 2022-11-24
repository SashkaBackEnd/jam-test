<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "store_triggers_lang".
 *
 * @property int $id
 * @property string|null $lang
 * @property int|null $store_triggers__id
 * @property string|null $title
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class StoreTriggersLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'store_triggers_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['store_triggers__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['title'], 'string', 'max' => 200],
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
            'lang' => 'Lang',
            'store_triggers__id' => 'Store Triggers  ID',
            'title' => 'Title',
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
     * @return \common\models\base\query\StoreTriggersLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\StoreTriggersLangQuery(get_called_class());
    }
}
