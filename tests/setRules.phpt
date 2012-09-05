--TEST--
SpamDetector->setRules()
--FILE--
<?php
require_once(dirname(dirname(__FILE__)) . "/src/UNL/SpamDetector/SpamDetector.php");

$spamChecker = new SpamDetector();

$rules = array();

$rules['ip'][] = function($spam) {
    if ($spam == '127.0.0.1') {
        return true;
    }

    return false;
};

$spamChecker->setRules($rules);

var_dump($spamChecker->isSpam('127.0.0.1', 'ip'));
?>
===DONE===
--EXPECT--
bool(true)
===DONE===