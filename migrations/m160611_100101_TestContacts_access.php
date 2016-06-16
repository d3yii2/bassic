<?php

use yii\db\Migration;

class m160611_100101_TestContacts_access extends Migration
{
    /**
     * @var array controller all actions
     */
    public $permisions = [
        "index" => [
            "name" => "app_test-contacts_index",
            "description" => "app/test-contacts/index"
        ],
        "view" => [
            "name" => "app_test-contacts_view",
            "description" => "app/test-contacts/view"
        ],
        "create" => [
            "name" => "app_test-contacts_create",
            "description" => "app/test-contacts/create"
        ],
        "update" => [
            "name" => "app_test-contacts_update",
            "description" => "app/test-contacts/update"
        ],
        "delete" => [
            "name" => "app_test-contacts_delete",
            "description" => "app/test-contacts/delete"
        ],
        "editable" => [
            "name" => "app_test-contacts_editable",
            "description" => "app/test-contacts/editable"
        ]
    ];
    
    /**
     * @var array roles and maping to actions/permisions
     */
    public $roles = [
        "AppTestContactsFull" => [
            "index",
            "view",
            "create",
            "update",
            "delete",
            "editable"
        ],
        "AppTestContactsView" => [
            "index",
            "view"
        ],
        "AppTestContactsEdit" => [
            "update",
            "create",
            "delete",
            "editable"
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
