<?php
	declare(strict_types = 1);

	$path = __DIR__ . '/faq_готово/';

	$files = scandir($path);
	$files = array_slice($files, 2);

	$block = '';


	foreach($files as $file) {
		$content = file_get_contents($path . $file . '/ru.html');

		$pattern = '/{{title: (?P<title>[a-zA-Zа-яА-Я ]+)}}/u';
		preg_match($pattern, $content, $matches);

		$block .= 
"		<a href=\"/ru/javascript/faq/$file/\">
			$matches[title]
		</a>\n";
	}

	file_put_contents(__DIR__ . '/result.html', $block);

