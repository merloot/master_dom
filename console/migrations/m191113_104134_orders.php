<?php

use yii\db\Migration;

/**
 * Class m191113_104134_orders
 */
class m191113_104134_orders extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('Orders',[
            'id'        => $this->primaryKey(),
            'id_order'  => $this->integer()->notNull(),
            'id_doors'  => $this->integer()->notNull(),
            'id_client' => $this->integer()->notNull(),
            'date_create'=>$this->timestamp()

        ]);

        $this->createIndex('OrdersIndex','Orders',['id_order','id_doors'],true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191113_104134_orders cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191113_104134_orders cannot be reverted.\n";

        return false;
    }
    */
}
