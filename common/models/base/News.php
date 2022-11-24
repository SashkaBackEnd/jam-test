<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property int|null $news_types__id
 * @property string|null $publication_from
 * @property string|null $publication_end
 * @property string|null $source
 * @property string|null $source_title
 * @property int|null $show_at_home
 * @property int|null $show_at_office
 * @property int|null $attachment__id
 * @property int $is_visible 1 - отображать новость всем, кроме запрещенных ролей, 0 - скрыть новость от всех, кроме разрешенных ролей
 * @property string $langs
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['news_types__id', 'show_at_home', 'show_at_office', 'attachment__id', 'is_visible', 'created_by', 'modified_by'], 'integer'],
            [['publication_from', 'publication_end', 'created_at', 'modified_at'], 'safe'],
            [['langs'], 'required'],
            [['source'], 'string', 'max' => 1000],
            [['source_title'], 'string', 'max' => 255],
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
            'news_types__id' => 'News Types  ID',
            'publication_from' => 'Publication From',
            'publication_end' => 'Publication End',
            'source' => 'Source',
            'source_title' => 'Source Title',
            'show_at_home' => 'Show At Home',
            'show_at_office' => 'Show At Office',
            'attachment__id' => 'Attachment  ID',
            'is_visible' => 'Is Visible',
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
     * @return \common\models\base\query\NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\NewsQuery(get_called_class());
    }
}
