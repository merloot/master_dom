<?php

use yii\db\Migration;

/**
 * Class m191001_144528_fix_doors_table
 */
class m191001_144528_fix_doors_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->dropColumn('Doors','adherence');
        $this->addColumn('Doors','adherence',$this->integer()->comment('Сторонность'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191001_144528_fix_doors_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191001_144528_fix_doors_table cannot be reverted.\n";

        return false;
    }
    */
}
