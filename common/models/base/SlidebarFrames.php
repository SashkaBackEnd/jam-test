<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "slidebar_frames".
 *
 * @property int $id
 * @property int|null $slidebars__id
 * @property int|null $attachment__id
 * @property int $status_id Статус фрейма: 1 - активный, 2 - неактивный, 3 - удаленный
 * @property int $sort_no
 * @property string|null $link Ссылка
 * @property float $padding_top
 * @property float $padding_left
 * @property float|null $width
 * @property string|null $created_at
 * @property string|null $created_ip
 * @property int|null $created_by
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class SlidebarFrames extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slidebar_frames';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slidebars__id', 'attachment__id', 'status_id', 'sort_no', 'created_by', 'modified_by'], 'integer'],
            [['padding_top', 'padding_left', 'width'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['link'], 'string', 'max' => 200],
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
            'slidebars__id' => 'Slidebars  ID',
            'attachment__id' => 'Attachment  ID',
            'status_id' => 'Status ID',
            'sort_no' => 'Sort No',
            'link' => 'Link',
            'padding_top' => 'Padding Top',
            'padding_left' => 'Padding Left',
            'width' => 'Width',
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
     * @return \common\models\base\query\SlidebarFramesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\SlidebarFramesQuery(get_called_class());
    }
}
