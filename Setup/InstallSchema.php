<?php
namespace Vaimo\TestModule\Setup;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface{
    public function install(SchemaSetupInterface $setup,ModuleContextInterface $context){
        $setup->startSetup();
        $conn = $setup->getConnection();
        $tableName = $setup->getTable('account_manager');
        if($conn->isTableExists($tableName) != true){
            $table = $conn->newTable($tableName)
                ->addColumn(
                    'id',
                    Table::TYPE_INTEGER,
                    null,
                    ['identity'=>true,'unsigned'=>true,'nullable'=>false,'primary'=>true]
                )
                ->addColumn(
                    'postal_section',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable'=>false,'default'=>'']
                )
                ->addColumn(
                    'account_manager',
                    Table::TYPE_TEXT,
                    255,
                    ['nullbale'=>false,'default'=>'']
                )
                ->setOption('charset','utf8');
            $conn->createTable($table);
        }
        if ($conn->tableColumnExists('sales_order_grid', 'account_manager') === false) {
            $conn
                ->addColumn(
                    $setup->getTable('sales_order_grid'),
                    'account_manager',
                    [
                        'type' => Table::TYPE_TEXT,
                        'length' => 255,
                        'comment' => 'Account Manager Column'
                    ]
                );
        }
        $setup->endSetup();
    }
}
?>