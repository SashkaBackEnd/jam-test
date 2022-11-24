<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "faq_categories".
 *
 * @property int $id
 * @property int $is_active 0- не активная категория, 1- активная
 * @property int|null $sort_no порядок сортировки
 * @property string $langs
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class FaqCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faq_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active', 'sort_no', 'created_by', 'modified_by'], 'integer'],
            [['langs'], 'required'],
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
            'is_active' => 'Is Active',
            'sort_no' => 'Sort No',
            'langs' => 'Langs',
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
     * @return \common\models\base\query\FaqCategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FaqCategoriesQuery(get_called_class());
    }
}
