<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "themes".
 *
 * @property int $id
 * @property string $name
 * @property int $is_active Статус темы: 0 - фоновая, 1 - активная
 * @property int $is_show_for_admin Показывать тему администратору: 0 - нет, 1 - да
 * @property string $type
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class Themes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'themes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['is_active', 'is_show_for_admin', 'created_by', 'modified_by'], 'integer'],
            [['type'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'is_active' => 'Is Active',
            'is_show_for_admin' => 'Is Show For Admin',
            'type' => 'Type',
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
     * @return \common\models\base\query\ThemesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ThemesQuery(get_called_class());
    }
}
