<?php

use yii\db\Migration;

/**
 * Class m190929_084249_createUserAdmin
 */
class m190929_084249_createUserAdmin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user = new \common\models\User();
        $user->username = 'admin';
        $user->setPassword('admin');
        $user->status = \common\models\User::STATUS_ADMIN;
        $user->generateAuthKey();
        return $user->save();

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190929_084249_createUserAdmin cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190929_084249_createUserAdmin cannot be reverted.\n";

        return false;
    }
    */
}
