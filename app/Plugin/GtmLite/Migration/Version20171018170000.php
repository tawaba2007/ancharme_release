<?php
/*
 * GtmLite: Google Tag Manager コンテナタグ設置プラグイン
 * Copyright (C) 2017 Freischtide Inc. All Rights Reserved.
 * http://freischtide.tumblr.com/
 *
 * License: see LICENSE.txt
 */

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Symfony\Component\Yaml\Yaml;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171018170000 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->createGtmLitePlugin($schema);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $schema->dropTable('plg_gtmlite_plugin');
    }

    /**
     * @param Schema $schema
     */
    public function postUp(Schema $schema)
    {
        $app = new \Eccube\Application();
        $app->boot();
        $config = Yaml::parse(__DIR__ . '/../config.yml');
        $pluginCode = $config['code'];
        $pluginName = $config['name'];
        $datetime = date('Y-m-d H:i:s');
        $insert = "INSERT INTO plg_gtmlite_plugin (plugin_code, plugin_name, create_date, update_date) VALUES ('$pluginCode', '$pluginName', '$datetime', '$datetime');";
        $this->connection->executeUpdate($insert);
    }

    protected function createGtmLitePlugin(Schema $schema)
    {
        $config = Yaml::parse(__DIR__ . '/../config.yml');
        $table = $schema->createTable('plg_gtmlite_plugin');
        $table->addColumn('id',                  'integer',  array('autoincrement' => true));
        $table->addColumn('plugin_code',         'text',     array('notnull' => true));
        $table->addColumn('plugin_name',         'text',     array('notnull' => true));
        $table->addColumn('tid',                 'text',     array('notnull' => false));
        $table->addColumn('tag',                 'smallint', array('notnull' => true, 'unsigned' => false, 'default' => $config['const']['GTMLITE_USE_GTM_TAG']));
        $table->addColumn('optional_events',     'smallint', array('notnull' => true, 'unsigned' => false, 'default' => $config['const']['GTMLITE_OP_OPTIONAL_EVENTS_OFF']));
        $table->addColumn('create_date',         'datetime', array('notnull' => true, 'unsigned' => false));
        $table->addColumn('update_date',         'datetime', array('notnull' => true, 'unsigned' => false));
        $table->setPrimaryKey(array('id'));
    }

    function getGtmLiteCode()
    {
        $config = Yaml::parse(__DIR__ . '/../config.yml');
        return $config['code'];
    }
}
