<?php

use yii\db\Migration;

/**
 * Class m191009_115247_fix_client_doors
 */
class m191009_115247_fix_client_doors extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropPrimaryKey('pk_ClientDoors','ClientsDoors');
        $this->dropForeignKey('ClientsDoorsClient','ClientsDoors');
        $this->dropForeignKey('ClientsDoorsDoors','ClientsDoors');
        $this->dropTable('ClientsDoors');
        $this->addColumn('Doors','client_id',$this->integer());
        $this->addForeignKey('ClientsDoors','Doors','client_id','Clients','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191009_115247_fix_client_doors cannot be reverted.\n";

        return false;
    }
    */
}
