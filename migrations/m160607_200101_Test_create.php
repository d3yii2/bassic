<?php

use yii\db\Migration;

class m160607_200101_Test_create extends Migration
{
    
    public function up()
    {
        $sql = "  

CREATE TABLE `test` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(10) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `createdate` date DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `test_contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `test_id` int(10) unsigned NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`),
  CONSTRAINT `test_contacts_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
            
                 ";
        $this->execute($sql);
    }

    public function down() {
        $sql = "  
        DROP TABLE `test_contacts`;
        DROP TABLE `test`;
                 ";
        $this->execute($sql);

    }
}
