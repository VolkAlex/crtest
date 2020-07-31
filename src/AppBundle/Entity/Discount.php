<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Discount
 *
 * @ORM\Table(name="discount")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DiscountRepository")
 */
class Discount
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="products", type="string", length=255, nullable=true)
     */
    private $products;

    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=1, nullable=true)
     */
    private $sex;

    /**
     * @var bool
     *
     * @ORM\Column(name="isphone", type="boolean", nullable=true)
     */
    private $isphone;

    /**
     * @var int
     *
     * @ORM\Column(name="phonelastnum", type="integer", nullable=true)
     */
    private $phonelastnum;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="begin", type="date")
     */
    private $begin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end", type="date", nullable=true)
     */
    private $end;

    /**
     * @var int
     *
     * @ORM\Column(name="discount", type="integer")
     */
    private $discount;

    /**
     * @var bool
     *
     * @ORM\Column(name="isbornbefore", type="boolean", nullable=true)
     */
    private $isbornbefore;

    /**
     * @var bool
     *
     * @ORM\Column(name="isbornafter", type="boolean", nullable=true)
     */
    private $isbornafter;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set products
     *
     * @param string $products
     *
     * @return Discount
     */
    public function setProducts($products)
    {
        $this->products = $products;

        return $this;
    }

    /**
     * Get products
     *
     * @return string
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set sex
     *
     * @param string $sex
     *
     * @return Discount
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set isphone
     *
     * @param boolean $isphone
     *
     * @return Discount
     */
    public function setIsphone($isphone)
    {
        $this->isphone = $isphone;

        return $this;
    }

    /**
     * Get isphone
     *
     * @return bool
     */
    public function getIsphone()
    {
        return $this->isphone;
    }

    /**
     * Set phonelastnum
     *
     * @param integer $phonelastnum
     *
     * @return Discount
     */
    public function setPhonelastnum($phonelastnum)
    {
        $this->phonelastnum = $phonelastnum;

        return $this;
    }

    /**
     * Get phonelastnum
     *
     * @return int
     */
    public function getPhonelastnum()
    {
        return $this->phonelastnum;
    }

    /**
     * Set begin
     *
     * @param \DateTime $begin
     *
     * @return Discount
     */
    public function setBegin($begin)
    {
        $this->begin = $begin;

        return $this;
    }

    /**
     * Get begin
     *
     * @return \DateTime
     */
    public function getBegin()
    {
        return $this->begin;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     *
     * @return Discount
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set discount
     *
     * @param integer $discount
     *
     * @return Discount
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get discount
     *
     * @return int
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set isbornbefore
     *
     * @param boolean $isbornbefore
     *
     * @return Discount
     */
    public function setIsbornbefore($isbornbefore)
    {
        $this->isbornbefore = $isbornbefore;

        return $this;
    }

    /**
     * Get isbornbefore
     *
     * @return bool
     */
    public function getIsbornbefore()
    {
        return $this->isbornbefore;
    }

    /**
     * Set isbornafter
     *
     * @param boolean $isbornafter
     *
     * @return Discount
     */
    public function setIsbornafter($isbornafter)
    {
        $this->isbornafter = $isbornafter;

        return $this;
    }

    /**
     * Get isbornafter
     *
     * @return bool
     */
    public function getIsbornafter()
    {
        return $this->isbornafter;
    }

}

