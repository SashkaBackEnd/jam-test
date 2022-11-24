<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "pages_types".
 *
 * @property int $id
 * @property int $wide
 * @property int $l_column
 * @property int $r_column
 * @property int $three_column
 * @property int $max_wide
 * @property int $max_l_column
 * @property int $max_r_column
 * @property int $max_three_column
 * @property int $office_blocks
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PagesTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['wide', 'l_column', 'r_column', 'three_column', 'max_wide', 'max_l_column', 'max_r_column', 'max_three_column', 'office_blocks', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
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
            'wide' => 'Wide',
            'l_column' => 'L Column',
            'r_column' => 'R Column',
            'three_column' => 'Three Column',
            'max_wide' => 'Max Wide',
            'max_l_column' => 'Max L Column',
            'max_r_column' => 'Max R Column',
            'max_three_column' => 'Max Three Column',
            'office_blocks' => 'Office Blocks',
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
     * @return \common\models\base\query\PagesTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PagesTypesQuery(get_called_class());
    }
}
