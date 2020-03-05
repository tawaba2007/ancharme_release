<?php

/*
 * This file is part of the ApgProductClassImage
 *
 * Copyright (C) 2018 ARCHIPELAGO Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DoctrineMigrations;


use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\SchemaTool;

/**
 * Class Version20180606141600
 * @package DoctrineMigrations
 *
 * 商品規格画像テーブル作成
 */
class Version20180606141600 extends AbstractMigration
{

    // 対象のエンティティを指定
    protected $entities = array(
        'Plugin\ApgProductClassImage\Entity\ProductClassImage',
    );

    /**
     * @param Schema $schema
     * @throws \Doctrine\ORM\Tools\ToolsException
     */
    public function up(Schema $schema)
    {
        // テーブルの生成
        $app = \Eccube\Application::getInstance();
        $meta = $this->getMetadata($app['orm.em']);
        $tool = new SchemaTool($app['orm.em']);
        $tool->createSchema($meta);
    }

    /**
     * @param Schema $schema
     * @throws \Doctrine\ORM\ORMException
     */
    public function down(Schema $schema)
    {
        $app = \Eccube\Application::getInstance();
        $meta = $this->getMetadata($app['orm.em']);

        $tool = new SchemaTool($app['orm.em']);
        $schemaFromMetadata = $tool->getSchemaFromMetadata($meta);

        // テーブル削除
        foreach ($schemaFromMetadata->getTables() as $table) {
            if ($schema->hasTable($table->getName())) {
                $schema->dropTable($table->getName());
            }
        }

        // シーケンス削除
        foreach ($schemaFromMetadata->getSequences() as $sequence) {
            if ($schema->hasSequence($sequence->getName())) {
                $schema->dropSequence($sequence->getName());
            }
        }
    }

    /**
     * @param EntityManager $em
     * @return array
     * @throws \Doctrine\Common\Persistence\Mapping\MappingException
     * @throws \ReflectionException
     */
    protected function getMetadata(EntityManager $em)
    {
        $meta = array();
        foreach ($this->entities as $entity) {
            $meta[] = $em->getMetadataFactory()->getMetadataFor($entity);
        }

        return $meta;
    }
}