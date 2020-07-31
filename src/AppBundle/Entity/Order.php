<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 30.07.2020
 * Time: 20:05
 */

namespace AppBundle\Entity;


class Order
{
    private
        $name, $date, $products = [], $phone, $sex;

    function __construct($order)
    {
        $this->setOrder($order);
    }

    //рассчет скидки на заказ
    function getDiscount(array $discounts)
    {
        if (is_array($discounts) && count($this->products) > 0)
        {
            $discountsVal = [];
            $nowTime = time();

            foreach ($discounts as $row)
            {
                $keysAccept = [];

                foreach ($row as $key=>$value)
                {
                    if ($value !== null && $key != 'id' && $key != 'discount')
                        {
                            $keysAccept[$key] = false;

                            switch ($key)
                            {
                                case 'products':
                                    {
                                        //проверяем, совпадают ли услуги из заказа с условием из скидки
                                        $products = explode(',', $value);
                                        $matches = array_intersect($products, $this->products);

                                        if (count($matches) == count($products))
                                            $keysAccept[$key] = true;
                                    }
                                    break;

                                case 'sex':
                                    {
                                        if ($this->sex == $value)
                                            $keysAccept[$key] = true;
                                    }
                                    break;

                                case 'isphone':
                                    {
                                        if ((int)$value === 1)
                                        {
                                            if ( strlen($this->phone) > 4 && (int)$value === 1)
                                                $keysAccept[$key] = true;
                                        }
                                        else
                                            $keysAccept[$key] = true;
                                    }
                                    break;

                                case 'phonelastnum':
                                    {
                                        if ((int)$value === 1)
                                        {
                                            if ( strlen($this->phone) > 4)
                                            {
                                                $lastnum = substr( (int)$this->phone,-4);
                                                if ($lastnum == $value)
                                                    $keysAccept[$key] = true;
                                            }
                                        }
                                        else
                                            $keysAccept[$key] = true;
                                    }
                                    break;

                                case 'isbornbefore':
                                    {
                                        if ((int)$value === 1)
                                        {
                                            if ($this->date !== null)
                                            {
                                                $timeOfBorn = strtotime($this->date);
                                                $dayBorn = date("j", $timeOfBorn);
                                                $monthBorn = date("n", $timeOfBorn);

                                                $curYear = date("Y", $nowTime);

                                                //приводим дату рождения к текущему году
                                                $dateTime = new \DateTime();
                                                $dateTime->setTimestamp($timeOfBorn);
                                                $dateTime->setDate($curYear, $monthBorn, $dayBorn);

                                                $timeDayBorn = $dateTime->getTimestamp();

                                                $diff = $nowTime-$timeDayBorn;
                                                $period1 = 6*24*3600;
                                                $period2 = 7*24*3600;

                                                if ( $diff > $period1 && $diff < $period2)
                                                    $keysAccept[$key] = true;
                                            }
                                        }
                                        else
                                            $keysAccept[$key] = true;
                                    }
                                    break;

                                case 'isbornafter':
                                    {

                                        if ((int)$value === 1)
                                        {
                                            if ($this->date !== null)
                                            {
                                                $timeOfBorn = strtotime($this->date);
                                                $dayBorn = date("j", $timeOfBorn);
                                                $monthBorn = date("n", $timeOfBorn);

                                                $curYear = date("Y", $nowTime);

                                                //приводим дату рождения к текущему году
                                                $dateTime = new \DateTime();
                                                $dateTime->setTimestamp($timeOfBorn);
                                                $dateTime->setDate($curYear, $monthBorn, $dayBorn);

                                                $timeDayBorn = $dateTime->getTimestamp();

                                                $diff = $timeDayBorn-$nowTime;
                                                $period1 = 6*24*3600;
                                                $period2 = 7*24*3600;

                                                if ( $diff > $period1 && $diff < $period2)
                                                    $keysAccept[$key] = true;
                                            }
                                        }

                                        else
                                            $keysAccept[$key] = true;
                                    }
                                    break;

                                case 'begin':
                                    {
                                        $date = (array)$value;
                                        $timeBegin = strtotime($date['date']);

                                        if ($timeBegin <= $nowTime)
                                            $keysAccept[$key] = true;
                                    }
                                    break;

                                case 'end':
                                    {
                                        $date = (array)$value;
                                        $timeEnd = strtotime($date['date']);

                                        if ($timeEnd > $nowTime)
                                            $keysAccept[$key] = true;
                                    }
                                    break;
                            }
                        }
                }

                $discountsVal[] = (in_array(false, $keysAccept) === false)? $row['discount']: 0;
            }

            return max($discountsVal);
        }
        else
        {
            return 0;
        }
    }

    //    [ [name] => [name of param]
//      [value] => [value of param] ]
    function setOrder(array $orderParams)
    {
        foreach ($orderParams as $row)
        {
            if (is_array($this->{$row['name']}))
                array_push($this->{$row['name']}, $row['value']);
            else
                $this->{$row['name']} = $row['value'];
        }
    }
}