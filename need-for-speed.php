<?php
	// Setup
    $iterations = $config['iterations'];
    $dbConfig = $config['database'];
    $namespace = $dbConfig['namespace'];
    $table = $dbConfig['table']
    $record = null;

	$db = new Aerospike($config['aeroSpike']);
    
    // Start
	$before = microtime(true);

	for($i = 0; $i < $iterations; $i++) {
        $keyName = ($i % 2) ? 'test_1' : 'test_2';
		$key = $db->initKey($namespace, $table, $keyName);
		$db->get($key, $record);
		$data = $record['bins'];
	}
    
    // End
	$after = microtime(true);
    
	echo ($after - $before) / $i . ' sec/GET<br>';
?>