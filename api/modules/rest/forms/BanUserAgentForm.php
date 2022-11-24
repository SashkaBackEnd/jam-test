<?php

declare(strict_types=1);

namespace api\modules\rest\forms;

use common\models\base\UserAgent;
use api\models\UserRefreshTokens;
use yii\base\Model;

class BanUserAgentForm extends Model
{
    public string $token = '';

    public function rules()
    {
        return [
            [['token'], 'required'],
            [['token'], 'string'],
        ];
    }

    public function banAgent()
    {
        $userAgent = UserAgent::findByToken($this->token);

        if ($userAgent) {
            $userAgent->is_allowed = false;
            $userAgent->token = null;

            if ($userAgent->save()) {
                $userRefreshToken = UserRefreshTokens::findByUserIdAndUserAgent(
                    $userAgent->user_id,
                    $userAgent->user_agent
                );
                $userRefreshToken?->delete();

                return true;
            }
        }

        return false;
    }
}
