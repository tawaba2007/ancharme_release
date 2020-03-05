<?php



namespace DoctrineMigrations;


use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\SchemaTool;
use Eccube\Common\Constant;
use Eccube\Application;  //★エンティティマネージャーの取得のために必要です

use Plugin\NEConnect\Entity\NEConnectMailHistory;

class Version20171102123456 extends AbstractMigration
{

    // 対象テーブルののエンティティを指定
    protected $entities = array(
        'Plugin\NEConnect\Entity\NEConnectConfig',
        'Plugin\NEConnect\Entity\NEConnectMailHistory',
    );


    public function up(Schema $schema)
    {
        // plg_ne_connect_config テーブルの作成
        if (!$schema->hasTable('plg_ne_connect_config')) {
            $this->createPlgNeConnectConfig($schema);
        }

        // plg_ne_connect_mail_history テーブルの作成
        if (!$schema->hasTable('plg_ne_connect_mail_history')) {
            $this->createPlgNeConnectMailHistory($schema);
        }
    }

    public function down(Schema $schema)
    {
        $app = Application::getInstance();
        $em = $app['orm.em'];

        $classes = array();
        foreach ($this->entities as $entity) {
            $classes[] = $em->getMetadataFactory()->getMetadataFor($entity);
        }

        $tool = new SchemaTool($em);
        $schemaFromMetadata = $tool->getSchemaFromMetadata($classes);

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


    // plg_ne_connect_config テーブルの作成
    /*
        id:
        id:
            type: integer
            nullable: false
            unsigned: false
            id: true
            column: config_id
            generator:
                strategy: AUTO
    fields:
        email_address:
            type: text
            nullable: true
            length: 65535
        api_key:
            type: text
            nullable: true
            length: 65535
        create_date:
            type: datetime
            nullable: false
        update_date:
            type: datetime
            nullable: false
        creator_id:
            type: integer
            nullable: true
            unsigned: false
        del_flg:
            type: smallint
            nullable: false
            unsigned: false
            options:
                default: '0'
    */
    protected function createPlgNeConnectConfig(Schema $schema)
    {
        $table = $schema->createTable('plg_ne_connect_config');

        $table->addColumn('config_id', 'integer', array(
            'autoincrement' => true,
        ));
        $table->addColumn('email_address', 'text', array(
            'notnull' => false,
        ));
        $table->addColumn('api_key', 'text', array(
            'notnull' => false,
        ));
        $table->addColumn('create_date', 'datetime', array(
            'notnull' => true,
            'unsigned' => false,
        ));
        $table->addColumn('update_date', 'datetime', array(
            'notnull' => true,
            'unsigned' => false,
        ));
        $table->addColumn('creator_id', 'integer', array(
            'notnull' => false,
            'unsigned' => false,
        ));
        $table->addColumn('del_flg', 'smallint', array(
            'notnull' => true,
            'unsigned' => false,
            'default' => 0,
        ));

        $table->setPrimaryKey(array('config_id'));
    }

    // plg_ne_connect_mail_history テーブルの作成
    /*
    id:
        id:
            type: integer
            nullable: false
            unsigned: false
            id: true
            column: send_id
            generator:
                strategy: AUTO
    fields:
        send_date:
            type: datetime
            nullable: true
        send_to:
            type: text
            nullable: true
        subject:
            type: text
            nullable: true
        mail_body:
            type: text
            nullable: true
        order_id:
            type: integer
            nullable: false
            unsigned: false
    */
    protected function createPlgNeConnectMailHistory(Schema $schema)
    {
        $table = $schema->createTable('plg_ne_connect_mail_history');

        $table->addColumn('send_id', 'integer', array(
            'autoincrement' => true,
        ));
        $table->addColumn('send_date', 'datetime', array(
            'notnull' => false,
            'unsigned' => false,
        ));
        $table->addColumn('send_to', 'text', array(
            'notnull' => false,
        ));
        $table->addColumn('subject', 'text', array(
            'notnull' => false,
        ));
        $table->addColumn('mail_body', 'text', array(
            'notnull' => false,
        ));
        $table->addColumn('order_id', 'integer', array(
            'notnull' => false,
        ));

        $table->setPrimaryKey(array('send_id'));
    }
}
