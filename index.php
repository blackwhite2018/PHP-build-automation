<?php
	define('PATH_SCRIPT',  __DIR__ . '/script/');

	$scripts = scandir(__DIR__ . '/script/');
	$scripts = array_slice($scripts, 2);

	$path = __DIR__ . '/faq/';

	$files = scandir($path);
	$files = array_slice($files, 2);

	foreach($scripts as $script) {
		$script = substr($script, 0, -4);
		require_once PATH_SCRIPT . $script . '.php';

		$script($path, $files, 'php');
	}

