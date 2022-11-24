<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "navigation_roles".
 *
 * @property int $id
 * @property int|null $navigation__id
 * @property string|null $authitem__name
 * @property int|null $is_view_allowed Разрешить отображение, перекрывает navigation.is_visible=false
 * @property int|null $is_view_denied Запретить отображение, перекрывает navigation.is_visible=true
 * @property int|null $is_edit Разрешить редактировать пункт. Устанавливается под суперпользователем
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class NavigationRoles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'navigation_roles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['navigation__id', 'is_view_allowed', 'is_view_denied', 'is_edit', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['authitem__name'], 'string', 'max' => 255],
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
            'navigation__id' => 'Navigation  ID',
            'authitem__name' => 'Authitem  Name',
            'is_view_allowed' => 'Is View Allowed',
            'is_view_denied' => 'Is View Denied',
            'is_edit' => 'Is Edit',
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
     * @return \common\models\base\query\NavigationRolesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\NavigationRolesQuery(get_called_class());
    }
}
