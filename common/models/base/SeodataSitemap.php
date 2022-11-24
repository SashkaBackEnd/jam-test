<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "seodata_sitemap".
 *
 * @property int $id
 * @property string|null $alias
 * @property int|null $count_page
 * @property float $priority_rubric
 * @property float $priority_static
 * @property float $priority_news
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class SeodataSitemap extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seodata_sitemap';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['count_page', 'created_by', 'modified_by'], 'integer'],
            [['priority_rubric', 'priority_static', 'priority_news'], 'required'],
            [['priority_rubric', 'priority_static', 'priority_news'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
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
            'count_page' => 'Count Page',
            'priority_rubric' => 'Priority Rubric',
            'priority_static' => 'Priority Static',
            'priority_news' => 'Priority News',
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
     * @return \common\models\base\query\SeodataSitemapQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\SeodataSitemapQuery(get_called_class());
    }
}
