<?php

use yii\db\Migration;

/**
 * Class m190923_132339_foreign_key_price_doors
 */
class m190923_132339_foreign_key_price_doors extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('ServiceDoorsService','ServiceDoors','id_service','ServicePrice','id');
        $this->addForeignKey('ServiceDoorsDoors','ServiceDoors','id_doors','Doors','id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('ServiceDoorsService','ServiceDoors');
        $this->dropForeignKey('ServiceDoorsDoors','ServiceDoors');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190923_132339_foreign_key_price_doors cannot be reverted.\n";

        return false;
    }
    */
}
