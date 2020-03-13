<?php
	define('PATH_SCRIPT',  __DIR__ . '/script/');

	$scripts = scandir(__DIR__ . '/script/');
	$scripts = array_slice($scripts, 2);

	foreach($scripts as $script) {
		require_once PATH_SCRIPT . $script;
	}

	$path = __DIR__ . '/faq/';

	$files = scandir($path);
	$files = array_slice($files, 2);

	replaceOldStandard($path, $files, 'php');
	replaceRepeatSpaces($path, $files, 'php');
	removeTrailingPadding($path, $files, 'php');
	createMenu($path, $files, 'php');

