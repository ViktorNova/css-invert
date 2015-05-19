#!/usr/bin/php

<?php

//$file=fopen("./site.css","r");
$file="./invert-me.css.css";


function inverseColors($css) {
    preg_match_all('/#([a-f0-9]{6}|[a-f0-9]{3})/i', $css, $matches);
    $original = $matches[0];
    $inversed = array();
    foreach($matches[1] as $key => $color) {    
        $parts = str_split($color, strlen($color) == 3 ? 1 : 2);
        foreach($parts as &$part) {
            $part = str_pad(dechex(255 - hexdec($part)), 2, 0, STR_PAD_LEFT);
        }
        $inversed[$key] = '#'.implode('', $parts);    
    }

    $css = str_replace($original, $inversed, $css);
    echo $css;
}

file_put_contents($file, inverseColors(file_get_contents($file)));

?>
