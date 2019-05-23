<?php

use yii\db\Migration;

/**
 * Class m190523_143531_add_data_to_users_wallets_table
 */
class m190523_143531_add_data_to_users_wallets_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        Yii::$app->db->createCommand()->batchInsert('users_wallets', ['name', 'users_id', 'currency_id', 'amount' ], [
            ['My first wallet  in USD', '5', '0', 1000],
            ['My first wallet  in USD', '4', '0', 1000],
            ['My first wallet  in USD', '3', '0', 1000],
        ])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // echo "m190523_143531_add_data_to_users_wallets_table cannot be reverted.\n";

        // return false;

        Yii::$app->db->createCommand()->delete('users_wallets', ['name', 'users_id', 'currency_id', 'amount' ], [
            ['My first wallet  in USD', '5', '0', 1000],
            ['My first wallet  in USD', '4', '0', 1000],
            ['My first wallet  in USD', '3', '0', 1000],
        ])->execute();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190523_143531_add_data_to_users_wallets_table cannot be reverted.\n";

        return false;
    }
    */
}
