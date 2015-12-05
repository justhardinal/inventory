<?php

use yii\db\Schema;
use yii\db\Migration;

class m151205_034228_create_transactions_details extends Migration
{
    public function up()
    {
        $this->createTable('transaction_details', [
            'id' => Schema::TYPE_PK,
            'trans_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'item_id' => Schema::TYPE_INTEGER,
            'quantity' => Schema::TYPE_DECIMAL . '(15,2) NOT NULL DEFAULT 0',
            'remarks' => Schema::TYPE_STRING,
        ]);
        // foreign keys
        $this->addForeignKey(
            'fk_transaction_details_transactions', 
            'transaction_details', 'trans_id', 
            'transactions', 'id', 
            'restrict', 'cascade');
        $this->addForeignKey(
            'fk_transaction_details_items', 
            'transaction_details', 'item_id', 
            'items', 'id', 
            'restrict', 'cascade');
    }
    public function down()
    {
        $this->dropTable('transaction_details');
    }
}
