<?php 


namespace Ws\Sales\Setup;

use \Magento\Framework\Setup\UpgradeSchemaInterface;
use \Magento\Framework\Setup\SchemaSetupInterface;
use \Magento\Framework\Setup\ModuleContextInterface;
use \Magento\Framework\DB\Ddl\Table;
 
class UpgradeSchema implements UpgradeSchemaInterface{
	
	public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
	{
		$setup->startSetup();
		
		$setup->getConnection()->addColumn(
				$setup->getTable('sales_order_grid'),
				'warehouse',
				[
						'type' => Table::TYPE_TEXT,
                        'length' => 255,
                        'nullable' => true,
                        'default' => '',
						'comment' => 'Warehouse'
				]
		);
		
		$setup->endSetup();
	}
	
}