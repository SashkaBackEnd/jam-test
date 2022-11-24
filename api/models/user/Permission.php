<?php

declare(strict_types=1);

namespace api\models\user;

use api\models\Profile;
use api\models\ProfileLang;
use api\models\User;
use yii\base\InvalidConfigException;

class Permission
{
    public function __construct(
        private User $user,
        /** @var $profile Profile */
        private ?Profile $profile = null,
        private ?ProfileLang $profile_lang = null,
        private ?bool $is_buy = null
    ) {
        $this->profile = $user->profile;
        $this->profile_lang = $this->profile->lang;
    }

    public function getIsBuy(): bool
    {
        return $this->is_buy ??= ($this->profile
        && $this->profile->phone
        && $this->profile->series_passport
        && $this->profile->taxpayer_identification_number
        && $this->profile->bank_name
        && $this->profile->checking_account
        && $this->profile->bik_number
        && $this->profile->zip_code
        );
    }

    public function getIsProfileCompleted(): bool
    {
        return $this->is_profile_completed ??= ($this->getIsBuy()
            && $this->profile_lang->first_name
            && $this->profile_lang->last_name
            && $this->profile_lang->second_name
            && $this->profile_lang->pen_name
            && $this->profile_lang->address
        );
    }

    public function getIsClient(): bool
    {
        return true;
    }

    /**
     * @throws InvalidConfigException
     */
    public function getIsPartner(): bool
    {
        return !empty($this->user->getStartPackage()->one());
    }

    public function getIsAdmin(): bool
    {
        return $this->user->username == 'Admin';
    }

    public function getIsWarehouse(): bool
    {
        return !empty($this->user->getWarehouse()->one());
    }
}
