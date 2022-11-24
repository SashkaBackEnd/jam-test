<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "faq".
 *
 * @property int $id
 * @property int $faq_categories__id Идентификатор категории
 * @property int $is_visible 1 - отображать новость всем, кроме запрещенных ролей, 0 - скрыть новость от всех, кроме разрешенных ролей
 * @property string $langs
 * @property int|null $sort_no Сортировка
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class Faq extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faq';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['faq_categories__id', 'langs'], 'required'],
            [['faq_categories__id', 'is_visible', 'sort_no', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['langs', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'faq_categories__id' => 'Faq Categories  ID',
            'is_visible' => 'Is Visible',
            'langs' => 'Langs',
            'sort_no' => 'Sort No',
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
     * @return \common\models\base\query\FaqQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FaqQuery(get_called_class());
    }
}
