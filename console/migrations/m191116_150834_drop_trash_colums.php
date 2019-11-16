<?php

use yii\db\Migration;

/**
 * Class m191116_150834_drop_trash_colums
 */
class m191116_150834_drop_trash_colums extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('Doors','client_id');
        $this->dropColumn('Doors','date_create');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191116_150834_drop_trash_colums cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191116_150834_drop_trash_colums cannot be reverted.\n";

        return false;
    }
    */
}
