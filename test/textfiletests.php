<?php

use OGBitBlt\Output\OutputCompressionType;
use OGBitBlt\Output\OutputEncodingType;
use OGBitBlt\Output\OutputFactory;
use OGBitBlt\Output\TextFile;

require dirname(__DIR__) . '/vendor/autoload.php';

$fileName       = "foobar.txt";
$fileBase64     = "foobar_base64.txt";
$fileGzipped    = "foobar_gzipped.txt";

if(file_exists($fileName)) unlink($fileName);
if(file_exists($fileBase64)) unlink($fileBase64);
if(file_exists($fileGzipped)) unlink($fileGzipped);

$t0 = OutputFactory::Create(TextFile::class,['file' => $fileName]);
$t1 = new TextFile($fileBase64);
$t2 = new TextFile($fileGzipped);

$msg = "The earliest known appearance of the phrase was in The Boston Journal. In an article titled \"Current Notes\" in the February 9, 1885, edition, ";
$msg = $msg . "the phrase is mentioned as a good practice sentence for writing students: \"A favorite copy set by writing teachers for their pupils is the ";
$msg = $msg . "following, because it contains every letter of the alphabet: 'A quick brown fox jumps over the lazy dog.'\"[2] Dozens of other newspapers ";
$msg = $msg . "published the phrase over the next few months, all using the version of the sentence starting with \"A\" rather than \"The\". The earliest ";
$msg = $msg . "known use of the phrase starting with \"The\" is from the 1888 book Illustrative Shorthand by Linda Bronson. The modern form (starting with";
$msg = $msg . " \"The\") became more common even though it is slightly longer than the original (starting with \"A\").\n";
$msg = $msg . "A 1908 edition of the Los Angeles Herald Sunday Magazine records that when the New York Herald was equipping an office with typewriters \"a ";
$msg = $msg . "few years ago\", staff found that the common practice sentence of \"now is the time for all good men to come to the aid of the party\" did not";
$msg = $msg . " familiarize typists with the entire alphabet, and ran onto two lines in a newspaper column. They write that a staff member named Arthur F. Curtis";
$msg = $msg . " invented the \"quick brown fox\" pangram to address this.\n";
$msg = $msg . "As the use of typewriters grew in the late 19th century, the phrase began appearing in typing lesson books as a practice sentence. Early examples ";
$msg = $msg . "include How to Become Expert in Typewriting: A Complete Instructor Designed Especially for the Remington Typewriter (1890), and Typewriting ";
$msg = $msg . "Instructor and Stenographer's Hand-book (1892). By the turn of the 20th century, the phrase had become widely known. In the January 10, 1903, ";
$msg = $msg . "issue of Pitman's Phonetic Journal, it is referred to as \"the well known memorized typing line embracing all the letters of the alphabet\". Robert ";
$msg = $msg . "Baden-Powell's book Scouting for Boys (1908) uses the phrase as a practice sentence for signaling.\n";
$msg = $msg . "The first message sent on the Moscow-Washington hotline on August 30, 1963, was the test phrase \"THE QUICK BROWN FOX JUMPED OVER THE LAZY DOG'S BACK ";
$msg = $msg . "1234567890\". Later, during testing, the Russian translators sent a message asking their American counterparts, \"What does it mean when your ";
$msg = $msg . "people say 'The quick brown fox jumped over the lazy dog'?\"\n";
$msg = $msg . "During the 20th century, technicians tested typewriters and teleprinters by typing the sentence.\n";
$msg = $msg . "It is the sentence used in the annual Zaner-Bloser National Handwriting Competition, a cursive writing competition which has been held in the U.S. ";
$msg = $msg . "since 1991.";

printf("Wrote plain text to %s\n",$fileName);
$t0->WriteLn($msg);

printf("Wrote base64 encoding to %s\n",$fileBase64);
$t1->WriteLn($msg,['encoding' => OutputEncodingType::Base64]);

printf("Wrote gzipped text to %s\n",$fileGzipped);
$t2->WriteLn($msg,['compression' => OutputCompressionType::Gzip]);


