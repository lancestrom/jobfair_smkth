<?php
defined('BASEPATH') or exit('No direct script access allowed');


$active_group = 'default';
$query_builder = TRUE;

// $db['default'] = array(
// 	'dsn'	=> '',
// 	'hostname' => 'localhost',
// 	'username' => 'root',
// 	'password' => '',
// 	'database' => 'smkth-jobfair',
// 	'dbdriver' => 'mysqli',
// 	'dbprefix' => '',
// 	'pconnect' => FALSE,
// 	'db_debug' => (ENVIRONMENT !== 'production'),
// 	'cache_on' => FALSE,
// 	'cachedir' => '',
// 	'char_set' => 'utf8',
// 	'dbcollat' => 'utf8_general_ci',
// 	'swap_pre' => '',
// 	'encrypt' => FALSE,
// 	'compress' => FALSE,
// 	'stricton' => FALSE,
// 	'failover' => array(),
// 	'save_queries' => TRUE
// );

// Prefer environment variables for credentials to avoid committing secrets.
// Provide safe local defaults for convenience (override with env in production).
$dbHost = getenv('DB_HOST') ?: '103.103.23.240';
$dbUser = getenv('DB_USER') ?: 'cbt';
$dbPass = getenv('DB_PASS') ?: 'smktkjTH46';
$dbName = getenv('DB_NAME') ?: 'jobfair_smkth';
$dbDriver = getenv('DB_DRIVER') ?: 'mysqli';

$db['default'] = array(
	'dsn'    => '',
	'hostname' => $dbHost,
	'username' => $dbUser,
	'password' => $dbPass,
	'database' => $dbName,
	'dbdriver' => $dbDriver,
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
