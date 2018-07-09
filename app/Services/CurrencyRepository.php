<?php

namespace App\Services;

class CurrencyRepository implements CurrencyRepositoryInterface
{
    private $currencies;

    public function __construct($currencies)
    {
        foreach ($currencies as $currency) {
            $this->currencies[$currency->getId()] = $currency;
        }
    }

    public function findAll(): array
    {
        return $this->currencies; 
    }

    public function findActive(): array
    {
        foreach ($this->currencies as $currency) {
            if ($currency->isActive()===true) {
                $active_currencies[] = $currency; 
            }
        }
        return $active_currencies;
    }

    public function findById(int $id): ?Currency
    {
        $find = NULL;
        foreach ($this->currencies as $currency) {
            if ($currency->getId()==$id) {
                $find = $currency;
                break; 
            }
        }
        return $find;
    }

    public function save(Currency $currency): void
    {   
        $this->currencies[$currency->getId()] = $currency;
    }

    public function delete(Currency $currency): void
    {
        $id = $currency->getId();
        if ($this->findById($id)!==NULL) {
            unset($this->currencies[$id]);
        }
    }

    public function newId() {
        return max(array_keys($this->currencies))+1;
    }
}