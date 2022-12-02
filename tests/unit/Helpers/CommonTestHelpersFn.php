<?php

namespace Tests\Unit\Helpers;

class CommonTestHelpersFn
{
    /**
     * Make sure that the tmp dir exists
     *
     * @return string
     */
    private static function getTmpDirPath()
    {
        $path = dirname(dirname(dirname(__DIR__))) . '/.tmp/';

        if (!file_exists($path) || is_dir($path)) {
            mkdir($path, 0777, true);
            file_put_contents($path . '.gitignore', '*');
        }

        return $path;
    }

    /**
     * Takes a JSON and returns an assoc array string representation
     *
     * @param string $json_data JSON string data
     *
     * @return string
     */
    private static function jsonDataToAssocArray($json_data)
    {
        $search = ['{', '"', ': ', '}'];
        $replace = ['[', "'", ' => ', ']'];
        return str_replace($search, $replace, $json_data);
    }

    /**
     * Write content to a file, with extra prefix/suffix when necessary
     *
     * @param string $filename File path
     * @param string $data Data content
     * @param string $flags file_put_contents flags
     *
     * @return void
     */
    private static function writeContentToFile($filename, $data, $flags)
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if ($ext === 'php') {
            $data = "<?php\n\n\$data = $data;\n";
        }

        file_put_contents($filename, stripslashes($data), $flags);
    }

    /**
     * Convert data to JSON then write it to a tmp file
     * Helps with finding the expected values while writing tests
     *
     * @param mixed  $data     Data to write
     * @param string $filename Data to write
     * @param bool   $append   Append to file
     *
     * @return void
     */
    public static function dumpToJson($data, $filename = null, $append = false)
    {
        if (empty($filename)) {
            $filename = 'data.md';
        }

        $path = static::getTmpDirPath();
        $path .= $filename;
        $json_data = json_encode($data, JSON_PRETTY_PRINT);

        if ($json_data === false) {
            throw new \Exception('Invalida data type was provided');
        } else {
            $flags = 0;
            if ($append) {
                $flags = FILE_APPEND;

                if (file_exists($path)) {
                    $content = file_get_contents($path);
                    if (!empty($content)) {
                        $json_data = "\n\n" . $json_data;
                    }
                }
            }
            $assoc_array = static::jsonDataToAssocArray($json_data);
            static::writeContentToFile($path, $assoc_array, $flags);
        }
    }
}
