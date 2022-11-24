<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "langs_deleted".
 *
 * @property int $id
 * @property int|null $lang__id
 * @property string|null $alias
 * @property int $is_default Язык по умолчанию: 0 - нет, 1 - да (может быть только у одного датасета)
 * @property int $is_enabled Статус активности языка: 0 - язык отключен, 1 - язык используется
 * @property int $is_restored Статус языка: 0 - язык удален, 1 - язык восстановлен
 * @property int|null $attachment__id_active
 * @property int|null $attachment__id_nonactive
 * @property string|null $title
 * @property string|null $lang__created_at
 * @property int|null $lang__created_by
 * @property string|null $lang__created_ip
 * @property string|null $lang__modified_at
 * @property int|null $lang__modified_by
 * @property string|null $lang__modified_ip
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class LangsDeleted extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'langs_deleted';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lang__id', 'is_default', 'is_enabled', 'is_restored', 'attachment__id_active', 'attachment__id_nonactive', 'lang__created_by', 'lang__modified_by', 'created_by', 'modified_by'], 'integer'],
            [['lang__created_at', 'lang__modified_at', 'created_at', 'modified_at'], 'safe'],
            [['alias'], 'string', 'max' => 2],
            [['title'], 'string', 'max' => 50],
            [['lang__created_ip', 'lang__modified_ip', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lang__id' => 'Lang  ID',
            'alias' => 'Alias',
            'is_default' => 'Is Default',
            'is_enabled' => 'Is Enabled',
            'is_restored' => 'Is Restored',
            'attachment__id_active' => 'Attachment  Id Active',
            'attachment__id_nonactive' => 'Attachment  Id Nonactive',
            'title' => 'Title',
            'lang__created_at' => 'Lang  Created At',
            'lang__created_by' => 'Lang  Created By',
            'lang__created_ip' => 'Lang  Created Ip',
            'lang__modified_at' => 'Lang  Modified At',
            'lang__modified_by' => 'Lang  Modified By',
            'lang__modified_ip' => 'Lang  Modified Ip',
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
     * @return \common\models\base\query\LangsDeletedQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\LangsDeletedQuery(get_called_class());
    }
}
