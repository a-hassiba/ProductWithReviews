<?php
/**
 * Created by PhpStorm.
 * User: hassiba
 * Date: 27/09/17
 * Time: 19:14
 */

namespace BBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use BBundle\Entity\Product as Prod;

/**
 * @ORM\Entity
 * @ORM\Table(name="review")
 */
class Review
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
     * @ORM\Column(name="rating", type="string", length=255)
     */
    private $rating;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;


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
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }


    /**
     * @param $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get rating
     *
     * @return string
     */
    public function getRating()
    {
        return $this->rating;
    }


    /**
     * @param $rating
     * @return $this
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * @ORM\ManyToOne(targetEntity="BBundle\Entity\Product", inversedBy="reviews")
     * @ORM\JoinColumn(nullable=false, name="pruduct_id")
     */
    private $product;

    /**
     * @param Product $product
     * @return $this
     */
    public function setProduct(Prod $product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return Prod
     */
    public function getProduct()
    {
        return $this->product;
    }


}