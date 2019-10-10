<?php

use yii\db\Migration;

/**
 * Class m191010_073707_add_index_for_clients
 */
class m191010_073707_add_index_for_clients extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->dropColumn('Clients','FIO');
        $this->addColumn('Clients','FIO', $this->string()->unique());
        $this->createIndex('FIO_Client','Clients','FIO');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('FIO_Client','Clients');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191010_073707_add_index_for_clients cannot be reverted.\n";

        return false;
    }
    */
}
