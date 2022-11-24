<?php

declare(strict_types=1);

namespace api\modules\rest\forms;

use api\models\User;
use yii\base\Model;

/**
 * Форма для подтверждения почты
 */
class ConfirmEmailForm extends Model
{
    public string $token = '';

    public ?User $user = null;

    public function rules()
    {
        return [
            [['token'], 'required'],
            [['token'], 'string'],
        ];
    }

    public function changedEmailToNew(): bool
    {
        $user = User::findByVerificationToken($this->token);

        if ($user) {
            $user->email = $user->email_new;
            $user->email_new = null;
            $user->verification_token = null;
            if ($user->save()) {
                return true;
            }
        }

        return false;
    }

    public function getUser(): ?User
    {
        if (is_null($this->user)) {
            $this->user = User::findByVerificationToken($this->token);
        }

        return $this->user;
    }

    /**
     * @return null|bool
     */
    public function isConfirmedEmail()
    {
        return $this->user?->is_confirmed_email;
    }

    public function updateUser(): bool
    {
        if (!$this->user) {
            return false;
        }

        $this->user->is_confirmed_email = true;
        $this->user->verification_token = null;

        return $this->user->save();
    }
}
