<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "news_readed".
 *
 * @property int $id
 * @property int|null $news__id
 * @property int|null $users__id
 * @property int $count Количество чтений новости
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class NewsReaded extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_readed';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['news__id', 'users__id', 'count', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['news__id', 'users__id'], 'unique', 'targetAttribute' => ['news__id', 'users__id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'news__id' => 'News  ID',
            'users__id' => 'Users  ID',
            'count' => 'Count',
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
     * @return \common\models\base\query\NewsReadedQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\NewsReadedQuery(get_called_class());
    }
}
