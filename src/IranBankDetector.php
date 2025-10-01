<?php

namespace iranBank;
class IranBankDetector {
    private array $banks;

    public function __construct(string $banksFile = __DIR__ . "/assets/banksList.json") {
        if (!file_exists($banksFile)) {
            throw new \RuntimeException("banksList.json not found at: {$banksFile}");
        }
        $json = file_get_contents($banksFile);
        $data = json_decode($json, true);
        if (!is_array($data)) {
            throw new \RuntimeException("Invalid JSON in banksList.json");
        }
        $this->banks = $data;
    }

    private function attachLogoPath(array $bank): array {
        $base = "https://cdn.jsdelivr.net/gh/sanf-dev/iran-bank-detector/assets/";
        $bank["logoUrl"] = isset($bank["logo"]) ? $base . ltrim($bank["logo"], "/") : null;
        return $bank;
    }

    private function cleanIBanCode(string $iBan): string {
        return preg_replace('/\D+/', "", $iBan);
    }

    public function getBankByCardNumber(string $cardNumber): ?array {
        $digits = preg_replace('/\D+/', "", $cardNumber);
        if (strlen($digits) < 6) return null;
        $bin = substr($digits, 0, 6);
        foreach ($this->banks as $bank) {
            if (!empty($bank["prefixes"]) && in_array($bin, $bank["prefixes"], true)) {
                return $this->attachLogoPath($bank);
            }
        }
        return null;
    }

    public function getBankByIBanCode(string $iBan): ?array {
        $cleaned = $this->cleanIBanCode($iBan);
        foreach ($this->banks as $bank) {
            if (!empty($bank["iBan"]) && strpos($cleaned, $bank["iBan"]) === 0) {
                return $this->attachLogoPath($bank);
            }
        }
        return null;
    }
}