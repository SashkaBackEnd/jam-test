<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "wallets_confirmation_methods".
 *
 * @property int $id
 * @property string|null $alias
 * @property int|null $sort
 * @property string|null $class Класс обработчик
 * @property int|null $status
 * @property int|null $disable_off
 * @property string|null $created_at Дата создания записи. Техническое поле
 * @property int|null $created_by ID ВебПользователя кто создавал запись. Техническое поле
 * @property string|null $created_ip
 * @property string|null $modified_at Дата редактирования записи. Техническое поле
 * @property int|null $modified_by ID ВебПользователя кто вносил изменения. Техническое поле
 * @property string|null $modified_ip
 */
class WalletsConfirmationMethods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wallets_confirmation_methods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort', 'status', 'disable_off', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['class'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'sort' => 'Sort',
            'class' => 'Class',
            'status' => 'Status',
            'disable_off' => 'Disable Off',
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
     * @return \common\models\base\query\WalletsConfirmationMethodsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\WalletsConfirmationMethodsQuery(get_called_class());
    }
}
