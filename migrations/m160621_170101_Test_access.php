<?php

use yii\db\Migration;

class m160621_170101_Test_access extends Migration
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
        "create-rel" => [
            "name" => "app_test_create-rel",
            "description" => "app/test/create-rel"
        ],
        "update" => [
            "name" => "app_test_update",
            "description" => "app/test/update"
        ],
        "delete" => [
            "name" => "app_test_delete",
            "description" => "app/test/delete"
        ],
        "editable" => [
            "name" => "app_test_editable",
            "description" => "app/test/editable"
        ],
        "editable-column-update" => [
            "name" => "app_test_editable-column-update",
            "description" => "app/test/editable-column-update"
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
            "create-rel",
            "update",
            "delete",
            "editable",
            "editable-column-update"
        ],
        "AppTestView" => [
            "index",
            "view"
        ],
        "AppTestEdit" => [
            "update",
            "create",
            "create-rel",
            "delete",
            "editable",
            "editable-column-update"
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
