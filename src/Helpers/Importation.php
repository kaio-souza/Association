<?php


namespace Association\Helpers;


use Association\Exceptions\FailedToReadFile;

class Importation
{
    public static function csv2Array($pathOrResource)
    {
        $lines = [];

        try {
            $file = is_string($pathOrResource) ? fopen($pathOrResource, 'r') : $pathOrResource;
            while (!feof($file)) {
                $content = fgetcsv($file, 1000, ',');
                if (is_iterable($content))
                    $lines[] = array_filter($content, 'strlen');
            }
            fclose($file);
        } catch (\Throwable $e) {
            throw new FailedToReadFile($e);
        }

        if (!count($lines))
            throw new FailedToReadFile();

        return $lines;
    }
}