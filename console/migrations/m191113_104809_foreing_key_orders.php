<?php

use yii\db\Migration;

/**
 * Class m191113_104809_foreing_key_orders
 */
class m191113_104809_foreing_key_orders extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('Doors','id_order',$this->integer());
//        $this->addForeignKey('OrdersDoors','Doors','id_order','Orders','id_order','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191113_104809_foreing_key_orders cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191113_104809_foreing_key_orders cannot be reverted.\n";

        return false;
    }
    */
}
