<?php



echo $data['changelog_last'];
echo $data['changelog_all'];

$version ='1.0.0.0';
$text[1] = 'Change:Text';
$text[2] = 'Fix:Text';
$text[3] = 'Feature:Text';
$text[4] = 'Mix:Text';
$text[5] = 'Tweak:Text';

$datum = '17.09.2024';
$autor = 'Kjell';
$text = \DEFAULTNAMESPACE\app\uielements\ui_versionlookup::Go($version,$text,$autor,$datum,false);
echo $text;


