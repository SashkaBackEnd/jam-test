<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "autotranslate_categories".
 *
 * @property int $id
 * @property string $alias
 * @property string|null $import
 * @property string|null $class_name
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class AutotranslateCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'autotranslate_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_by', 'modified_by'], 'integer'],
            [['alias', 'class_name', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['import'], 'string', 'max' => 200],
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
            'import' => 'Import',
            'class_name' => 'Class Name',
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
     * @return \common\models\base\query\AutotranslateCategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\AutotranslateCategoriesQuery(get_called_class());
    }
}
