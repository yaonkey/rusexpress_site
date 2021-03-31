<?php

class Calculator
{
    private float $cost; // Общая стоимость
    private array $usedServices; // Список использованных услуг
    private array $Services; // Список всех услуг и их стоимость
    private array $Cities; // Список всех городов и сроки доставки
    private array $Zones; // Список зон

    public function __construct()
    {
        $this->Services = include "components/Services.php";
        $this->Cities = include "components/Cities.php";
        $this->Zones = include "components/Zones.php";
    }

    /**
     * Доставка по Москве и МО (за МКАД)
     * @param string $region Москва или МО
     * @param string $sendType Срочно или Эконом
     * @param int $weight Вес заказа
     */
    public function MoscowSend(string $region, string $sendType, int $weight){
        if ($region == 'Москва' || $region == 'МО'){
            if ($sendType == 'Эконом' || $sendType == 'Срочно'){
                if ($weight > 0){
                    // todo: Сделать доставку по Москве и МО
                }else{
                    echo "Вес должен быть больше 0";
                }
            }else{
                echo "Выберите тип доставки: Эконом или Срочно";
            }
        }else{
            echo "Выберите регион: Москва (в пределах МКАД) или МО (за пределами МКАД)";
        }
    }

    public function ChangeCity(string $city){
        if ($this->CityInServices($city)){
            if ($this->Services[0] == 'Москва Мкад'){
                // todo
            }
        }
    }

    /**
     * Изменяемая функция для тестирования модулей
     */
    public function Test(string $city){
        return $this->GetCityZone($city);
    }

    public function GetAllCities(): array
    {
        return array_keys($this->Cities);
    }

    /**
     * Находит зону города
     * @param string $city Искомый город
     * @return int Зона города
     */
    public function GetCityZone(string $city): int
    {
        if ($this->CityInServices($city)){
            foreach ($this->Cities as $cityKey => $cityParams){
                if ($cityKey == $city && (int)$cityParams[1] <= 10 ){
                    return $cityParams[1];
                }
            }
        }
        return 0;
    }


    /**
     * Проверяет наличие города в базе услуг
     * @param string $city Проверяемый город
     * @return bool Наличие города
     */
    private function CityInServices(string $city): bool
    {
        if (in_array($city, array_keys($this->Cities))){
            return true;
        }else{
            return false;
        }
    }

}