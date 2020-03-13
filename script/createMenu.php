<?php
    function createMenu($path, $files, $language) {
        $block = '';

        foreach($files as $file) {
            if ($file !== 'todo' && $file !== 'ru.html') {
                $content = file_get_contents($path . $file . '/ru.html');

                $pattern = '/{{title: (?P<title>[a-zA-Zа-яА-Я ]+)}}/u';
                preg_match($pattern, $content, $matches);

                $block .= 
"\t\t<a href=\"/ru/$language/faq/$file/\">
\t\t\t$matches[title]
\t\t</a>\n";
            }
        }

        file_put_contents(__DIR__ . '/../menu.html', $block);
    }

