<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/9/15
 * Time: 4:58 PM
 */
/**
 * @package     Semite DOO magento.com
 * @version     install-1.0.0.php 9/9/15 Ahmet GOUDENOGLU
 * @copyright   Copyright (c) 2015 Semite DOO .
 * @license     http://www.semitedoo.com/license/
 */
/**
 * Description of install-1.0.0.php
 *
 * @author Ahmet GOUDENOGLU
 */

/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();

$logTable = $installer->getConnection()->newTable($installer->getTable('cpdevelopment_adminmonitoring/history'))
	->addColumn(
		'history_id',
		Varien_Db_Ddl_Table::TYPE_INTEGER,
		null,
		array(
			'identity' => true,
			'unsigned' => true,
			'nullable' => false,
			'primary'  => true,
		),
		'Primary key of the log entry'
	)
	->addColumn(
		'data',
		Varien_Db_Ddl_Table::TYPE_TEXT,
		null,
		array(),
		'data of the changed entity'
	)
	->addColumn(
		'user_id',
		Varien_Db_Ddl_Table::TYPE_INTEGER,
		1,
		array(
			'unsigned' => true,
			'nullable' => true,
			'default'  => null,
		),
		'user_id of the admin user'
	)
	->addColumn(
		'user_name',
		Varien_Db_Ddl_Table::TYPE_TEXT,
		null,
		array(),
		'username of the admin user - to know which user it was after deletion'
	)
	->addColumn(
		'ip',
		Varien_Db_Ddl_Table::TYPE_TEXT,
		null,
		array(),
		'ip of the admin user'
	)
	->addColumn(
		'created_at',
		Varien_Db_Ddl_Table::TYPE_DATETIME,
		null,
		array(),
		'created at'
	)
	->addColumn(
		'user_agent',
		Varien_Db_Ddl_Table::TYPE_TEXT,
		null,
		array(),
		'user agent used by user'
	)
	->addColumn(
		'action',
		Varien_Db_Ddl_Table::TYPE_INTEGER,
		1,
		array(
			'unsigned' => true,
			'nullable' => false,
		),
		'action which is performed on the object'
	)
	->addColumn(
		'object_type',
		Varien_Db_Ddl_Table::TYPE_TEXT,
		255,
		array(),
		'class name of the changed type'
	)
	->addColumn(
		'object_id',
		Varien_Db_Ddl_Table::TYPE_INTEGER,
		null,
		array(
			'unsigned' => true,
			'nullable' => false,
		),
		'id of the changed type'
	)
;

$installer->getConnection()->createTable($logTable);

$installer->endSetup();


// End of install-1.0.0.php 