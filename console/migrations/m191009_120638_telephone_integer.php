<?php

use yii\db\Migration;

/**
 * Class m191009_120638_telephone_integer
 */
class m191009_120638_telephone_integer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->dropColumn('Clients','telephone');
        $this->addColumn('Clients','telephone',$this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191009_120638_telephone_integer cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191009_120638_telephone_integer cannot be reverted.\n";

        return false;
    }
    */
}
