<?php

use yii\db\Migration;

/**
 * Class m190916_123845_clients
 */
class m190916_123845_clients extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('Clients',[
            'id' => $this->primaryKey(),
            'FIO' => $this->string()->comment('Фамилия Имя Отчество'),
            'street' => $this->string()->comment('Улица'),
            'house' => $this->string()->comment('Дом'),
            'porch' => $this->string()->comment('Подъезд'),
            'apartment' => $this->string()->comment('Квартира'),
            'telephone' => $this->integer()->comment('Номер телефона'),
            'comment'   => $this->text()->comment('Комментарий к заказу')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('Clients');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190916_123845_clients cannot be reverted.\n";

        return false;
    }
    */
}
