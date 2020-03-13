<?php
    function removeTrailingPadding($path, $files, $language) {

        foreach($files as $file) {
            if ($file !== 'todo' && $file !== 'ru.html') {
                $filename = $path . $file . '/ru.html';
                $content = file_get_contents($filename);

                $patterns = [
                    '/(>)[ \t]+(\r\n)/',
                    '/([a-zA-Zа-яА-Я,;\':{}\.])[ \t]+(\r\n)/u'
                ];

                $replacements = [
                    '$1$2',
                    '$1$2'
                ];

                $content = preg_replace($patterns, $replacements, $content);
                file_put_contents($filename, $content);
            }
        }

    }