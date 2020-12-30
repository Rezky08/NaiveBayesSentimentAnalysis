<?php

require_once 'vendor/autoload.php';
require_once 'NaivebayesSentiment.php';

use Naivebayes\Naivebayes;

// datasets format
$datasets = [
    [
        'text' => 'ada yang baru tapi bukan kamu',
        'label' => 'Positif'
    ],
    [
        'text' => 'oh ternyata begini rasanya',
        'label' => 'Negatif'
    ],
    [
        'text' => 'aku kzl banget sama kamu',
        'label' => 'Negatif'
    ],

    [
        'text' => 'Jangan pernah memulai perdebatan',
        'label' => 'Positif'
    ],

];

// slangs format
$slangs = [
    'kzl' => 'kesal',
];

// stopwords format
$stopwords = [
    'ada',
    'dan',
    'oh',
    'adalah'
];

// must insert slangs 
$naive_bayes = new Naivebayes($slangs, $stopwords);

// to get features of datasets
$naive_bayes->count($datasets);

// to get sentiment direction
$text = "kamu kesel?";
echo $text . '<br>';
// return array (label,positive probability,negative probability)
$result = $naive_bayes->calculate($text);
echo "Sentiment Direction " . $result['label'] . "<br>";
echo "Positif " . $result['positif'] . "<br>";
echo "Negatif " . $result['negatif'] . "<br>";
