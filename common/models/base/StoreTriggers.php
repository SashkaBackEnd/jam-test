<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "store_triggers".
 *
 * @property int $id
 * @property int $store_pay_types__id тип оплаты: -1 -  все типы оплаты
 * @property int $store_delivery_types__id тип доставки: -1 -  все типы доставки 
 * @property int $status_horders статус заказа: -1  - все статусы заказа 
 * @property string|null $authitem__operation Операция из AuthItem связанная с настройкой
 * @property string|null $path Путь к классу, обработчику события
 * @property string|null $class Название класса
 * @property string|null $method Название метода
 * @property string|null $module_owner Имя модуля владельца
 * @property int|null $is_active Активный или нет
 * @property int $sort_no
 * @property string|null $authitem__role
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class StoreTriggers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'store_triggers';
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
            [['authitem__operation', 'class', 'method', 'module_owner', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['path'], 'string', 'max' => 1000],
            [['authitem__role'], 'string', 'max' => 255],
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
            'authitem__operation' => 'Authitem  Operation',
            'path' => 'Path',
            'class' => 'Class',
            'method' => 'Method',
            'module_owner' => 'Module Owner',
            'is_active' => 'Is Active',
            'sort_no' => 'Sort No',
            'authitem__role' => 'Authitem  Role',
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
     * @return \common\models\base\query\StoreTriggersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\StoreTriggersQuery(get_called_class());
    }
}
