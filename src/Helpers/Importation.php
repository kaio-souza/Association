<?php


namespace Association\Helpers;


class Importation
{
    public static function csv2Array($pathOrResource){
        $lines = [];

        $file = is_string($pathOrResource) ? fopen($pathOrResource, 'r') : $pathOrResource;
        while (!feof($file) ) {
            $content = fgetcsv($file, 1000, ',');
            if(is_iterable($content))
                $lines[] = array_filter($content, 'strlen');
        }

        fclose($file);

        return $lines;
    }
}