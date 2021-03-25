<?php

class Calculator
{
    private float $cost; // Общая стоимость
    private array $services; // Список использованных услуг
    private array $ServicesList; // Список всех услуг и их стоимость

    function __construct(){
//        $this->cost=$cost;
        $this->ServicesList = include "components/Services.php";
    }

    /**
     * Добавляет название услуги в список использованных услуг
     * Прибавляет стоимость услуги в общую стоимость
     * @param string $service Сервис, который нужно включить в стоимость
     * @return bool
     */
    public function Add(string $service): bool
    {
        if (in_array($service, $this->ServicesList)) {
            $this->cost += $this->ServicesList[$service];
            array_push($this->services, $service);
            return true;
        }
        return false;
    }

    /**
     * Убирает услугу из списка использованных услуг
     * Вычитает стоимость услуги из общей стоимости
     * @param string $service Сервис, который требуется убрать из стоимости
     * @return bool
     */
    public function Remove(string $service): bool{

        if (in_array($service, $this->services)){
            $this->cost -= $this->services[$service];
            unset($this->services[$service]);
            return true;
        }
        return false;
    }

    /* Getters */

    /**
     * Возвращает стоимость одной услуги
     * @param string $service Наименование сервиса
     * @return float
     */
    public function GetServiceCost(string $service): float
    {

        if (in_array($service, $this->ServicesList)){
            return $this->ServicesList[$service];
        }
    }

    /**
    * Возвращает общую стоимость
    * @return float
    */
    public function GetCost(): float
    {

        return $this->cost;
    }

    /**
    * Возвращает список используемых услуг
    * @return array
    */
    public function GetUsedServices(): array
    {

        return $this->services;
    }

    /**
     * Возвращает список всех доступных услуг
     * @return array
     */
    public function GetAllServices(): array
    {

        return $this->ServicesList;
    }

    /* Render */

    /**
     * Позволяет отрисовать калькулятор на странице
     * @return string
     */
    public function Render(): string
    {


        return "";
    }
}