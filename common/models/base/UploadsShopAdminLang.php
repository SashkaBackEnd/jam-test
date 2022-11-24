<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "uploads_shop_admin_lang".
 *
 * @property int $id
 * @property int|null $uploads_admin__id
 * @property string|null $lang
 * @property string|null $key_words
 * @property string|null $author
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UploadsShopAdminLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uploads_shop_admin_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uploads_admin__id', 'created_by', 'modified_by'], 'integer'],
            [['key_words'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 10],
            [['author', 'created_ip', 'modified_ip'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uploads_admin__id' => 'Uploads Admin  ID',
            'lang' => 'Lang',
            'key_words' => 'Key Words',
            'author' => 'Author',
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
     * @return \common\models\base\query\UploadsShopAdminLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UploadsShopAdminLangQuery(get_called_class());
    }
}
