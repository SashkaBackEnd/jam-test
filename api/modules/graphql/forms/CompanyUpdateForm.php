<?php

namespace api\modules\graphql\forms;

use Yii;
use yii\base\Model;
use api\exceptions\{NotFoundException, RuntimeException};
use api\models\{Company, Country, Document, User};

/**
 * Форма для редактировании компании
 */
class CompanyUpdateForm extends Model
{
    public int $id;
    public string $name;
    public string $registration_number;
    public string $site = '';
    public int $country_id;
    public $files_new;
    public $files_old;

    public User $user;
    private Company $company;
    private string $successMessage;

    public function rules()
    {
        return [
            [['name', 'registration_number', 'country_id', 'id'], 'required'],
            [['name', 'registration_number', 'site'], 'string'],
            [['country_id', 'id'], 'integer'],
            [
                ['country_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Country::class,
                'targetAttribute' => ['country_id' => 'id']
            ],
            [['files_new', 'files_old'], 'safe'],
        ];
    }

    /**
     * Принадлежит ли компания пользователю?
     *
     * @return null|Company
     */
    private function findCompany(): null|Company
    {
        return Company::findOne([
            'id' => $this->id,
            'account_id' => $this->user->account_id
        ]);
    }

    public function save()
    {
        $company = $this->findCompany();

        if (!$company) {
            throw new NotFoundException(Yii::t('api', 'Компания не найдена'));
        }

        $company->name = $this->name;
        $company->registration_number = $this->registration_number;
        $company->site = $this->site;
        $company->country_id = $this->country_id;
        $company->verification_status = Company::VERIFICATION_STATUS_CHECK;

        $company->modifyExistingFiles($this->files_old);
        $company->addNewFiles($this->files_new);

        if ($company->verification_status == Company::VERIFICATION_STATUS_CHECK) {
            $this->successMessage = Yii::t('api', 'Спасибо! Проверка ваших документов может занять несколько дней');
        } else {
            $this->successMessage = Yii::t('api', 'Компания изменена');
        }

        if (!$company->save()) {
            throw (new RuntimeException(Yii::t('api', 'Не удалось изменить компанию')))
                ->setContext(['fields' => $company->getErrors()]);
        }

        $this->company = $company;

        return true;
    }

    public function getCompany(): Company
    {
        return $this->company;
    }

    public function getSuccessMessage(): string
    {
        return $this->successMessage;
    }
}
