<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "store_triggers_history".
 *
 * @property int $id
 * @property int $store_pay_types__id тип оплаты
 * @property int $store_delivery_types__id тип доставки
 * @property int $status_horders статус заказа
 * @property string|null $authitem__role Роль из AuthItem связанная с настройкой
 * @property string|null $authitem__operation Операция из AuthItem связанная с настройкой
 * @property string|null $path Путь к классу, обработчику события
 * @property string|null $class Название класса
 * @property string|null $method Название метода
 * @property string|null $module_owner Имя модуля владельца
 * @property int|null $is_active Активный или нет
 * @property int $sort_no
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class StoreTriggersHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'store_triggers_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['store_pay_types__id', 'store_delivery_types__id', 'status_horders'], 'required'],
            [['store_pay_types__id', 'store_delivery_types__id', 'status_horders', 'is_active', 'sort_no', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['authitem__role', 'authitem__operation', 'class', 'method', 'module_owner', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['path'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'store_pay_types__id' => 'Store Pay Types  ID',
            'store_delivery_types__id' => 'Store Delivery Types  ID',
            'status_horders' => 'Status Horders',
            'authitem__role' => 'Authitem  Role',
            'authitem__operation' => 'Authitem  Operation',
            'path' => 'Path',
            'class' => 'Class',
            'method' => 'Method',
            'module_owner' => 'Module Owner',
            'is_active' => 'Is Active',
            'sort_no' => 'Sort No',
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
     * @return \common\models\base\query\StoreTriggersHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\StoreTriggersHistoryQuery(get_called_class());
    }
}
