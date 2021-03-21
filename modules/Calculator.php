<?php

class Calculator
{
    private float $cost; // Общая стоимость
    private array $services; // Список использованных услуг
    private array $ServicesList; // Список всех услуг и их стоимость

    function __construct($cost){
        $this->cost=$cost;
        $this->ServicesList = include "Services.php";
    }

    function Add($service): bool
    {
        /*
         * Добавляет название услуги в список использованных услуг
         * Прибавляет стоимость услуги в общую стоимость
         * return bool
         */
        if (in_array($service, $this->ServicesList)) {
            $this->cost += $this->ServicesList[$service];
            array_push($this->services, $service);
            return true;
        }
        return false;
    }

    function Remove($service): bool{
        /*
         * Убирает услугу из списка использованных услуг
         * Вычитает стоимость услуги из общей стоимости
         * return bool
         */
        if (in_array($service, $this->services)){
            $this->cost -= $this->services[$service];
            unset($this->services[$service]);
            return true;
        }
        return false;
    }

    /* Getters */
    function GetServiceCost($service): float
    {
        /*
         * Возвращает стоимость одной услуги
         * return float
         */
        if (in_array($service, $this->ServicesList)){
            return $this->ServicesList[$service];
        }
    }

    function GetCost(): float
    {
        /*
         * Возвращает общую стоимость
         * return float
         */
        return $this->cost;
    }

    function GetUsedServices(): array
    {
        /*
         * Возвращает список используемых услуг
         * return array
         */
        return $this->services;
    }

    function GetAllServices(): array
    {
        /*
         * Возвращает список всех доступных услуг
         * return array
         */
        return $this->ServicesList;
    }

    /* Render */
    function Render(): string
    {
        /*
         * Позволяет отрисовать калькулятор на странице
         */

        return "";
    }
}