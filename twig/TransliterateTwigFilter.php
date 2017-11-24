<?php
namespace Grav\Plugin;
use Grav\Common\Plugin;
class TransliterateTwigFilter extends \Twig_Extension
{
    public function getName()
    {
        return 'TransliterateTwigFilter';
    }
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('transliterate', [$this, 'TransliterateFunction']),
            new \Twig_SimpleFilter('filename', [$this, 'FilenameFunction'])
        ];
    }
    /**
     * Transliterate: Remove special characters
     */    
    public function TransliterateFunction($string)
    {
        $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
        $string = preg_replace('/[^A-Za-z0-9 \-_]/', '', $string);
        return $string;
    }
    /**
     * Filename: Remove special characters and whitespace
     */    
    public function FilenameFunction($string)
    {
        $string = $this -> TransliterateFunction($string);
        $string = strtolower($string);
        $string = preg_replace('/[^a-z0-9_]/', '', $string);
        return $string;
    }
}
