<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "contents".
 *
 * @property int $id
 * @property string|null $xml
 * @property string|null $php
 * @property string $langs
 * @property int|null $themes__id Привязка текстового блока к определенной теме
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class Contents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['xml', 'php'], 'string'],
            [['langs'], 'required'],
            [['themes__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['langs', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'xml' => 'Xml',
            'php' => 'Php',
            'langs' => 'Langs',
            'themes__id' => 'Themes  ID',
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
     * @return \common\models\base\query\ContentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ContentsQuery(get_called_class());
    }
}
