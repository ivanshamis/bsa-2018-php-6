<?php

namespace App\Services;

class CurrencyRepository implements CurrencyRepositoryInterface
{
    private $currencies;

    public function __construct()
    {
        $this->currencies = CurrencyGenerator::generate();
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
            }
        }
        return $find;
    }

    public function save(Currency $currency): void
    {   
        // updating existing currency at first
        $maxId = 0;
        $found = false;
        $currencies = $this->currencies;
        for ($i=0; $i<count($currencies); $i++) { 
            $cur_id = $currencies[$i]->getId();
            if ($maxId<$cur_id) {
                $maxId = $cur_id;
            }
            if ($cur_id==$currency->getId()) {
                $currencies[$i] = $currency; 
                $found = true;
                break;
            }
        }
        // creating new currency if nothing to update
        if (!$found) {  
            $id = $currency->getId();
            if ($id===NULL) {
                $id = $maxId+1;
            }
            $createCurrency = new Currency(
                $id,
                $currency->getName(),
                $currency->getShortName(),
                $currency->getActualCourse(),
                $currency->getActualCourseDate(),
                $currency->isActive()
            );    
            $this->currencies[] = $createCurrency;
        }
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