<?php
/**
 * Copyright (c) 2016-present, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the BSD-style license found in the
 * LICENSE file in the root directory of this source tree. An additional grant
 * of patent rights can be found in the PATENTS file in the code directory.
 */

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160801000000 extends AbstractMigration {

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema) {
        // this up() migration is auto-generated, please modify it to your needs
        $this->createFacebookAdsToolbox($schema);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema) {
        // this down() migration is auto-generated, please modify it to your needs
        $schema->dropTable('plg_facebook_ads_toolbox');
    }

    /**
     * create table to store pixel id
     * @param Schema $schema
     */
    protected function createFacebookAdsToolbox(Schema $schema) {
        $table = $schema->createTable("plg_facebook_ads_toolbox");
        $table->addColumn('plg_facebook_ads_toolbox_id', 'integer', array(
            'autoincrement' => true,
            'notnull' => true,
        ));

        $table->addColumn('fb_pixel', 'text', array(
            'notnull' => true,
        ));

        $table->addColumn('merchant_settings', 'text', array(
            'notnull' => true,
        ));

        $table->addColumn('create_date', 'datetime', array(
            'notnull' => true,
            'unsigned' => false,
        ));

        $table->addColumn('update_date', 'datetime', array(
            'notnull' => true,
            'unsigned' => false,
        ));

        $table->setPrimaryKey(array('plg_facebook_ads_toolbox_id'));
    }

}
