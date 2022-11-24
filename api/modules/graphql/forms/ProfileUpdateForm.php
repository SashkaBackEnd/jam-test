<?php

namespace api\modules\graphql\forms;

use Yii;
use yii\base\Model;
use api\exceptions\RuntimeException;
use api\models\User;
use yii\helpers\ArrayHelper;

/**
 * Форма для редактировании профиля
 */
class ProfileUpdateForm extends Model
{
    public string $name;
    public string $surname;
    public string $phone;
    public string $company_name;
    public string $company_position;

    public User $user;

    public function rules()
    {
        return [
            [
                [
                    'name',
                    'surname',
                    'phone',
                    'company_name',
                    'company_position',
                ],
                'required'
            ],
            [['name', 'surname', 'phone', 'company_name', 'company_position'], 'string'],
        ];
    }

    public function save()
    {
        $isConfirmedAccount = true;

        $this->user->name = $this->name;
        $this->user->surname = $this->surname;
        $this->user->phone = $this->phone;
        $this->user->work_in_company = $this->company_name;
        $this->user->position_in_company = $this->company_position;

        if ($isConfirmedAccount) {
            $this->user->is_confirmed_account = true;
        }

        if ($this->user->save()) {
            return $this->user;
        }

        throw (new RuntimeException(Yii::t('api', 'Не удалось изменить пользователя')))
                ->setContext(['fields' => $this->user->getErrors()]);
    }
}
