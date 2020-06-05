<?php

/**
 * Created by PhpStorm.
 * User: maestro300697
 * Date: 05.06.2020
 * Time: 13:49
 */



class SortArray
{

    /**
     * @var array $arrayOne
     */
    private $arrayOne = [];

    /**
     * @var array $arrayTwo
     */
    private $arrayTwo = [];

    /**
     * @var array $mixedArray
     */
    private $mixedArray = [];


    /**
     * @param array $arrayOne
     * @param array $arrayTwo
     * return mixed $mixedArray
     */
    function mixedArrays(array $arrayOne,array $arrayTwo)
    {

        if(count($arrayOne) != count($arrayTwo)){
            throw new LengthException("Количество сымволов в массивах должно быть равным");
        }
        $this->arrayOne = $arrayOne;
        $this->arrayTwo = $arrayTwo;
        for ($i = 0; $i < count($arrayOne); $i++){
            $this->mixedArray[2*$i] = $arrayOne[$i];
            $this->mixedArray[2*$i+1] = $arrayTwo[$i];
        }
        return $this->mixedArray;
    }

    /**
     * @return array
     */
    public function getArrayOne():array
    {
        return $this->arrayOne;
    }

    /**
     * @param array $arrayOne
     */
    public function setArrayOne(array $arrayOne)
    {
        $this->arrayOne = $arrayOne;
    }

    /**
     * @return array
     */
    public function getArrayTwo():array
    {
        return $this->arrayTwo;
    }

    /**
     * @param array $arrayTwo
     */
    public function setArrayTwo(array $arrayTwo)
    {
        $this->arrayTwo = $arrayTwo;
    }

    /**
     * Возвращает объединенный массив
     * @return array
     */
    public function getMixedArray(): array
    {
        return $this->mixedArray;
    }

}

$arraySort = new SortArray();
$mixedArray = $arraySort->mixedArrays([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
    ['q','w','e','r','t','y','u','i','o','p','a','s','d','f','g','h','j','k','l','z']);
var_dump($mixedArray);
