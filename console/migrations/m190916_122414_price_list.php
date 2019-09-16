<?php

use yii\db\Migration;

/**
 * Class m190916_122414_price_list
 */
class m190916_122414_price_list extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('ServicePrice',[
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique()->comment('Название Услуги'),
            'type_service' => $this->integer()->comment(''),
            'price' => $this->decimal(65,2)->comment('Цена услуги'),
            'percent_accruals' => $this->integer()->comment('Процент начисления зп сотрудникам'),
            'unit' =>$this->smallInteger()->comment('Тип единицы измерения'),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('ServicePrice');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190916_122414_price_list cannot be reverted.\n";

        return false;
    }
    */
}
