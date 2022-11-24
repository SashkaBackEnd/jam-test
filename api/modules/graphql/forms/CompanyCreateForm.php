<?php

namespace api\modules\graphql\forms;

use api\exceptions\RuntimeException;
use api\models\{Account, Company, Country, Document, User};
use Yii;
use yii\base\Model;

/**
 * Форма для добавления компании
 */
class CompanyCreateForm extends Model
{
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
            [['name', 'registration_number', 'country_id'], 'required'],
            [['name', 'registration_number', 'site'], 'string'],
            [['country_id'], 'integer'],
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

    public function save()
    {
        $transaction = Yii::$app->db->beginTransaction();

        try {
            $company = new Company();
            $company->name = $this->name;
            $company->registration_number = $this->registration_number;
            $company->site = $this->site;
            $company->country_id = $this->country_id;
            $company->verification_status = Company::VERIFICATION_STATUS_NO;
            $company->account_id = $this->user->account_id;

            if (!$company->save()) {
                $transaction->rollback();

                throw (new RuntimeException(Yii::t('api', 'Не удалось добавить компанию')))
                    ->setContext(['fields' => $company->getErrors()]);
            }

            $company->addNewFiles($this->files_new);

            if (!$company->save()) {
                $transaction->rollback();

                throw (new RuntimeException(Yii::t('api', 'Не удалось добавить компанию')))
                    ->setContext(['fields' => $company->getErrors()]);
            }

            $transaction->commit();

            if ($company->verification_status == Company::VERIFICATION_STATUS_CHECK) {
                $this->successMessage = Yii::t('api', 'Спасибо! Проверка ваших документов может занять несколько дней');
            } else {
                $this->successMessage = Yii::t('api', 'Компания добавлена');
            }

            $this->company = $company;

            return true;
        } catch (\Throwable $th) {
            $transaction->rollback();

            throw new RuntimeException(Yii::t('api', $th->getMessage()));
        }
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
