<?php
namespace App\Services;
class CurrencyGenerator
{
    public static function generate(): array
    {
        $date = new \DateTime();

        $currencies[] = new Currency(
            1,
            'Bitcoin',
            'btc',
            6634.91,
            $date,
            true
        );
        $currencies[] = new Currency(
            2,
            'Ethereum',
            'eth',
            471.85,
            $date,
            true
        );
        $currencies[] = new Currency(
            3,
            'XRP',
            'xrp',
            0.471945,
            $date,
            true
        );
        $currencies[] = new Currency(
            4,
            'Bitcoin Cash',
            'btcc',
            724.06,
            $date,
            false
        );
        $currencies[] = new Currency(
            5,
            'EOS',
            'eos',
            8.62,
            $date,
            true
        );
        return $currencies;
    }
}