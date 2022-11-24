<?php

declare(strict_types=1);

namespace common\extensions;

use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;
use ruskid\YiiBehaviors\IpBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\BaseActiveRecord;

class BehaviorHelper
{
    /**
     * Behavior ID создателя-модератора
     * @return array
     */
    #[Pure] #[ArrayShape(['class' => "string", 'createdByAttribute' => "string", 'updatedByAttribute' => "string"])]
    public static function getBehaviorBy(): array
    {
        return [
            'class' => BlameableBehavior::className(),
            'createdByAttribute' => 'created_by',
            'updatedByAttribute' => 'modified_by',
        ];
    }

    /**
     * Behavior IP создателя-модератора
     * @return array
     */
    #[Pure] #[ArrayShape(['class' => "string", 'attributes' => "string[]"])]
    public static function getBehaviorIp(): array
    {
        return [
            'class' => IpBehavior::className(),
            'attributes' => [
                BaseActiveRecord::EVENT_BEFORE_INSERT => 'created_ip',
                BaseActiveRecord::EVENT_BEFORE_UPDATE => 'modified_ip',
            ],
        ];
    }

    /**
     * Behavior Время создания-модерации
     * @return array
     */
    #[Pure(true)] #[ArrayShape(['class' => "string", 'attributes' => "string[]", 'value' => "string"])]
    public static function getBehaviorAt(): array
    {
        return [
            'class' => TimestampBehavior::className(),
            'attributes' => [
                BaseActiveRecord::EVENT_BEFORE_INSERT => 'created_at',
                BaseActiveRecord::EVENT_BEFORE_UPDATE => 'modified_at',
            ],
            'value' => date('Y-m-d H:i:s')
        ];
    }
}