<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "system_design_lang".
 *
 * @property int $id
 * @property int $system_design__id
 * @property string $lang
 * @property string|null $title
 * @property string|null $description
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class SystemDesignLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_design_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['system_design__id', 'lang'], 'required'],
            [['system_design__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['title', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 200],
            [['system_design__id', 'lang'], 'unique', 'targetAttribute' => ['system_design__id', 'lang']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'system_design__id' => 'System Design  ID',
            'lang' => 'Lang',
            'title' => 'Title',
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
     * @return \common\models\base\query\SystemDesignLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\SystemDesignLangQuery(get_called_class());
    }
}
