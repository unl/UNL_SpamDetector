UNL_SpamDetector
================

A super simple, highly configurable and lightweight PHP spam detector.

Easily create your own custom rules for detecting spam.

This library is useful in detecting if something **may** be spam and will naturally return some false negatives.  Thus, it is important to do further checks (ie: CAPTCHA) if this library flags something as spam.

This library comes in handy when you want a user to have a seamless experience by only requiring a CAPTCHA for those people who are flagged as potential spam.

Create a SpamDetector Object
--------
```
<?php
$spamChecker = new SpamDetector();
```

## Add spam detection Rules
### Add a text rule (text is the default type)
(anonymous functions must return true if it is spam)
```
$spamChecker->addRule(function($spam){
    if (strpos($spam, 'test') !== false) {
        return true;
    }
});
```
### Add an IP rule (types can be added using the second parameter)
```
$spamChecker->addRule(function($spam){
    if (strpos($spam, '192.168.1.1') !== false) {
        return true;
    }
}, 'ip');
```

## Check if something is spam
### Check if text (the default type) is spam
```
//The following should be true
var_dump($spamChecker->isSpam('this is a test'));

//The following should be false
var_dump($spamChecker->isSpam('this should be false'));
```
### Check if a custom type (IP address in this case) is spam
```
//The following should be true
var_dump($spamChecker->isSpam('192.168.1.1', 'ip'));

//The following should be false
var_dump($spamChecker->isSpam('192.168.1.2', 'ip'));
```
