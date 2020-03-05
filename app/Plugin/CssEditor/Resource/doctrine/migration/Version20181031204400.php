<?php
/*
  * This file is part of the CssEditor plugin
  *
  * Copyright (C) >=2017 lecast system.
  * @author Tetsuji Shiro 
  *
  * このプラグインは再販売禁止です。
  */
namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20181031204400 extends AbstractMigration
{

    public function up(Schema $schema)
    {
        $this->createOtherSiteTable($schema);
    }

    public function down(Schema $schema)
    {
        $schema->dropTable('plg_css_history');
    }

    protected function createOtherSiteTable(Schema $schema)
    {
        //value table
        $table = $schema->createTable("plg_css_history");
        $table->addColumn('history_id', 'integer', array(
            'autoincrement' => true,
            'notnull' => true,
        ));
        $table->addColumn('created', 'datetime', array(
            'notnull' => false,
        ));
        $table->addColumn('text', 'text', array(
            'notnull' => false,
        ));
        $table->addColumn('file_name', 'text', array(
            'notnull' => false,
        ));
        $table->setPrimaryKey(array('history_id'));
        
    }
}