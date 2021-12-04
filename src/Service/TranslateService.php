<?php

namespace App\Service;

class TranslateService
{
    public function transliterate(string $string):string
    {
        mb_internal_encoding("UTF-8");
        $string = mb_strtolower($string);
        $string = htmlspecialchars_decode(trim($string));
        
        $lat = array(
            'а' => 'a',
            'б' => 'b',
            'в' => 'v',
            'г' => 'g',
            'д' => 'd',
            'е' => 'e',
            'ё' => 'yo',
            'ж' => 'zh',
            'з' => 'z',
            'и' => 'i',
            'й' => 'y',
            'к' => 'k',
            'л' => 'l',
            'м' => 'm',
            'н' => 'n',
            'о' => 'o',
            'п' => 'p',
            'р' => 'r',
            'с' => 's',
            'т' => 't',
            'у' => 'u',
            'ф' => 'f',
            'х' => 'h',
            'ц' => 'c',
            'ч' => 'ch',
            'ш' => 'sh',
            'щ' => 'shch',
            'ь' => '',
            'ы' => 'i',
            'ъ' => '',
            'э' => 'e',
            'ю' => 'yu',
            'я' => 'ya',
        );
        
        $string = str_replace(array_keys($lat), array_values($lat), $string);
        
        $string = preg_replace('((\s))', ' ', $string);
        $string = trim($string);
        $string = str_replace('–', '-', $string);
        $string = str_replace(':', '-', $string);
        $string = str_replace('&', '-', $string);
        $string = str_replace('(', '-', $string);
        $string = str_replace(')', '-', $string);
        $string = str_replace(',', '-', $string);
        $string = str_replace(' ', '-', $string);
        $string = str_replace('?', '', $string);
        
        $string = str_replace('serii', '', $string);
        
        $string = preg_replace('#_+#', '-', $string);
        $string = preg_replace('#\-{2,}#', '-', $string);
        $string = preg_replace('#\-$#', '', $string);
        
        return $string;
    }
}