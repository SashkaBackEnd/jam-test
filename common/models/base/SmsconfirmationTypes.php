<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "smsconfirmation_types".
 *
 * @property int $id
 * @property string $alias Псевдоним типа
 * @property int $is_show_for_admin Суперадминиский статус: показывать администратору сайта или нет: 0 - нет, 1 - да
 * @property int $is_on Статус типа: 0 - выключен, 1 -включен
 * @property int $is_auto Автоматическое отправление: 0 - отправлять администратором вручную, 1 - отправлять автоматически
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class SmsconfirmationTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smsconfirmation_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias'], 'required'],
            [['is_show_for_admin', 'is_on', 'is_auto', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
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
            'is_show_for_admin' => 'Is Show For Admin',
            'is_on' => 'Is On',
            'is_auto' => 'Is Auto',
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
     * @return \common\models\base\query\SmsconfirmationTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\SmsconfirmationTypesQuery(get_called_class());
    }
}
