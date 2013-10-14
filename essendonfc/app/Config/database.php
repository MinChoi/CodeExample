<?php
/* SVN FILE: $Id$ */
/**
 * In this file you set up your database connection details.
 *
 * @package       cake
 * @subpackage    cake.config
 */
/**
 * Database configuration class.
 * You can specify multiple configurations for production, development and testing.
 *
 * driver => The name of a supported driver; valid options are as follows:
 *		mysql 		- MySQL 4 & 5,
 *		mysqli 		- MySQL 4 & 5 Improved Interface (PHP5 only),
 *		sqlite		- SQLite (PHP5 only),
 *		postgres	- PostgreSQL 7 and higher,
 *		mssql		- Microsoft SQL Server 2000 and higher,
 *		db2			- IBM DB2, Cloudscape, and Apache Derby (http://php.net/ibm-db2)
 *		oracle		- Oracle 8 and higher
 *		firebird	- Firebird/Interbase
 *		sybase		- Sybase ASE
 *		adodb-[drivername]	- ADOdb interface wrapper (see below),
 *		odbc		- ODBC DBO driver
 *
 * You can add custom database drivers (or override existing drivers) by adding the
 * appropriate file to app/models/datasources/dbo.  Drivers should be named 'dbo_x.php',
 * where 'x' is the name of the database.
 *
 * persistent => true / false
 * Determines whether or not the database should use a persistent connection
 *
 * connect =>
 * ADOdb set the connect to one of these
 *	(http://phplens.com/adodb/supported.databases.html) and
 *	append it '|p' for persistent connection. (mssql|p for example, or just mssql for not persistent)
 * For all other databases, this setting is deprecated.
 *
 * host =>
 * the host you connect to the database.  To add a socket or port number, use 'port' => #
 *
 * prefix =>
 * Uses the given prefix for all the tables in this database.  This setting can be overridden
 * on a per-table basis with the Model::$tablePrefix property.
 *
 * schema =>
 * For Postgres and DB2, specifies which schema you would like to use the tables in. Postgres defaults to
 * 'public', DB2 defaults to empty.
 *
 * encoding =>
 * For MySQL, MySQLi, Postgres and DB2, specifies the character encoding to use when connecting to the
 * database.  Uses database default.
 *
 */
class DATABASE_CONFIG {

	// PRODUCTION DATABASE
	public $default = array(
		'datasource' => 'Database/Mysql',
		'driver' => 'mysqli',
		'persistent' => false,
		'host' => 'm4-mysql1-1.ilisys.com.au',
		'login' => 'membewi',		// still to be setup
		'password' => '6pEcQz92',
		'database' => 'membewi_db',
		'prefix' => 'essendon_',
		'encoding' => 'UTF8',
		'port' => 3306,
	);
	
	// STAGING DATABASE
	public $staging = array(
		'host' => 'n3-mysql5-3.ilisys.com.au',
		'login' => 'surfcpp',
		'password' => '5YFJBdI8',
		'database' => 'surfcpp1_db',
		'prefix' => 'essendon_',
	);
	
	// DEV DATABASE
	public $surfaceDev = array(
		'host' => '10.1.1.121',
		'login' => 'root',
		'password' => 'surface',
		'database' => 'afl_essendonfc',
		'prefix' => ''
	);
	
	public function __construct() {
		if (isLocalDev()) {
			$this->default = $this->surfaceDev + $this->default;
		
		} elseif (isStaging()) {
			$this->default = $this->staging + $this->default;
			$this->test = $this->stagingTest + $this->test;
		
		} else { // Production
			$this->test = $this->stagingTest + $this->test;
		}
	}
	
	// DATABASE FOR RUNNING UNIT TESTS
	public $test = array(
		'datasource' => 'Database/Mysql',
		'driver' => 'mysqli',
		'persistent' => false,
		'host' => '10.1.1.121',
		'login' => 'root',
		'password' => 'surface',
		'database' => 'CmsCoreTest',
		'prefix' => '',
		'encoding' => 'UTF8',
		'port' => 3306,
	);
	
	public $stagingTest = array(
		'host' => 'm4-mysql1-1.ilisys.com.au',
		'login' => 'cloudcu',
		'password' => 'Xk6Y83i9',
		'database' => 'cloudcu_db',
	);
}
