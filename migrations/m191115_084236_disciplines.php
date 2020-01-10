<?php

use yii\db\Migration;

/**
 * Class m191115_084236_disciplines
 */
class m191115_084236_disciplines extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('disciplines', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'lecturer_id' => $this->integer(),
            'year' => $this->integer(),
            'semester' => $this->integer(),
            'hours' => $this->integer(),
            'credits' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191115_084236_disciplines cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191115_084236_disciplines cannot be reverted.\n";

        return false;
    }
    */
}
