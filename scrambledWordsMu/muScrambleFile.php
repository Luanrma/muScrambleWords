<?php

$newWord = $_GET['word'];
$file = fopen('./muScramble.txt', 'a');

fwrite($file, "\n" . $newWord);
fclose($file);

