<?php

use yii\db\Migration;

/**
 * Class m190916_131124_service_doors
 */
class m190916_131124_service_doors extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ServiceDoors',[
            'id' =>$this->primaryKey(),
            'id_service' => $this->integer()->comment(''),
            'id_doors' =>$this->integer()->comment(''),
            'count_service' =>$this->integer()->comment(''),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('ServiceDoors');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190916_131124_service_doors cannot be reverted.\n";

        return false;
    }
    */
}
