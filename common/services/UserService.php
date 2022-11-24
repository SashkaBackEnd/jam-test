<?php

declare(strict_types=1);

namespace common\services;

use api\exceptions\ForbiddenHttpException;
use api\models\Langs;
use api\models\Profile;
use api\models\Users;
use api\modules\rest\forms\RegistrationForm;
use common\models\base\ProfileLang;
use Yii;

class UserService
{
    /**
     * Регистрация пользователя
     * @param RegistrationForm $form
     * @return Users
     * @throws ForbiddenHttpException
     */
    public static function registration(RegistrationForm $form): Users
    {
        $transaction = Yii::$app->db->beginTransaction();
        $user = new Users();

        /** @var Profile $sponsor->profile */
        if (!$sponsor = Users::find()->joinWith('profile')->byUsername($form->sponsor_login)->one()) {
            throw new ForbiddenHttpException(Yii::t('api', 'Ошибка сервера'));
        }

        try {
            $user->username = $form->username;
            $user->email = $form->email;
            $user->password = $user->finpassword = Yii::$app->security->generatePasswordHash($form->password);
            if (!$user->save()) {
                $transaction->rollback();
                $user->addError('save', Yii::t('api', 'Ошибка сервера'));
                return $user;
            }

            $profile = new Profile();
            $profile->user__id = $user->id;
            $profile->guid = '';
            $profile->users_register_statuses__id = 1;
            $profile->sponsor__id = $sponsor->id;
            $profile->upline = $sponsor->profile->upline . '.' . str_pad((string)$user->id, 8, '0', STR_PAD_LEFT);
            $profile->tree_level = ++$sponsor->profile->tree_level;
            $profile->phone = $form->phone;

            if (!$profile->save()) {
                $transaction->rollback();
                throw new ForbiddenHttpException(Yii::t('api', 'Ошибка сервера'));
            }

            list($last_name, $first_name, $second_name) = explode(' ', $form->fio);
            $profileLang = new ProfileLang();
            $profileLang->lang = Langs::LANGUAGE_RU;
            $profileLang->user__id = $user->id;
            $profileLang->profile__id = $profile->id;
            $profileLang->last_name = $last_name;
            $profileLang->first_name = $first_name;
            $profileLang->second_name = $second_name;

            if (!$profileLang->save()) {
                $transaction->rollback();
                throw new ForbiddenHttpException(Yii::t('api', 'Ошибка сервера'));
            }

            $transaction->commit();
        } catch (\Throwable $th) {
            $transaction->rollback();
            throw new ForbiddenHttpException(Yii::t('api', 'Ошибка сервера'));
        };

        return $user;
    }
}
