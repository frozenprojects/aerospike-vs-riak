<?php
    // Aerospike
    
	// Load config
	$config = json_decode(file_get_contents('config.json'), true);
	
	// Setup
	$iterations = $config['iterations'];
	$dbConfig = $config['database'];
	$namespace = $dbConfig['namespace'];
	$table = $dbConfig['table'];
	$record = [];

	$db = new Aerospike($config['aerospike']);
	
	// Start
	$before = microtime(true);

	for($i = 0; $i < $iterations; $i++) {
		$keyName = "test_$i";
		$key = $db->initKey($namespace, $table, $keyName);
		$db->get($key, $record);
		$data = $record['bins'];
	}
	
	// End
	$after = microtime(true);
	
	echo 'Aerospike: ' . ($after - $before) / $i . ' sec/GET<br>';
?>

<?php
    // Riak
    
    // TODO
?>