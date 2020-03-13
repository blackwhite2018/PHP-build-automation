<?php
    function replaceRepeatSpaces($path, $files, $language) {

        foreach($files as $file) {
            if ($file !== 'todo' && $file !== 'ru.html') {
                $filename = $path . $file . '/ru.html';
                $content = file_get_contents($filename);

                $pattern = '/([a-zA-Zа-яА-Я\.,])([ \t]+)/u';
                $replacement = '$1 ';

                $content = preg_replace($pattern, $replacement, $content);
                file_put_contents($filename, $content);
            }
        }

    }