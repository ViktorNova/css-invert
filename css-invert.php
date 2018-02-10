#!/usr/bin/php
<?php
// check arguments
if (array_intersect(['-h', 'help'], $argv) || $argc != 2) {
    die("USAGE:\n php css-invert.php <filein.php> <fileout.php> [-h] [--help] OR ./css-invert.php <filein.php> <fileout.php> [-h] [--help]\n\n Flags -h, --help for this help dialog\n");
}

// check to make sure input file exists
if (!file_exists($argv[1])) {
    die($file . " doesn't exist");
}

/**
 * swap the hex colors to their inverse value
 * @param  string $css a hex value color
 * @return string      the inverted color returned as a hex value
 */
function inverseColors($css)
{
    preg_match_all('/#([a-f0-9]{6}|[a-f0-9]{3})/i', $css, $matches);
    $original = $matches[0];
    $inversed = array();
    foreach ($matches[1] as $key => $color) {
        $parts = str_split($color, strlen($color) == 3 ? 1 : 2);
        foreach ($parts as &$part) {
            $part = str_pad(dechex(255 - hexdec($part)), 2, 0, STR_PAD_LEFT);
        }
        $inversed[$key] = '#'.implode('', $parts);
    }

    $css = str_replace($original, $inversed, $css);
    echo $css;
}

$filein=$argv[$argc-2];
$fileout=$argv[$argc-1];
//The whole argc-n is a little hack to make this work using both "php css-invert.php filein.css fileout.css" and "./css-invert.php filein.css fileout.css"

file_put_contents($fileout, inverseColors(file_get_contents($filein)));
