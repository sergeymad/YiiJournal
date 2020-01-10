<?php

use yii\db\Migration;

/**
 * Class m191115_084253_grades
 */
class m191115_084253_grades extends Migration
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

        $this->createTable('grades', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'semester' => $this->integer(),
            'year' => $this->integer(),
            'disc_id' => $this->integer(),
            'group_id' => $this->integer(),
            'journal' => $this->string(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191115_084253_grades cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191115_084253_grades cannot be reverted.\n";

        return false;
    }
    */
}
