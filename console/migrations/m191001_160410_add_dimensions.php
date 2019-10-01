<?php

use yii\db\Migration;

/**
 * Class m191001_160410_add_dimensions
 */
class m191001_160410_add_dimensions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('Doors','height_box',  $this->decimal());
        $this->addColumn('Doors','depth_box',   $this->decimal());
        $this->addColumn('Doors','width_box',   $this->decimal());

        $this->addColumn('Doors','height_aperture',  $this->decimal());
        $this->addColumn('Doors','depth_aperture',   $this->decimal());
        $this->addColumn('Doors','width_aperture',   $this->decimal());

        $this->addColumn('Doors','height_canvas',  $this->decimal());
        $this->addColumn('Doors','depth_canvas',   $this->decimal());
        $this->addColumn('Doors','width_canvas',   $this->decimal());

        }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('Doors','height_box');
        $this->dropColumn('Doors','depth_box');
        $this->dropColumn('Doors','width_box');
        $this->dropColumn('Doors','height_aperture');
        $this->dropColumn('Doors','depth_aperture');
        $this->dropColumn('Doors','width_aperture');
        $this->dropColumn('Doors','height_canvas');
        $this->dropColumn('Doors','depth_canvas');
        $this->dropColumn('Doors','width_canvas');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191001_160410_add_dimensions cannot be reverted.\n";

        return false;
    }
    */
}
