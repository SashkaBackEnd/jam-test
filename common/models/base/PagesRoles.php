<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "pages_roles".
 *
 * @property int $id
 * @property int|null $pages__id
 * @property string|null $authitem__name
 * @property int|null $is_view_allowed Разрешить отображение, перекрывает page.is_visible=false
 * @property int|null $is_view_denied Запретить отображение, перекрывает page.is_visible=true
 * @property string|null $url_redirect Адрес перенаправления с старницы в случае отказа в доступе
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PagesRoles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages_roles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pages__id', 'is_view_allowed', 'is_view_denied', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['authitem__name', 'url_redirect'], 'string', 'max' => 255],
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
            'pages__id' => 'Pages  ID',
            'authitem__name' => 'Authitem  Name',
            'is_view_allowed' => 'Is View Allowed',
            'is_view_denied' => 'Is View Denied',
            'url_redirect' => 'Url Redirect',
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
     * @return \common\models\base\query\PagesRolesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PagesRolesQuery(get_called_class());
    }
}
