<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_treepath_bloggers".
 *
 * @property int $parent_id
 * @property int $child_id
 * @property int $depth
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UsersTreepathBloggers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_treepath_bloggers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'child_id', 'depth'], 'required'],
            [['parent_id', 'child_id', 'depth', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_ip', 'modified_ip'], 'string', 'max' => 255],
            [['parent_id', 'child_id'], 'unique', 'targetAttribute' => ['parent_id', 'child_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'parent_id' => 'Parent ID',
            'child_id' => 'Child ID',
            'depth' => 'Depth',
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
     * @return \common\models\base\query\UsersTreepathBloggersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersTreepathBloggersQuery(get_called_class());
    }
}
