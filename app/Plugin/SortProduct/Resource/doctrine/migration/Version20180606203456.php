<?php



namespace DoctrineMigrations;


use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\SchemaTool;
use Eccube\Common\Constant;
use Eccube\Application;  //★エンティティマネージャーの取得のために必要です
use Eccube\Entity\PageLayout;

use Plugin\SortProduct\Entity\SortProduct;
use Plugin\SortProduct\Entity\SortProductCategory;
use Eccube\Entity\Master\ProductListOrderBy;

class Version20180606203456 extends AbstractMigration
{

    // 対象のエンティティを指定
    protected $entities = array(
        'Plugin\SortProduct\Entity\SortProductConfig',
    );


    public function up(Schema $schema)
    {
        // テーブルの生成
        $app = Application::getInstance();  // $app取得
        $em = $app['orm.em'];

        // [plg_sort_product_category]テーブル作成
        if (!$schema->hasTable('plg_sort_product_config')) {
            $meta = $this->getMetadata($em);
            $tool = new SchemaTool($em);
            $tool->createSchema($meta);
        }
    }


    public function down(Schema $schema)
    {
        $app = Application::getInstance();
        $em = $app['orm.em'];

        $meta = $this->getMetadata($em);

        $tool = new SchemaTool($em);
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


    protected function getMetadata(EntityManager $em)
    {
        $meta = array();
        foreach ($this->entities as $entity) {
            $meta[] = $em->getMetadataFactory()->getMetadataFor($entity);
        }

        return $meta;
    }

}
