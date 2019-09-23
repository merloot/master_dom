<?php

use yii\db\Migration;

/**
 * Class m190916_124754_clients_doors
 */
class m190916_124754_clients_doors extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ClientsDoors',[
           'id_clients_doors' =>$this->primaryKey(),
           'id_client'  =>$this->integer()->unique(),
           'id_doors'   => $this->integer()->unique(),
        ]);

        $this->addForeignKey('ClientsDoors','ClientsDoors','id_client','Clients','idclients');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('ClientsDoors','ClientsDoors');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190916_124754_clients_doors cannot be reverted.\n";

        return false;
    }
    */
}
