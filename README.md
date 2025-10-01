# 🏦 Iran Bank Detector

This package is designed to find **Iranian bank information** based on **IBan Numbers** and **Card Prefixes**. Users can input either an IBan number or a card prefix to retrieve the related bank information (such as bank name, logo, and related colors).

![preview](https://cdn.jsdelivr.net/gh/sanf-dev/iran-bank-detector/assets/preview/preview.png)

## ✨ Features

- 📑 Identify banks by **IBan Number**
- 💳 Identify banks by **Card Prefix**
- ✂️ **Automatically remove the `IR` or `ir` prefix** from the IBan number
- 🎨 **Display bank logos** and related color information

## 📦 Installation

To install the package, use the following command:

```bash
composer require sanf/iran-bank-detector
```

## 🧪 Usage

**1. Using IBan number**
To retrieve bank information by IBan, simply pass the IBan number to the **getBankByIBanCode** function. This function will automatically remove the IR or ir prefix from the IBan and return the corresponding bank.

```php
require_once "vendor/autoload.php";
use iranBank\IranBankDetector;

$detector = new IranBankDetector();
$bank = $detector->getBankByIBanCode("IR020170000000000000000000");
print_r($bank);
```

**2. Using Card Prefix**
To retrieve bank information by card prefix, simply pass the card number to the **getBankByCardNumber** function.

```php
require_once "vendor/autoload.php";

use iranBank\IranBankDetector;

$detector = new IranBankDetector();
$bank = $detector->getBankByCardNumber("60637311");
print_r($bank);
```

## 🌐 CDN Support

Bank logos are served via a **CDN** to avoid the need for users to download or upload the files themselves. You can fetch the logos from the CDN links provided in return **logo** field.

## 📐 Recommended Logo Size

To ensure optimal display quality, we recommend using logos with a **maximum size of 72x72 pixels**.

**power by [iran-bank-detector](https://github.com/4limirzaei/iran-bank-detector)**
