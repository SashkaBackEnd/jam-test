<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "matrix_types".
 *
 * @property int $id
 * @property string $alias Алиас матрицы (идентификатор для админки)
 * @property int $is_active Статус матрицы: 0 - выключена, 1 - включена
 * @property int $is_allowed_after_register Доступность матрицы для зарегистрированных пользователей (1 - доступна, 2 - нет)
 * @property int $is_depth Статус глубины матрицы (0 - матрица бесконечная, 1 - глубина определяется по полю depth_level)
 * @property int $width_level Ширина матрицы (1 - цепочка, 2 - бинар, 3 - тринар)
 * @property int|null $depth_level Глубина матрицы
 * @property int $is_proportional Пропорциональность матрицы: 0 - в матрице определенное количество пользователей на разных уровнях (задается из таблицы matrix_types_positions), 1 - матрица пропорциональна
 * @property float|null $price Цена вступления в матрицу
 * @property int|null $finance_transactions__id_in Фин. операция приобретения позиции в матрице
 * @property int|null $finance_transactions__id_reinvest Фин. операция реинвеста в матрицу
 * @property int $is_allowed_multiple_active_for_user Возможность пользователю иметь несколько активных позиций в матрице: 0 - нельзя, 1 - можно
 * @property int|null $is_limited_active_positions Ограничить количество активных позиций для пользователя. Актуально только при is_allowed_multiple_active_for_user = true. 0 - неграниченное количество, 1 - ограничить
 * @property int|null $limited_active_positions_for_user Максимально допустимое количество активных позиций для пользователя. Актуально при is_limited_active_positions = true
 * @property int $is_allowed_multiple_owners_for_token Возможность нескольким пользователям находиться в одной ячейке
 * @property int $is_branches_after_close Делящаяся матрица (0 - матрица не делится, 1 - матрица делится после закрытия)
 * @property int $is_user_top_in_matrix Свойство логики отображения: показывать текущего пользователя в матрице всегда наверху: 0 - нет (фиксированные и делящиеся матрицы), 1 - да
 * @property int $is_clickable_tokens Кликабельность ячеек: 0 - не кликабельные, 1 - кликабельные
 * @property int $is_allowed_user_search Возможность поиска матрицы по пользователю: 0 - нет, 1 - есть
 * @property int $is_allowed_matrix_search Возможность поиска матрицы по номеру: 0 - нет, 1 - есть
 * @property int $matrix_filltypes__id Тип заполнения матрицы
 * @property int|null $matrix_fillpriorities__id Приоритет заполнения
 * @property int $matrix_types_filling_in_types__id
 * @property string|null $view Название шаблона для отображения
 * @property string|null $template Название шаблона для обычного виджета
 * @property int $is_show_token_from_user_structure Показывать структуры матриц для любого пользователя из структуры по личным приглашениям. Актуально для неделящихся матриц с is_user_top_in_matrix = 1
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MatrixTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matrix_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias', 'matrix_filltypes__id', 'matrix_types_filling_in_types__id'], 'required'],
            [['is_active', 'is_allowed_after_register', 'is_depth', 'width_level', 'depth_level', 'is_proportional', 'finance_transactions__id_in', 'finance_transactions__id_reinvest', 'is_allowed_multiple_active_for_user', 'is_limited_active_positions', 'limited_active_positions_for_user', 'is_allowed_multiple_owners_for_token', 'is_branches_after_close', 'is_user_top_in_matrix', 'is_clickable_tokens', 'is_allowed_user_search', 'is_allowed_matrix_search', 'matrix_filltypes__id', 'matrix_fillpriorities__id', 'matrix_types_filling_in_types__id', 'is_show_token_from_user_structure', 'created_by', 'modified_by'], 'integer'],
            [['price'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias'], 'string', 'max' => 30],
            [['view', 'template'], 'string', 'max' => 50],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'is_active' => 'Is Active',
            'is_allowed_after_register' => 'Is Allowed After Register',
            'is_depth' => 'Is Depth',
            'width_level' => 'Width Level',
            'depth_level' => 'Depth Level',
            'is_proportional' => 'Is Proportional',
            'price' => 'Price',
            'finance_transactions__id_in' => 'Finance Transactions  Id In',
            'finance_transactions__id_reinvest' => 'Finance Transactions  Id Reinvest',
            'is_allowed_multiple_active_for_user' => 'Is Allowed Multiple Active For User',
            'is_limited_active_positions' => 'Is Limited Active Positions',
            'limited_active_positions_for_user' => 'Limited Active Positions For User',
            'is_allowed_multiple_owners_for_token' => 'Is Allowed Multiple Owners For Token',
            'is_branches_after_close' => 'Is Branches After Close',
            'is_user_top_in_matrix' => 'Is User Top In Matrix',
            'is_clickable_tokens' => 'Is Clickable Tokens',
            'is_allowed_user_search' => 'Is Allowed User Search',
            'is_allowed_matrix_search' => 'Is Allowed Matrix Search',
            'matrix_filltypes__id' => 'Matrix Filltypes  ID',
            'matrix_fillpriorities__id' => 'Matrix Fillpriorities  ID',
            'matrix_types_filling_in_types__id' => 'Matrix Types Filling In Types  ID',
            'view' => 'View',
            'template' => 'Template',
            'is_show_token_from_user_structure' => 'Is Show Token From User Structure',
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
     * @return \common\models\base\query\MatrixTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MatrixTypesQuery(get_called_class());
    }
}
