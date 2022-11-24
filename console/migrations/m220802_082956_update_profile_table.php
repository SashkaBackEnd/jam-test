<?php

use yii\db\Migration;

/**
 * Class m220802_082956_update_profile_table
 */
class m220802_082956_update_profile_table extends Migration
{
    public const TABLE = '{{%profile}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn(self::TABLE, 'lang__id', $this->integer(11)->null()->defaultValue(0)->comment('Язык пользователя'));
        $this->alterColumn(self::TABLE, 'second_email', $this->string(200)->null()->defaultValue(null)->comment('Дополнительный Email'));
        $this->alterColumn(self::TABLE, 'website', $this->string(255)->null()->defaultValue(null)->comment('Сайт'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn(self::TABLE, 'lang__id', $this->integer(11)->comment('Язык пользователя'));
        $this->alterColumn(self::TABLE, 'second_email', $this->string(200)->comment('Дополнительный Email'));
        $this->alterColumn(self::TABLE, 'website', $this->string(255)->comment('Сайт'));
    }
}
