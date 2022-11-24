<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "paymentsystem_paykassa_windraw_system".
 *
 * @property int $id
 * @property string $alias
 * @property string $name
 * @property int|null $is_active
 * @property string|null $created_at
 * @property int|null $created_by ID веб-пользователя (users.id), который создал запись
 * @property string|null $created_ip IP веб-пользователя (users.id), который создал запись
 * @property string|null $modified_at Время создания записи
 * @property int|null $modified_by ID веб-пользователя (users.id), который внес изменения
 * @property string|null $modified_ip IP веб-пользователя (users.id), который внес изменения
 */
class PaymentsystemPaykassaWindrawSystem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentsystem_paykassa_windraw_system';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias', 'name'], 'required'],
            [['is_active', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias'], 'string', 'max' => 50],
            [['name', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['alias'], 'unique'],
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
            'name' => 'Name',
            'is_active' => 'Is Active',
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
     * @return \common\models\base\query\PaymentsystemPaykassaWindrawSystemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsystemPaykassaWindrawSystemQuery(get_called_class());
    }
}
