<?php

$configuration = array();

$configuration['pathApplication'] = dirname(__FILE__) . '/';

$configuration['baseUrl'] = '/askme/';

$configuration['includeDirectories'] = array(
	$configuration['pathApplication'],
	$configuration['pathApplication'] . '../nacho/'
);

$configuration['Database'] = array(
	'type' => 'MySql',
	'host' => 'localhost',
	'name' => 'askme',
	'user' => 'root',
	'password' => ''
);

$configuration['Request'] = array(
	'defaultQuery' => 'AskMe/index',
	'aliasQueries' => array()
);

$configuration['debugMode'] = FALSE;