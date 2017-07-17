# Phalcon - MS SQL Server (PDO) Adapter
- Phalcon 3.2.0 support
```php
$di->set('db', function() use ($config) {
	return new \Phalcon\Db\Adapter\Pdo\Sqlsrv(array(
		"host"         => $config->database->host,
		"username"     => $config->database->username,
		"password"     => $config->database->password,
		"dbname"       => $config->database->name
	));
});

```

- Issue

It will crash if you use shared lock. See more look at nolock branch.

