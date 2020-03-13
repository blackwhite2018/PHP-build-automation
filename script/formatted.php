<?php
    function formatted($path, $files, $language) {

        foreach($files as $file) {
            if ($file !== 'todo' && $file !== 'ru.html') {
                $filename = $path . $file . '/ru.html';
                $content = file_get_contents($filename);

                $patterns = [
                    '/([a-zA-Zа-яА-Я0-9])\s?([=\+\*\/\-])\s?([a-zA-Zа-яА-Я0-9\[])/u',
                    '/([a-zA-Zа-яА-Я0-9])\s?=>\s?([a-zA-Zа-яА-Я0-9[])/u',
                    '/([a-zA-Zа-яА-Я0-9])\s?([,\.])\s?([a-zA-Zа-яА-Я0-9[])/u'
                ];
                
                $replacements = [
                    '$1 $2 $3',
                    '$1 => $2',
                    '$1$2 $3'
                ];

                $content = preg_replace($patterns, $replacements, $content);
                file_put_contents($filename, $content);
            }
        }

    }