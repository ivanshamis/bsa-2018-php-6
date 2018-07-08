<?php

namespace App\Services;

class CurrencyRepository implements CurrencyRepositoryInterface
{
    private $currencies;

    public function __construct(array $currencies)
    {
        $this->currencies = $currencies;
    }

    public function findAll(): array
    {
        return $this->currencies; 
    }

    public function findActive(): array
    {
        foreach ($this->currencies as $currency) {
            if ($currency->isActive()===true) { $active_currencies[] = $currency; }
        }
        return $active_currencies;
    }

    public function findById(int $id): ?Currency
    {
        $find = NULL;
        foreach ($this->currencies as $currency) {
            if ($currency->getId()==$id) { $find = $currency; }
        }
        return $find;
    }

    public function save(Currency $currency): void
    {
        $this->currencies[] = $currency;
    }

    public function delete(Currency $currency): void
    {
        $currencies = $this->currencies;
        for ($i=0; $i<count($currencies); $i++) {
            if ($currencies[$i]->getId()==$currency->getId()) {
                 unset($currencies[$i]); 
                 break;
                }
            }
    }
}