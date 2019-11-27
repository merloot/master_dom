<?php

use yii\db\Migration;

/**
 * Class m191127_110821_finished_doors
 */
class m191127_110821_finished_doors extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('FinishedDoors',[
            'id'         => $this->primaryKey(),
            'type_doors' => $this->smallInteger(),
            'name'       => $this->string(),
            'price'      => $this->integer()
        ]);

        $this->createTable('Size',[
            'id'    => $this->primaryKey(),
            'size'  => $this->integer()
        ]);

        $this->createTable('Images',[
            'id'    => $this->primaryKey(),
            'image' => $this->string(),
        ]);

        $this->createTable('ImagesFinishedDoors',[
            'id_finished_doors' => $this->integer(),
            'id_image'          => $this->integer(),
        ]);
        $this->createTable('SizeDoors',[
            'id_finished_doors' => $this->integer(),
            'id_size'           => $this->integer(),
        ]);

        $this->addColumn('Orders','id_finished_doors',$this->integer());

        $this->addPrimaryKey('pk_ImagesFinishedDoors','ImagesFinishedDoors',['id_finished_doors','id_image']);
        $this->addPrimaryKey('pk_SizeDoors','SizeDoors',['id_finished_doors','id_size']);

        $this->addForeignKey('SizeDoorsFinishedDoors','SizeDoors','id_finished_doors','FinishedDoors','id','CASCADE');
        $this->addForeignKey('SizeDoorsSize','SizeDoors','id_size','Size','id','CASCADE');

        $this->addForeignKey('ImagesImagesFinishedDoors','ImagesFinishedDoors','id_image','Images','id','CASCADE');
        $this->addForeignKey('ImagesFinishedDoorsImages','ImagesFinishedDoors','id_finished_doors','FinishedDoors','id','CASCADE');

        $this->addForeignKey('FinishedDoorsOrders','Orders','id_finished_doors','FinishedDoors','id','CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_ImagesFinishedDoors','ImagesFinishedDoors');
        $this->dropPrimaryKey('pk_SizeDoors','SizeDoors');

        $this->dropForeignKey('ImagesImagesFinishedDoors','ImagesFinishedDoors');
        $this->dropForeignKey('ImagesFinishedDoorsImages','ImagesFinishedDoors');

        $this->dropForeignKey('SizeDoorsSize','SizeDoors');
        $this->dropForeignKey('SizeDoorsFinishedDoors','SizeDoors');

        $this->dropForeignKey('FinishedDoorsOrders','FinishedDoors');

        $this->dropTable('FinishedDoors');
        $this->dropTable('Size');
        $this->dropTable('Images');
        $this->dropTable('SizeDoors');
        $this->dropTable('ImagesFinishedDoors');

        $this->dropColumn('Orders','id_finished_doors');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191127_110821_finished_doors cannot be reverted.\n";

        return false;
    }
    */
}
