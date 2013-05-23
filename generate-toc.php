<?php
    function generateTOC($filenamePrefix)
    {
        // This array will be filled with the items of the table of contents.  The key will be the filename to link to and
        // the value will be the title to display.
        $pages = array();

        // Scan through the directory looking for files whose names start with $filenamePrefix
        if ($dirhandle = opendir('.')) {
            while (($file = readdir($dirhandle)) !== false) {
                $pattern = '/^' . $filenamePrefix . '/i';
                if (preg_match($pattern, $file)) {

                    // Scan through the file one line at a time.
                    $filehandle = @fopen($file, 'r');
                    if ($filehandle) {
                        while (($buffer = fgets($filehandle, 256)) !== false) {

                            // Search for the first <h2> tag.  This will be (better be) our title.
                            $matches = array();
                            if (preg_match('/<h1>(.*)<\/h1>/i', $buffer, $matches)) {

                                // Add the page and bail.
                                $pages[$file] = $matches[1];
                                break;
                            }
                        }
                        fclose($filehandle);
                    }
                }
            }
            closedir($dirhandle);
        }

        return $pages;
    }
?>
