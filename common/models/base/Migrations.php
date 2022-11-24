<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "migrations".
 *
 * @property string $version
 * @property int|null $apply_time
 */
class Migrations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'migrations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['version'], 'required'],
            [['apply_time'], 'integer'],
            [['version'], 'string', 'max' => 180],
            [['version'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'version' => 'Version',
            'apply_time' => 'Apply Time',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\MigrationsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MigrationsQuery(get_called_class());
    }
}
