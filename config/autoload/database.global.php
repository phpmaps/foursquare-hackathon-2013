<?php
$dbParams = array(
		'database'  => 'mydabase',
		'username'  => 'user',
		'password'  => 'password',
		'hostname'  => 'localhost',
);

$dsn = sprintf(
		'mysql:dbname=%s;host=%s',
		get_cfg_var('zend_developer_cloud.db.name'),
		get_cfg_var('zend_developer_cloud.db.host')
);

return array(
		'service_manager' => array(
				'factories' => array(
						'Zend\Db\Adapter\Adapter' => function ($sm) use ($dbParams) {
							return new Zend\Db\Adapter\Adapter(array(
									'driver'    => 'pdo',
									'dsn'       => $dsn,
									get_cfg_var('zend_developer_cloud.db.username'),
									get_cfg_var('zend_developer_cloud.db.password')
							));
						},
				),
		),
);