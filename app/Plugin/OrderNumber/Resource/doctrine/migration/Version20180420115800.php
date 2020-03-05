<?php
namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Class Version20180420115800.
 */
class Version20180420115800 extends AbstractMigration
{
    /**
     * @var string table name
     */
    const NAME = 'plg_order_number';
    const NAME_FORMAT = 'plg_order_number_format';

    protected $entities = array(
        'Plugin\OrderNumber\Entity\OrderNumber',
        'Plugin\OrderNumber\Entity\OrderNumberFormat',
    );

    /**
     * Setup data.
     *
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->createOrderNumber($schema);
        $this->createOrderNumberFormat($schema);
    }

    /**
     * Remove data.
     *
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $schema->dropTable(self::NAME);
        $schema->dropTable(self::NAME_FORMAT);
    }

    /**
     * Create recommend table.
     *
     * @param Schema $schema
     *
     * @return bool
     */
    protected function createOrderNumber(Schema $schema)
    {
        // plg_order_numberを作成
        $table = $schema->createTable("plg_order_number");
        $table->addColumn('order_number_id', 'smallint', array('unsigned' => false, 'notnull' => true, 'autoincrement' => true));
        $table->addColumn('order_id', 'integer', array('notnull' => true));
        $table->addColumn('order_number', 'text', array('notnull' => true));
        $table->setPrimaryKey(array('order_number_id'));
    }

    protected function createOrderNumberFormat(Schema $schema)
    {
        // plg_order_number_formatを作成
        $table = $schema->createTable("plg_order_number_format");
        $table->addColumn('order_number_format_id', 'smallint', array('unsigned' => false, 'notnull' => true));
        $table->addColumn('front_format_type', 'integer', array('notnull' => false));
        $table->addColumn('rear_format_type', 'integer', array('notnull' => false));
        $table->addColumn('digit', 'integer', array('notnull' => false));
        $table->setPrimaryKey(array('order_number_format_id'));
    }

}
