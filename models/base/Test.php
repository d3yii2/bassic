<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "test".
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $createdate
 * @property string $update_dt
 *
 * @property \app\models\TestContacts[] $testContacts
 * @property string $aliasModel
 */
abstract class Test extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['createdate', 'update_dt'], 'safe'],
            [['name'], 'string', 'max' => 10],
            [['description'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'createdate' => Yii::t('app', 'Createdate'),
            'update_dt' => Yii::t('app', 'Update Dt'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestContacts()
    {
        return $this->hasMany(\app\models\TestContacts::className(), ['test_id' => 'id']);
    }


    
    /**
     * @inheritdoc
     * @return testQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\testQuery(get_called_class());
    }


}