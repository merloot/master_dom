<?php

use yii\db\Migration;

/**
 * Class m191010_153327_fix_unique
 */
class m191010_153327_fix_unique extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->dropIndex('FIO_Client','Clients');
        $this->dropColumn('Clients','FIO');
        $this->addColumn('Clients','FIO', $this->string());
        $this->createIndex('FIO_Client','Clients','FIO');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191010_153327_fix_unique cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191010_153327_fix_unique cannot be reverted.\n";

        return false;
    }
    */
}
