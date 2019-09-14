<?php
/**
 * Created by PhpStorm.
 * User: toan
 * Date: 21/03/2019
 * Time: 11:30
 */
namespace Magenest\Movie\Setup;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
class UpgradeSchema implements UpgradeSchemaInterface {
    public function upgrade(SchemaSetupInterface $setup,
                            ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '2.1.0') < 0) {
            $installer = $setup;
            $installer->startSetup();
            $table = $installer->getConnection()->newTable(
                $installer->getTable('magenest_rules')
            )->addColumn(
                'id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                10, [
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true],
                'ID'
            )->addColumn(
                'title',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                50,
                [],
                'Title'
            )->addColumn(
                'status',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                10,
                [],
                'Title'
            )->addColumn(
                'rule_type',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                11, [],
                'Rule Type'
            )->addColumn(
                'condition_serialized',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [],
                'Condition Serialized'
            )->setComment(
                'Custom Table'
            );
            $installer->getConnection()->createTable($table);

            $installer->endSetup();
        }
    }
}
