#!/usr/bin/php

<?php

if(!(in_array("help", $argv) || in_array("-h", $argv)) && $argc>=3)
{

//$file=fopen("./site.css","r");
$filein=$argv[$argc-2];
$fileout=$argv[$argc-1];
//The whole argc-n is a little hack to make this work using both "php css-invert.php filein.css fileout.css" and "./css-invert.php filein.css fileout.css"
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

file_put_contents($fileout, inverseColors(file_get_contents($filein)));
}
else
{
    echo "USAGE:\n php css-invert.php <filein.php> <fileout.php> [-h] [--help] OR ./css-invert.php <filein.php> <fileout.php> [-h] [--help]\n\n Flags -h, --help for this help dialog"
}
    
?>
