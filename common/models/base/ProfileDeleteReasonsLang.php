<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "profile_delete_reasons_lang".
 *
 * @property int $id
 * @property int $profile_delete_reasons__id
 * @property string|null $lang
 * @property string|null $name
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProfileDeleteReasonsLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile_delete_reasons_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['profile_delete_reasons__id'], 'required'],
            [['profile_delete_reasons__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 3],
            [['name'], 'string', 'max' => 500],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['profile_delete_reasons__id', 'lang'], 'unique', 'targetAttribute' => ['profile_delete_reasons__id', 'lang']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'profile_delete_reasons__id' => 'Profile Delete Reasons  ID',
            'lang' => 'Lang',
            'name' => 'Name',
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
     * @return \common\models\base\query\ProfileDeleteReasonsLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProfileDeleteReasonsLangQuery(get_called_class());
    }
}
