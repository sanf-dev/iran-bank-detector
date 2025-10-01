<?php

require_once "../vendor/autoload.php";

use iranBank\IranBankDetector;

$detector = new IranBankDetector();

$bank = $detector->getBankByCardNumber("60637311");
print_r($bank);

$bank = $detector->getBankByIBanCode("IR020170000000000000000000");
print_r($bank);