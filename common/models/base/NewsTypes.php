<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "news_types".
 *
 * @property int $id
 * @property string|null $alias
 * @property int $is_allowed_show_at_home Предусмотрено ли версткой отображение на главной странице
 * @property int $is_allowed_show_at_office Предусмотрено ли версткой отображениев кабинете
 * @property int $is_allowed_show_source Предусмотрено ли версткой отображение ссылки на источник
 * @property int $is_allowed_show_source_title Предусмотрено ли версткой отображение названия источника
 * @property int $is_allowed_set_any_dates Указание даты при создании новости: 0 - можно указывать интервал дат от текущей даты до 2024, 1 - можно указывать любые даты
 * @property int $is_get_stat_for_user Собирать статистику для пользователей: 0 - таблица news_readed игнорируется, 1 - в таблице сохраняется статистика прочитанных новостей пользователем
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class NewsTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_allowed_show_at_home', 'is_allowed_show_at_office', 'is_allowed_show_source', 'is_allowed_show_source_title', 'is_allowed_set_any_dates', 'is_get_stat_for_user', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias'], 'string', 'max' => 50],
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
            'alias' => 'Alias',
            'is_allowed_show_at_home' => 'Is Allowed Show At Home',
            'is_allowed_show_at_office' => 'Is Allowed Show At Office',
            'is_allowed_show_source' => 'Is Allowed Show Source',
            'is_allowed_show_source_title' => 'Is Allowed Show Source Title',
            'is_allowed_set_any_dates' => 'Is Allowed Set Any Dates',
            'is_get_stat_for_user' => 'Is Get Stat For User',
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
     * @return \common\models\base\query\NewsTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\NewsTypesQuery(get_called_class());
    }
}
