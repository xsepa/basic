<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_142338_auth_item_childDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%auth_item_child}}',
                           ["parent", "child"],
                            [
    [
        'parent' => 'admin',
        'child' => 'createCartridge',
    ],
    [
        'parent' => 'admin',
        'child' => 'createCartridgeLoading',
    ],
    [
        'parent' => 'admin',
        'child' => 'createCartridgeModels',
    ],
    [
        'parent' => 'admin',
        'child' => 'createInventory',
    ],
    [
        'parent' => 'admin',
        'child' => 'createLoading',
    ],
    [
        'parent' => 'admin',
        'child' => 'createLoadingReport',
    ],
    [
        'parent' => 'admin',
        'child' => 'createOrder',
    ],
    [
        'parent' => 'admin',
        'child' => 'createPrinter',
    ],
    [
        'parent' => 'admin',
        'child' => 'createPrinterCartridgeCompatiblity',
    ],
    [
        'parent' => 'admin',
        'child' => 'createPrinterModels',
    ],
    [
        'parent' => 'user',
        'child' => 'createUserOrder',
    ],
    [
        'parent' => 'admin',
        'child' => 'deleteCartridge',
    ],
    [
        'parent' => 'admin',
        'child' => 'deleteCartridgeLoading',
    ],
    [
        'parent' => 'admin',
        'child' => 'deleteCartridgeModels',
    ],
    [
        'parent' => 'admin',
        'child' => 'deleteInventory',
    ],
    [
        'parent' => 'admin',
        'child' => 'deleteLoading',
    ],
    [
        'parent' => 'admin',
        'child' => 'deleteLoadingReport',
    ],
    [
        'parent' => 'admin',
        'child' => 'deleteOrder',
    ],
    [
        'parent' => 'admin',
        'child' => 'deletePrinter',
    ],
    [
        'parent' => 'admin',
        'child' => 'deletePrinterCartridgeCompatiblity',
    ],
    [
        'parent' => 'admin',
        'child' => 'deletePrinterModels',
    ],
    [
        'parent' => 'user',
        'child' => 'deleteUserOrder',
    ],
    [
        'parent' => 'admin',
        'child' => 'updateCartridge',
    ],
    [
        'parent' => 'admin',
        'child' => 'updateCartridgeLoading',
    ],
    [
        'parent' => 'admin',
        'child' => 'updateCartridgeModels',
    ],
    [
        'parent' => 'admin',
        'child' => 'updateInventory',
    ],
    [
        'parent' => 'admin',
        'child' => 'updateLoading',
    ],
    [
        'parent' => 'admin',
        'child' => 'updateLoadingReport',
    ],
    [
        'parent' => 'admin',
        'child' => 'updateOrder',
    ],
    [
        'parent' => 'admin',
        'child' => 'updatePrinter',
    ],
    [
        'parent' => 'admin',
        'child' => 'updatePrinterCartridgeCompatiblity',
    ],
    [
        'parent' => 'admin',
        'child' => 'updatePrinterModels',
    ],
    [
        'parent' => 'user',
        'child' => 'updateUserOrder',
    ],
    [
        'parent' => 'admin',
        'child' => 'user',
    ],
    [
        'parent' => 'admin',
        'child' => 'viewCartridge',
    ],
    [
        'parent' => 'admin',
        'child' => 'viewCartridgeLoading',
    ],
    [
        'parent' => 'admin',
        'child' => 'viewCartridgeModels',
    ],
    [
        'parent' => 'admin',
        'child' => 'viewInventory',
    ],
    [
        'parent' => 'admin',
        'child' => 'viewLoading',
    ],
    [
        'parent' => 'admin',
        'child' => 'viewLoadingReport',
    ],
    [
        'parent' => 'admin',
        'child' => 'viewOrder',
    ],
    [
        'parent' => 'admin',
        'child' => 'viewPrinter',
    ],
    [
        'parent' => 'admin',
        'child' => 'viewPrinterCartridgeCompatiblity',
    ],
    [
        'parent' => 'admin',
        'child' => 'viewPrinterModels',
    ],
    [
        'parent' => 'user',
        'child' => 'viewUserOrder',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%auth_item_child}} CASCADE');
    }
}
