<?php
namespace Classs\Students\Setup;

use phpseclib\System\SSH\Agent\Identity;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
//        $installer = $setup;
        $setup->startSetup();
        $connect = $setup->getConnection();
        $table = $connect -> newTable("classs")
            ->addColumn(
                "id",
                Table::TYPE_INTEGER,
                null,
                [
                    "primary" => true,
                    "nullable" => false,
                    "identity" => true,
                    'unsigned' => true,
                ]
            )
            ->addColumn(
                "class_name",
                Table::TYPE_TEXT,
                255,
                [
                    "nullable" => false,
                ]
            )
            ->addColumn(
                "number_students",
                Table::TYPE_integer,
                null,
                [
                    "nullable" => false,
                ]
            )->setOption("charset","utf8")
        ;
        $connect->createTable($table);
        $setup->endSetup();

//        $installer->startSetup();
//        if (!$installer->tableExists('students')) {
//            $table = $installer->getConnection()->newTable(
//                $installer->getTable('students')
//            )
//                ->addColumn(
//                    'id',
//                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
//                    null,
//                    [
//                        'identity' => true,
//                        'nullable' => false,
//                        'primary'  => true,
//                        'unsigned' => true,
//                    ],
//                    'ID'
//                )
//                ->addColumn(
//                    'name',
//                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//                    255,
//                    ['nullable => false']
//
//                )
//
//
//                ->addColumn(
//                    'class',
//                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//                    255,
//                    [],
//                    'Post Class'
//                )
//                ->addColumn(
//                    'address',
//                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//                    255,
//                    [],
//                    'Post Address'
//                )->setOption("charset", "utf8");
//
//            $installer->getConnection()->createTable($table);

//			$installer->getConnection()->addIndex(
//				$installer->getTable('students'),
//				$setup->getIdxName(
//					$installer->getTable('students'),
//					['name','class','address'],
//					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
//				),
//				['name','class','address'],
//				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
//			);
//        }

    }
}
