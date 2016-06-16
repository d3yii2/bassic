<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TestContacts]].
 *
 * @see TestContacts
 */
class testContactsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return TestContacts[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TestContacts|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
