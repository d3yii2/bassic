<?php

use yii\db\Migration;

class m160608_200101_Test_access extends Migration
{
    /**
     * @var array controller all actions
     */
    public $permisions = [
        "index" => [
            "name" => "app_test_index",
            "description" => "app/test/index"
        ],
        "view" => [
            "name" => "app_test_view",
            "description" => "app/test/view"
        ],
        "create" => [
            "name" => "app_test_create",
            "description" => "app/test/create"
        ],
        "update" => [
            "name" => "app_test_update",
            "description" => "app/test/update"
        ],
        "delete" => [
            "name" => "app_test_delete",
            "description" => "app/test/delete"
        ]
    ];
    
    /**
     * @var array roles and maping to actions/permisions
     */
    public $roles = [
        "AppTestFull" => [
            "index",
            "view",
            "create",
            "update",
            "delete"
        ],
        "AppTestView" => [
            "index",
            "view"
        ],
        "AppTestEdit" => [
            "update",
            "create",
            "delete"
        ]
    ];
    
    public function up()
    {
        
        $permisions = [];
        $auth = \Yii::$app->authManager;

        /**
         * create permisions for each controller action
         */
        foreach ($this->permisions as $action => $permission) {
            $permisions[$action] = $auth->createPermission($permission['name']);
            $permisions[$action]->description = $permission['description'];
            $auth->add($permisions[$action]);
        }

        /**
         *  create roles
         */
        foreach ($this->roles as $roleName => $actions) {
            $role = $auth->createRole($roleName);
            $auth->add($role);

            /**
             *  to role assign permissions
             */
            foreach ($actions as $action) {
                $auth->addChild($role, $permisions[$action]);
            }
        }
    }

    public function down() {
        $auth = Yii::$app->authManager;

        foreach ($this->roles as $roleName => $actions) {
            $role = $auth->createRole($roleName);
            $auth->remove($role);
        }

        foreach ($this->permisions as $permission) {
            $authItem = $auth->createPermission($permission['name']);
            $auth->remove($authItem);
        }
    }
}
