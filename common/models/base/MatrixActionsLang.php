<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "matrix_actions_lang".
 *
 * @property int $id
 * @property int|null $matrix_actions__id
 * @property string|null $lang
 * @property string $name Название действия
 * @property string|null $description Описание действия
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MatrixActionsLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matrix_actions_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['matrix_actions__id', 'created_by', 'modified_by'], 'integer'],
            [['name'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['name', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
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
            'matrix_actions__id' => 'Matrix Actions  ID',
            'lang' => 'Lang',
            'name' => 'Name',
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
     * @return \common\models\base\query\MatrixActionsLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MatrixActionsLangQuery(get_called_class());
    }
}
