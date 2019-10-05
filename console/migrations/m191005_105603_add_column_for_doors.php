<?php

use yii\db\Migration;

/**
 * Class m191005_105603_add_column_for_doors
 */
class m191005_105603_add_column_for_doors extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('Doors','date_create',$this->timestamp());
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
        echo "m191005_105603_add_column_for_doors cannot be reverted.\n";

        return false;
    }
    */
}
