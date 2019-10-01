<?php

use yii\db\Migration;

/**
 * Class m191001_103550_fix_clients
 */
class m191001_103550_fix_clients extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {


        $this->dropColumn('Clients','street');
        $this->dropColumn('Clients','house');
        $this->dropColumn('Clients','porch');
        $this->dropColumn('Clients','apartment');
        $this->addColumn('Clients','address', $this->string()->comment('Адресс'));
        $this->addColumn('Clients','type_elevator',$this->integer()->comment('Тип лифта'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191001_103550_fix_clients cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191001_103550_fix_clients cannot be reverted.\n";

        return false;
    }
    */
}
