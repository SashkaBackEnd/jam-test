<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "uploads_shop_admin_childs".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string|null $name
 * @property string|null $row_name имя файла, который загружает пользователь
 * @property string|null $local_name
 * @property string|null $type
 * @property int|null $deleted
 * @property int|null $category__id
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UploadsShopAdminChilds extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uploads_shop_admin_childs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'deleted', 'category__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['name', 'row_name', 'local_name', 'created_ip', 'modified_ip'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'row_name' => 'Row Name',
            'local_name' => 'Local Name',
            'type' => 'Type',
            'deleted' => 'Deleted',
            'category__id' => 'Category  ID',
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
     * @return \common\models\base\query\UploadsShopAdminChildsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UploadsShopAdminChildsQuery(get_called_class());
    }
}
