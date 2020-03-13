<?php
    function createMenu($path, $files, $language) {
        $block = '';

        foreach($files as $file) {
            if ($file !== 'todo' && $file !== 'ru.html') {
                $content = file_get_contents($path . $file . '/ru.html');

                $pattern = '/{{title: (?P<title>[a-zA-Zа-яА-Я ]+)}}/u';
                preg_match($pattern, $content, $matches);

                $block .= 
"       <a href=\"/ru/$language/faq/$file/\">
            $matches[title]
        </a>\n";
            }
        }

        file_put_contents(__DIR__ . '/../menu.html', $block);
    }

