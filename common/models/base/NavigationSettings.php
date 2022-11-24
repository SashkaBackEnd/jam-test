<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "navigation_settings".
 *
 * @property int $id
 * @property int $allowed_admin_fill_alias Разрешить администратору видеть/редактировать/создавать псевдонимы пунктов меню: 1 - разрешено, 2 - запрещено
 * @property int $allowed_fill_picture Возможность загрузки картинок к пунктам меню: 1 - есть возможность, 2 - возможности нет
 * @property int $allowed_admin_fill_picture Разрешить администратору редактировать/создавать картинки пунктов меню: 1 - разрешено, 2 - запрещено
 * @property int|null $redirect_type_after_save Куда перенаправлять браузер после создания или редактирования пункта навигации 1 - список всех пунктов, 2 - просмотр созданного/отредактированного
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class NavigationSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'navigation_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['allowed_admin_fill_alias', 'allowed_fill_picture', 'allowed_admin_fill_picture', 'redirect_type_after_save', 'created_by', 'modified_by'], 'integer'],
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
            'allowed_admin_fill_alias' => 'Allowed Admin Fill Alias',
            'allowed_fill_picture' => 'Allowed Fill Picture',
            'allowed_admin_fill_picture' => 'Allowed Admin Fill Picture',
            'redirect_type_after_save' => 'Redirect Type After Save',
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
     * @return \common\models\base\query\NavigationSettingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\NavigationSettingsQuery(get_called_class());
    }
}
