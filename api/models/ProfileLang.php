<?php

declare(strict_types=1);

namespace api\models;

use common\extensions\BehaviorHelper;
use common\models\base\ProfileLang as BaseProfileLang;

class ProfileLang extends BaseProfileLang
{
    /**
     * @return array[]
     */
    public function behaviors(): array
    {
        return [
                'author_id' => BehaviorHelper::getBehaviorBy(),
                'author_ip' => BehaviorHelper::getBehaviorIp(),
                'author_timestamp' => BehaviorHelper::getBehaviorAt(),
            ] + parent::behaviors();
    }
}
