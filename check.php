<?php

require_once "Phalcon/Db/Adapter/Pdo/Sqlsrv.php";
require_once "Phalcon/Db/Dialect/Sqlsrv.php";
require_once "Phalcon/Db/Result/PdoSqlsrv.php";
use Phalcon\Db\Adapter\Pdo\Sqlsrv as MssqlAdapter;
use Phalcon\Db\Dialect\Sqlsrv as MssqlDialect;

define ("TEST_DB_MSSQL_HOST", '127.0.0.1');
define ("TEST_DB_MSSQL_PORT", 1433);
define ("TEST_DB_MSSQL_USER", 'sa');
define ("TEST_DB_MSSQL_PASSWD", 'Jan0935!');
define ("TEST_DB_MSSQL_NAME", 'phalcon_test');
define ("TEST_DB_MSSQL_SCHEMA", 'dbo');
define ("TEST_DB_MSSQL_CHARSET", 'utf8');

echo "Quick test" . PHP_EOL;
testPhpExtension();
testConnection();
testPdo();
testPhalconMssqlPdo();

	function testPhpExtension(){
		echo "1.Test PHP extension : ";
		echo "" . PHP_EOL;
	}

	function testConnection(){
		echo "2.Test SQL Server: ";
		echo "" . PHP_EOL;
	}

	function testPdo(){
		echo "3.Test PDO: ";
		$pdo = new \Pdo("sqlsrv:Server=localhost;Database=".TEST_DB_MSSQL_NAME,TEST_DB_MSSQL_USER, TEST_DB_MSSQL_PASSWD);

		$tsql= "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_CATALOG='phalcon_test'";
		$result = $pdo->query($tsql);
		foreach ($pdo->query($tsql) as $row) {  
			//	var_dump($row);
		}

		echo "PASS" . PHP_EOL;

	}

	function testPhalconMssqlPdo(){
		echo "4.Test Phalcon PDO: ";

			$phalcon = new MssqlAdapter([
					'host'     => TEST_DB_MSSQL_HOST,
					'username' => TEST_DB_MSSQL_USER,
					'password' => TEST_DB_MSSQL_PASSWD,
					'dbname'   => TEST_DB_MSSQL_NAME,
					//'charset'  => TEST_DB_MSSQL_CHARSET,
					]);
		$result = $phalcon->listTables();
		echo "PASS" . PHP_EOL;
	}
