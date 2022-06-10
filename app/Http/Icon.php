<?php

namespace App\Http;

class Icon
{
    public static function getBiIcons($with_null = null)
    {
        $icons = $with_null ? ['' => 'select a value'] : [];

        // get file content
        $lines = self::get_file_in_array(public_path('assets/vendors/bicon/bootstrap-icons.css'));

        $_icons = array_map(function($line){
            $class = str_replace(['::before', '.'], '', $line);
            return ['icon' => $class, 'name' => last(explode('bi-',$class))];
        }, array_slice($lines,2));

        return $icons + $_icons;
    }

    public static function get_file_in_array($file_path)
    {
        $lines = [];

        $file_content = str_replace(["\r", "\n", "\t", " "],"", file_get_contents($file_path));

        $first = explode('}', $file_content);

        if($first)
        {
            foreach ($first as $key => $value)
            {
                $second = explode('{', $value);

                if(isset($second[0]) && $second[0] !== '') $lines[] = $second[0];
            }
        }

        return $lines;
    }
}
