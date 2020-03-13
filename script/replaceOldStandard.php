<?php
    function replaceOldStandard($path, $files, $language) {

        foreach($files as $file) {
            if ($file !== 'todo' && $file !== 'ru.html') {
                $filename = $path . $file . '/ru.html';
                $content = file_get_contents($filename);

                $patterns = [
                    '/<show>?/',
                    '/<\/show>?/'
                ];

                $replacements = [
                    '<~show~>',
                    '<-show->'
                ];

                $content = preg_replace($patterns, $replacements, $content);
                file_put_contents($filename, $content);
            }
        }

    }