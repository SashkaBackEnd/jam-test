<?php

declare(strict_types=1);

namespace common\models;

use common\models\base\AuthAssignment;
use common\models\base\Profile as BaseProfile;
use common\models\base\ProfileLang;
use common\models\base\query\ProfileLangQuery;
use common\models\query\ProfileQuery;
use common\models\query\UserQuery;
use yii\db\ActiveQueryInterface;

class Profile extends BaseProfile
{
    /** @var $user User */

    /**
     * @return string[]
     */
    public function attributeLabels(): array
    {
        return [
                'id' => 'ID',
                'fio' => 'ФИО',
            ] + parent::attributeLabels();
    }

    /**
     * @return string|null
     */
    public function getFio(): ?string
    {
        $lang = $this->getLang()->one();

        ($lang->first_name) and $name[] = $lang->first_name;
        ($lang->last_name) and $name[] = $lang->last_name;
        ($lang->second_name) and $name[] = $lang->second_name;

        return isset($name) ? implode(' ', $name) : null;
    }

    /**
     * @return string|null
     */
    public function getFi(): ?string
    {
        ($this->lang->first_name) and $name[] = $this->lang->first_name;
        ($this->lang->last_name) and $name[] = $this->lang->last_name;

        return isset($name) ? implode(' ', $name) : null;
    }

    /**
     * Gets query for [[ProfileLang]].
     *
     * @return ActiveQueryInterface|ProfileLangQuery
     */
    public function getLang(): ActiveQueryInterface|ProfileLangQuery
    {
        return $this->hasOne(ProfileLang::className(), ['profile__id' => 'id'])
            ->where([ProfileLang::tableName() . '.lang' => 'ru']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return ActiveQueryInterface|UserQuery
     */
    public function getSponsor(): ActiveQueryInterface|UserQuery
    {
        return $this->hasOne(User::className(), ['id' => 'sponsor__id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return ActiveQueryInterface|UserQuery
     */
    public function getUser(): ActiveQueryInterface|UserQuery
    {
        return $this->hasOne(User::className(), ['id' => 'user__id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return ActiveQueryInterface|UserQuery
     */
    public function getRole(): ActiveQueryInterface|UserQuery
    {
        return $this->hasOne(AuthAssignment::className(), ['userid' => 'user__id']);
    }

    /**
     * {@inheritdoc}
     * @return ProfileQuery the active query used by this AR class.
     */
    public static function find(): ProfileQuery
    {
        return new ProfileQuery(get_called_class());
    }
}
