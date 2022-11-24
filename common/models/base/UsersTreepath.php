<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_treepath".
 *
 * @property int $parent_id Идентификатор предка из таблицы users
 * @property int $child_id Идентификатор потомка из таблицы users
 * @property int $depth Глубина потомка относительно предка
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 *
 * @property Users $child
 * @property Users $parent
 */
class UsersTreepath extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_treepath';
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
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['parent_id', 'child_id'], 'unique', 'targetAttribute' => ['parent_id', 'child_id']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['parent_id' => 'id']],
            [['child_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['child_id' => 'id']],
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
     * Gets query for [[Child]].
     *
     * @return \yii\db\ActiveQuery|\common\models\base\query\UsersQuery
     */
    public function getChild()
    {
        return $this->hasOne(Users::className(), ['id' => 'child_id']);
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery|\common\models\base\query\UsersQuery
     */
    public function getParent()
    {
        return $this->hasOne(Users::className(), ['id' => 'parent_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\UsersTreepathQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersTreepathQuery(get_called_class());
    }
}
