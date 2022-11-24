<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "langs".
 *
 * @property int $id
 * @property string|null $alias
 * @property string|null $origin_title
 * @property int $is_default Язык по умолчанию: 0 - нет, 1 - да (может быть только у одного датасета)
 * @property int $is_enabled Статус активности языка: 0 - язык отключен, 1 - язык используется
 * @property int|null $is_active Показывать ли пользователю в меню
 * @property int $base_translate_lang Статус, является ли язык базовым для создания записи: 0 - не базовый язык, 1 - базовый язык для перевода
 * @property int|null $attachment__id_active
 * @property int|null $attachment__id_nonactive
 * @property string $default_icon
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class Langs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'langs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_default', 'is_enabled', 'is_active', 'base_translate_lang', 'attachment__id_active', 'attachment__id_nonactive', 'created_by', 'modified_by'], 'integer'],
            [['default_icon'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias'], 'string', 'max' => 2],
            [['origin_title'], 'string', 'max' => 50],
            [['default_icon'], 'string', 'max' => 30],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['alias'], 'unique'],
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
            'origin_title' => 'Origin Title',
            'is_default' => 'Is Default',
            'is_enabled' => 'Is Enabled',
            'is_active' => 'Is Active',
            'base_translate_lang' => 'Base Translate Lang',
            'attachment__id_active' => 'Attachment  Id Active',
            'attachment__id_nonactive' => 'Attachment  Id Nonactive',
            'default_icon' => 'Default Icon',
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
     * @return \common\models\base\query\LangsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\LangsQuery(get_called_class());
    }
}
