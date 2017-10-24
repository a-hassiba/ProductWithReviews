<?php
/**
 * Created by PhpStorm.
 * User: hassiba
 * Date: 27/09/17
 * Time: 19:01
 */

namespace BBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use BBundle\Entity\Review as Rev;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="product_name", type="string", length=255)
     */
    private $productName;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="brand", type="string", length=255)
     */
    private $brand;

    /**
     * @var string
     *
     * @ORM\Column(name="product_material", type="string", length=255)
     */
    private $productMaterial;

    /**
     * @var string
     *
     * @ORM\Column(name="base_price", type="string", length=255)
     */
    private $basePrice;

    /**
     * @var string
     *
     * @ORM\Column(name="image_url", type="string", length=255)
     */
    private $imageUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="delivery", type="string", length=255)
     */
    private $delivery;

    /**
     * @var string
     *
     * @ORM\Column(name="details", type="string", length=255)
     */
    private $details;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get productName
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }


    /**
     * @param $productName
     * @return $this
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }


    /**
     * @param $category
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get brand
     *
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }


    /**
     * @param $brand
     * @return $this
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get productMaterial
     *
     * @return string
     */
    public function getProductMaterial()
    {
        return $this->productMaterial;
    }


    /**
     * @param $productMaterial
     * @return $this
     */
    public function setProductMaterial($productMaterial)
    {
        $this->productMaterial = $productMaterial;

        return $this;
    }

    /**
     * @return string
     */
    public function getBasePrice()
    {
        return $this->basePrice;
    }


    /**
     * @param $basePrice
     * @return $this
     */
    public function setBasePrice($basePrice)
    {
        $this->basePrice = $basePrice;

        return $this;
    }

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }


    /**
     * @param $imageUrl
     * @return $this
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getDelivery()
    {
        return $this->delivery;
    }


    /**
     * @param $delivery
     * @return $this
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;

        return $this;
    }

    /**
     * @return string
     */
    public function getDetails()
    {
        return $this->delivery;
    }


    /**
     * @param $details
     * @return $this
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * @ORM\OneToMany(targetEntity="BBundle\Entity\Review", mappedBy="product")
     */
    private $reviews;


    public function __construct()
    {
        $this->reviews = new ArrayCollection();

    }

    public function addReview(Rev $review)
    {
        $this->reviews[] = $review;

        return $this;
    }

    public function removeReview(Rev $review)
    {
        $this->reviews->removeElement($review);
    }

    public function getReviews()
    {
        return $this->reviews;
    }




}