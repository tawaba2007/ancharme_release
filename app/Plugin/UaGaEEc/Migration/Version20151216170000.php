<?php
/*
 * UaGaEEc: Google Analytics eコマース/拡張eコマース対応プラグイン
 * Copyright (C) 2016-2017 Freischtide Inc. All Rights Reserved.
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
class Version20151216170000 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->createUaGaEEcPlugin($schema);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $schema->dropTable('plg_uagaeec_plugin');
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
        $insert = "INSERT INTO plg_uagaeec_plugin (plugin_code, plugin_name, create_date, update_date) VALUES ('$pluginCode', '$pluginName', '$datetime', '$datetime');";
        $this->connection->executeUpdate($insert);
    }

    protected function createUaGaEEcPlugin(Schema $schema)
    {
        $config = Yaml::parse(__DIR__ . '/../config.yml');
        $table = $schema->createTable('plg_uagaeec_plugin');
        $table->addColumn('id',                  'integer',  array('autoincrement' => true));
        $table->addColumn('plugin_code',         'text',     array('notnull' => true));
        $table->addColumn('plugin_name',         'text',     array('notnull' => true));
        $table->addColumn('tid',                 'text',     array('notnull' => false));
        $table->addColumn('eec',                 'smallint', array('notnull' => true, 'unsigned' => false, 'default' => $config['const']['UAGAEEC_USE_EEC']));
        $table->addColumn('category',            'smallint', array('notnull' => true, 'unsigned' => false, 'default' => $config['const']['UAGAEEC_OP_CATEGORY_ON']));
        $table->addColumn('include_variant',     'smallint', array('notnull' => true, 'unsigned' => false, 'default' => $config['const']['UAGAEEC_OP_WITHOUT_VARIANT']));
        $table->addColumn('track_user_id',       'smallint', array('notnull' => true, 'unsigned' => false, 'default' => $config['const']['UAGAEEC_OP_NOT_INCLUDE_USER_ID']));
        $table->addColumn('display_features',    'smallint', array('notnull' => true, 'unsigned' => false, 'default' => $config['const']['UAGAEEC_OP_WITHOUT_DISPLAY_FEATURES']));
        $table->addColumn('user_timings',        'smallint', array('notnull' => true, 'unsigned' => false, 'default' => $config['const']['UAGAEEC_OP_WITHOUT_USER_TIMINGS']));
        $table->addColumn('crossdomain_linker',  'text',     array('notnull' => false));
        $table->addColumn('use_custom_referrer', 'smallint', array('notnull' => true, 'unsigned' => false, 'default' => $config['const']['UAGAEEC_OP_NOT_USE_CUSTOM_REFERRER']));
        $table->addColumn('custom_referrers',    'text',     array('notnull' => false));
        $table->addColumn('create_date',         'datetime', array('notnull' => true, 'unsigned' => false));
        $table->addColumn('update_date',         'datetime', array('notnull' => true, 'unsigned' => false));
        $table->setPrimaryKey(array('id'));
    }

    function getUaGaEEcCode()
    {
        $config = Yaml::parse(__DIR__ . '/../config.yml');
        return $config['code'];
    }
}
