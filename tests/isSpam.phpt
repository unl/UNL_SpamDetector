--TEST--
SpamDetector->isSpam()
--FILE--
<?php

require_once(dirname(dirname(__FILE__)) . "/src/UNL/SpamDetector/SpamDetector.php");

$spamChecker = new SpamDetector();

$spamChecker->addRule(function($spam){
    if (strpos($spam, 'test') !== false) {
        return true;
    }
});

$spamChecker->addRule(function($spam){
    if (strpos($spam, '192.168.1.1') !== false) {
        return true;
    }
}, 'ip');

echo "The following should be true" . PHP_EOL;
var_dump($spamChecker->isSpam('this is a test'));

echo "The following should be false" . PHP_EOL;
var_dump($spamChecker->isSpam('this should be false'));

echo "The following should be true" . PHP_EOL;
var_dump($spamChecker->isSpam('192.168.1.1', 'ip'));

echo "The following should be false" . PHP_EOL;
var_dump($spamChecker->isSpam('192.168.1.2', 'ip'));
?>
===DONE===
--EXPECT--
The following should be true
bool(true)
The following should be false
bool(false)
The following should be true
bool(true)
The following should be false
bool(false)
===DONE===