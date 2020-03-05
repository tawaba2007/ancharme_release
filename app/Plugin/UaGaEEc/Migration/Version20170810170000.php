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
class Version20170810170000 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $config = Yaml::parse(__DIR__ . '/../config.yml');
        $table = $schema->getTable('plg_uagaeec_plugin');
        if(!$table->hasColumn('imp_track')){
            $table->addColumn('imp_track', 'smallint', array('notnull' => true, 'unsigned' => false, 'default' => $config['const']['UAGAEEC_OP_WITH_IMP_TRACK']));
        }
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $table = $schema->getTable('plg_uagaeec_plugin');
        $table->dropColumn('imp_track');
    }

    function getUaGaEEcCode()
    {
        $config = Yaml::parse(__DIR__ . '/../config.yml');
        return $config['code'];
    }
}
