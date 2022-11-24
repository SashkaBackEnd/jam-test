<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "slidebar_frames_lang".
 *
 * @property int $id
 * @property int|null $slidebar_frames__id
 * @property string|null $lang
 * @property string|null $text
 * @property string|null $created_at
 * @property string|null $created_ip
 * @property int|null $created_by
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class SlidebarFramesLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slidebar_frames_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slidebar_frames__id', 'created_by', 'modified_by'], 'integer'],
            [['text'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['lang', 'slidebar_frames__id'], 'unique', 'targetAttribute' => ['lang', 'slidebar_frames__id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slidebar_frames__id' => 'Slidebar Frames  ID',
            'lang' => 'Lang',
            'text' => 'Text',
            'created_at' => 'Created At',
            'created_ip' => 'Created Ip',
            'created_by' => 'Created By',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\SlidebarFramesLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\SlidebarFramesLangQuery(get_called_class());
    }
}
