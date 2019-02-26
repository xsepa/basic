<?php

use yii\db\Migration;
use yii\filters\AccessControl;
/**
 * Class m190226_120038_create_rbac_data
 */
class m190226_120038_create_rbac_data extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $auth = Yii::$app->authManager;

        $auth->removeAll();

        $admin = $auth->createRole('admin');
        $user = $auth->createRole('user');

        $auth->add($admin);
        $auth->add($user);

        $viewCartridgeModels = $auth->createPermission('viewCartridgeModels');
        $viewCartridgeModels->description = 'Просмотр моделей карттриджей';

        $updateCartridgeModels = $auth->createPermission('updateCartridgeModels');
        $updateCartridgeModels->description = 'Обновление моделей карттриджей';

        $createCartridgeModels = $auth->createPermission('createCartridgeModels');
        $createCartridgeModels->description = 'Создание моделей карттриджей';

        $deleteCartridgeModels = $auth->createPermission('deleteCartridgeModels');
        $deleteCartridgeModels->description = 'Удаление моделей карттриджей';

        $auth->add($viewCartridgeModels);
        $auth->add($updateCartridgeModels);
        $auth->add($createCartridgeModels);
        $auth->add($deleteCartridgeModels);

        $viewPrinterModels = $auth->createPermission('viewPrinterModels');
        $viewPrinterModels->description = 'Просмотр моделей принтеров';

        $updatePrinterModels = $auth->createPermission('updatePrinterModels');
        $updatePrinterModels->description = 'Обновление моделей принтеров';

        $createPrinterModels = $auth->createPermission('createPrinterModels');
        $createPrinterModels->description = 'Создание моделей принтеров';

        $deletePrinterModels = $auth->createPermission('deletePrinterModels');
        $deletePrinterModels->description = 'Удаление моделей принтеров';

        $auth->add($viewPrinterModels);
        $auth->add($updatePrinterModels);
        $auth->add($createPrinterModels);
        $auth->add($deletePrinterModels);

        $viewPrinterCartridgeCompatiblity = $auth->createPermission('viewPrinterCartridgeCompatiblity');
        $viewPrinterCartridgeCompatiblity->description = 'Просмотр совместимости моделей картриджей и принтеров';

        $updatePrinterCartridgeCompatiblity = $auth->createPermission('updatePrinterCartridgeCompatiblity');
        $updatePrinterCartridgeCompatiblity->description = 'Обновление совместимости моделей картриджей и принтеров';

        $createPrinterCartridgeCompatiblity = $auth->createPermission('createPrinterCartridgeCompatiblity');
        $createPrinterCartridgeCompatiblity->description = 'Создание совместимости моделей картриджей и принтеров';

        $deletePrinterCartridgeCompatiblity = $auth->createPermission('deletePrinterCartridgeCompatiblity');
        $deletePrinterCartridgeCompatiblity->description = 'Удаление совместимости моделей картриджей и принтеров';

        $auth->add($viewPrinterCartridgeCompatiblity);
        $auth->add($updatePrinterCartridgeCompatiblity);
        $auth->add($createPrinterCartridgeCompatiblity);
        $auth->add($deletePrinterCartridgeCompatiblity);

        $viewCartridge = $auth->createPermission('viewCartridge');
        $viewCartridge->description = 'Просмотр картриджей и принтеров';

        $updateCartridge = $auth->createPermission('updateCartridge');
        $updateCartridge->description = 'Обновление картриджей и принтеров';

        $createCartridge = $auth->createPermission('createCartridge');
        $createCartridge->description = 'Создание картриджей и принтеров';

        $deleteCartridge = $auth->createPermission('deleteCartridge');
        $deleteCartridge->description = 'Удаление картриджей и принтеров';

        $auth->add($viewCartridge);
        $auth->add($updateCartridge);
        $auth->add($createCartridge);
        $auth->add($deleteCartridge);

        $viewPrinter = $auth->createPermission('viewPrinter');
        $viewPrinter->description = 'Просмотр картриджей и принтеров';

        $updatePrinter = $auth->createPermission('updatePrinter');
        $updatePrinter->description = 'Обновление картриджей и принтеров';

        $createPrinter = $auth->createPermission('createPrinter');
        $createPrinter->description = 'Создание картриджей и принтеров';

        $deletePrinter = $auth->createPermission('deletePrinter');
        $deletePrinter->description = 'Удаление картриджей и принтеров';

        $auth->add($viewPrinter);
        $auth->add($updatePrinter);
        $auth->add($createPrinter);
        $auth->add($deletePrinter);

        $viewLoading = $auth->createPermission('viewLoading');
        $viewLoading->description = 'Просмотр заправок';

        $updateLoading = $auth->createPermission('updateLoading');
        $updateLoading->description = 'Обновление заправок';

        $createLoading = $auth->createPermission('createLoading');
        $createLoading->description = 'Создание заправок';

        $deleteLoading = $auth->createPermission('deleteLoading');
        $deleteLoading->description = 'Удаление заправок';

        $auth->add($viewLoading);
        $auth->add($updateLoading);
        $auth->add($createLoading);
        $auth->add($deleteLoading);

        $viewLoadingReport = $auth->createPermission('viewLoadingReport');
        $viewLoadingReport->description = 'Просмотр отчетов заправок';

        $updateLoadingReport = $auth->createPermission('updateLoadingReport');
        $updateLoadingReport->description = 'Обновление отчетов заправок';

        $createLoadingReport = $auth->createPermission('createLoadingReport');
        $createLoadingReport->description = 'Создание отчетов заправок';

        $deleteLoadingReport = $auth->createPermission('deleteLoadingReport');
        $deleteLoadingReport->description = 'Удаление отчетов заправок';

        $auth->add($viewLoadingReport);
        $auth->add($updateLoadingReport);
        $auth->add($createLoadingReport);
        $auth->add($deleteLoadingReport);

        $viewCartridgeLoading = $auth->createPermission('viewCartridgeLoading');
        $viewCartridgeLoading->description = 'Просмотр заправок Картриджа';

        $updateCartridgeLoading = $auth->createPermission('updateCartridgeLoading');
        $updateCartridgeLoading->description = 'Обновление заправок Картриджа';

        $createCartridgeLoading = $auth->createPermission('createCartridgeLoading');
        $createCartridgeLoading->description = 'Создание заправок Картриджа';

        $deleteCartridgeLoading = $auth->createPermission('deleteCartridgeLoading');
        $deleteCartridgeLoading->description = 'Удаление заправок Картриджа';

        $auth->add($viewCartridgeLoading);
        $auth->add($updateCartridgeLoading);
        $auth->add($createCartridgeLoading);
        $auth->add($deleteCartridgeLoading);

        $viewOrder = $auth->createPermission('viewOrder');
        $viewOrder->description = 'Просмотр заявок на замену/установку картриджа';

        $updateOrder = $auth->createPermission('updateOrder');
        $updateOrder->description = 'Обновление заявок на замену/установку картриджа';

        $createOrder = $auth->createPermission('createOrder');
        $createOrder->description = 'Создание заявок на замену/установку картриджа';

        $deleteOrder = $auth->createPermission('deleteOrder');
        $deleteOrder->description = 'Удаление заявок на замену/установку картриджа';

        $auth->add($viewOrder);
        $auth->add($updateOrder);
        $auth->add($createOrder);
        $auth->add($deleteOrder);

        $viewUserOrder = $auth->createPermission('viewUserOrder');
        $viewUserOrder->description = 'Просмотр заявок на замену/установку картриджа';

        $updateUserOrder = $auth->createPermission('updateUserOrder');
        $updateUserOrder->description = 'Обновление заявок на замену/установку картриджа';

        $createUserOrder = $auth->createPermission('createUserOrder');
        $createUserOrder->description = 'Создание заявок на замену/установку картриджа';

        $deleteUserOrder = $auth->createPermission('deleteUserOrder');
        $deleteUserOrder->description = 'Удаление заявок на замену/установку картриджа';

        $auth->add($viewUserOrder);
        $auth->add($updateUserOrder);
        $auth->add($createUserOrder);
        $auth->add($deleteUserOrder);

        $viewInventory = $auth->createPermission('viewInventory');
        $viewInventory->description = 'Просмотр Инвентарных номеров';

        $updateInventory = $auth->createPermission('updateInventory');
        $updateInventory->description = 'Обновление Инвентарных номеров';

        $createInventory = $auth->createPermission('createInventory');
        $createInventory->description = 'Создание Инвентарных номеров';

        $deleteInventory = $auth->createPermission('deleteInventory');
        $deleteInventory->description = 'Удаление Инвентарных номеров';

        $auth->add($viewInventory);
        $auth->add($updateInventory);
        $auth->add($createInventory);
        $auth->add($deleteInventory);

        $auth->addChild($admin, $viewLoadingReport);
        $auth->addChild($admin, $updateLoadingReport);
        $auth->addChild($admin, $createLoadingReport);
        $auth->addChild($admin, $deleteLoadingReport);

        $auth->addChild($admin, $viewCartridgeLoading);
        $auth->addChild($admin, $updateCartridgeLoading);
        $auth->addChild($admin, $createCartridgeLoading);
        $auth->addChild($admin, $deleteCartridgeLoading);

        $auth->addChild($admin, $viewOrder);
        $auth->addChild($admin, $updateOrder);
        $auth->addChild($admin, $createOrder);
        $auth->addChild($admin, $deleteOrder);

        $auth->addChild($admin, $viewCartridgeModels);
        $auth->addChild($admin, $updateCartridgeModels);
        $auth->addChild($admin, $createCartridgeModels);
        $auth->addChild($admin, $deleteCartridgeModels);

        $auth->addChild($admin, $viewPrinterModels);
        $auth->addChild($admin, $updatePrinterModels);
        $auth->addChild($admin, $createPrinterModels);
        $auth->addChild($admin, $deletePrinterModels);

        $auth->addChild($admin, $viewPrinterCartridgeCompatiblity);
        $auth->addChild($admin, $updatePrinterCartridgeCompatiblity);
        $auth->addChild($admin, $createPrinterCartridgeCompatiblity);
        $auth->addChild($admin, $deletePrinterCartridgeCompatiblity);

        $auth->addChild($admin, $viewCartridge);
        $auth->addChild($admin, $updateCartridge);
        $auth->addChild($admin, $createCartridge);
        $auth->addChild($admin, $deleteCartridge);

        $auth->addChild($admin, $viewPrinter);
        $auth->addChild($admin, $updatePrinter);
        $auth->addChild($admin, $createPrinter);
        $auth->addChild($admin, $deletePrinter);

        $auth->addChild($admin, $viewLoading);
        $auth->addChild($admin, $updateLoading);
        $auth->addChild($admin, $createLoading);
        $auth->addChild($admin, $deleteLoading);

        $auth->addChild($admin, $viewInventory);
        $auth->addChild($admin, $updateInventory);
        $auth->addChild($admin, $createInventory);
        $auth->addChild($admin, $deleteInventory);

        $auth->addChild($user, $viewUserOrder);
        $auth->addChild($user, $updateUserOrder);
        $auth->addChild($user, $createUserOrder);
        $auth->addChild($user, $deleteUserOrder);

        $auth->addChild($admin, $user);

        // Назначаем роль * пользователю с ID *
        $auth->assign($admin, 2); // :,)
//        $auth->assign($user, 9);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m190226_120038_create_rbac_data cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m190226_120038_create_rbac_data cannot be reverted.\n";

      return false;
      }
     */
}
