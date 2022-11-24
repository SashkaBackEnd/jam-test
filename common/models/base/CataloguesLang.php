<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "catalogues_lang".
 *
 * @property int $id
 * @property int $catalogues__id
 * @property string|null $lang
 * @property string|null $name
 * @property string|null $description
 * @property string|null $meta_keywords
 * @property string|null $meta_description
 * @property string $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class CataloguesLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catalogues_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['catalogues__id', 'created_at', 'modified_at'], 'required'],
            [['catalogues__id', 'created_by', 'modified_by'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['name', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['meta_keywords', 'meta_description'], 'string', 'max' => 1000],
            [['catalogues__id', 'lang'], 'unique', 'targetAttribute' => ['catalogues__id', 'lang']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'catalogues__id' => 'Catalogues  ID',
            'lang' => 'Lang',
            'name' => 'Name',
            'description' => 'Description',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
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
     * @return \common\models\base\query\CataloguesLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CataloguesLangQuery(get_called_class());
    }
}
