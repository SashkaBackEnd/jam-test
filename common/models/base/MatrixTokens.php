<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "matrix_tokens".
 *
 * @property int $id
 * @property int $users__id
 * @property int|null $matrix_tokens_owners__id ID ячейки, актуально для матриц, в которых несколько пользователей могут нахрдится в одной ячейке
 * @property int $matrix_types__id Тип матрицы
 * @property string $guid Гуид ячейки. Уникальное и обязательное поле
 * @property int $matrix_statuses__id Статус матрицы: 1 - Матрица активная; 2 - Матрица в ожидании закрытия; 3 - Матрицы закрытая; 4 - Матрица удалена
 * @property int $parent_id id родительской ячейки
 * @property int $rank Позиция: при бинаре 1 - слева, 2 - справа; при тринаре 1 - слева, 2 - по середине, 3 - справа
 * @property string|null $upline upline матрицы
 * @property int|null $num Порядковый номер данного типа матрицы относительно пользователя
 * @property int|null $number Абсолютный порядковый номер
 * @property int|null $level Уровень матрицы в общем дереве
 * @property int $matrix_volume Уровень матрицы при делении, актуально для делящихся матриц
 * @property string|null $matrix_volume_visible Уровень матрицы при делении, отображаемый пользователю, актуально для делящихся матриц
 * @property int|null $profile__sponsor__id Спонсор пользователя на момент открытия матрицы
 * @property string|null $profile__upline upline пользователя на момент открытия матрицы
 * @property int|null $finance_transactions__id_in id транзакции приобретения позиции в матрице
 * @property int|null $finance_transactions__id_out id транзакции выплаты бонуса
 * @property string|null $status_at Время последнего изменения статуса матрицы
 * @property string|null $closed_at Время закрытия матрицы
 * @property int|null $distrs_count Количество лично-приглашенных в матрице на момент закрытия
 * @property int|null $parent_divided_id ID токена до разделения матрицы (актуально для делящихся матриц)
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MatrixTokens extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matrix_tokens';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id', 'matrix_types__id', 'guid', 'matrix_statuses__id', 'parent_id', 'rank'], 'required'],
            [['users__id', 'matrix_tokens_owners__id', 'matrix_types__id', 'matrix_statuses__id', 'parent_id', 'rank', 'num', 'number', 'level', 'matrix_volume', 'profile__sponsor__id', 'finance_transactions__id_in', 'finance_transactions__id_out', 'distrs_count', 'parent_divided_id', 'created_by', 'modified_by'], 'integer'],
            [['status_at', 'closed_at', 'created_at', 'modified_at'], 'safe'],
            [['guid'], 'string', 'max' => 32],
            [['upline'], 'string', 'max' => 12288],
            [['matrix_volume_visible', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['profile__upline'], 'string', 'max' => 4096],
            [['parent_id', 'rank', 'matrix_volume', 'matrix_types__id'], 'unique', 'targetAttribute' => ['parent_id', 'rank', 'matrix_volume', 'matrix_types__id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'users__id' => 'Users  ID',
            'matrix_tokens_owners__id' => 'Matrix Tokens Owners  ID',
            'matrix_types__id' => 'Matrix Types  ID',
            'guid' => 'Guid',
            'matrix_statuses__id' => 'Matrix Statuses  ID',
            'parent_id' => 'Parent ID',
            'rank' => 'Rank',
            'upline' => 'Upline',
            'num' => 'Num',
            'number' => 'Number',
            'level' => 'Level',
            'matrix_volume' => 'Matrix Volume',
            'matrix_volume_visible' => 'Matrix Volume Visible',
            'profile__sponsor__id' => 'Profile  Sponsor  ID',
            'profile__upline' => 'Profile  Upline',
            'finance_transactions__id_in' => 'Finance Transactions  Id In',
            'finance_transactions__id_out' => 'Finance Transactions  Id Out',
            'status_at' => 'Status At',
            'closed_at' => 'Closed At',
            'distrs_count' => 'Distrs Count',
            'parent_divided_id' => 'Parent Divided ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'created_ip' => 'Created Ip',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\MatrixTokensQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MatrixTokensQuery(get_called_class());
    }
}
