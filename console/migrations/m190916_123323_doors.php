<?php

use yii\db\Migration;

/**
 * Class m190916_123323_doors
 */
class m190916_123323_doors extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('Doors',[
           'id' =>$this->primaryKey(),
           'type_doors' =>$this->integer()->comment(''),
           'comment' => $this->text()->comment(''),
           'wall_material'  =>$this->string()->comment(''),
           'adherence' => $this->boolean(),
           'type_opening' => $this->integer(),
           'sum'=>$this->decimal(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('Doors');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190916_123323_doors cannot be reverted.\n";

        return false;
    }
    */
}
