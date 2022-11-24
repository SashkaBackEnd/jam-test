<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "matrix_params_lang".
 *
 * @property int $id
 * @property int|null $matrix_params__id
 * @property string|null $lang
 * @property string $name
 * @property string $label
 * @property string|null $description
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MatrixParamsLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matrix_params_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['matrix_params__id', 'created_by', 'modified_by'], 'integer'],
            [['name', 'label'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['name', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['label'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'matrix_params__id' => 'Matrix Params  ID',
            'lang' => 'Lang',
            'name' => 'Name',
            'label' => 'Label',
            'description' => 'Description',
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
     * @return \common\models\base\query\MatrixParamsLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MatrixParamsLangQuery(get_called_class());
    }
}
