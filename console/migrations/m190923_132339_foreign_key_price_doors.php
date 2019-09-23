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
        $this->addForeignKey('ServiceDoors','ServiceDoors','id_service','ServicePrice','id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('ServiceDoors','ServiceDoors');
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
