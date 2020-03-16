<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\SchemaTool;
use Eccube\Application;
use Eccube\Common\Constant;

class Version20180815000000 extends AbstractMigration
{
    protected $entities = array(
        'Plugin\GoqsmilePlugin\Entity\Config'
    );

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs

        if (version_compare(Constant::VERSION, '3.0.9', '>=')) {
            // 3.0.9 以降の場合、dcm.ymlの定義からテーブル生成を行う.
            $app = Application::getInstance();
            $meta = $this->getMetadata($app['orm.em']);
            $tool = new SchemaTool($app['orm.em']);
            $tool->createSchema($meta);
        } else {
            // 3.0.0 - 3.0.8
            $this->createTablePlgGoqsmilePluginConfig($schema);
        }
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

        if (version_compare(Constant::VERSION, '3.0.9', '>=')) {
            // 3.0.9 以降の場合、dcm.ymlの定義からテーブル/シーケンスの削除を行う
            $app = Application::getInstance();
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
        } else {
            // 3.0.0 - 3.0.8
            $schema->dropTable('plg_goqsmile_plugin_config');
        }
    }

    /**
     * @param EntityManager $em
     * @return array
     * @throws \Doctrine\Common\Persistence\Mapping\MappingException
     */
    protected function getMetadata(EntityManager $em)
    {
        $meta = array();
        foreach ($this->entities as $entity) {
            $meta[] = $em->getMetadataFactory()->getMetadataFor($entity);
        }

        return $meta;
    }


    /**
     * @param Schema $schema
     */
    public function createTablePlgGoqsmilePluginConfig(Schema $schema)
    {
        $table = $schema->createTable('plg_goqsmile_plugin_config');
        $table->addColumn('id', 'integer', array(
            'notnull' => false,
        ));
        $table->addColumn('app_id', 'text', array(
            'notnull' => true,
        ));
    }

}
