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
           'id_client'  =>$this->integer(),
           'id_doors'   => $this->integer(),
        ]);

        $this->addPrimaryKey('pk_ClientDoors', 'ClientsDoors', ['id_client', 'id_doors']);
        $this->addForeignKey('ClientsDoorsClient','ClientsDoors','id_client','Clients','id');
        $this->addForeignKey('ClientsDoorsDoors','ClientsDoors','id_doors','Doors','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_ClientDoors','ClientsDoors');
        $this->dropForeignKey('ClientsDoorsClient','ClientsDoors');
        $this->dropForeignKey('ClientsDoorsDoors','ClientsDoors');
        $this->dropTable('ClientsDoors');
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
