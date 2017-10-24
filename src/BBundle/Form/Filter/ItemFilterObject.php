<?php
/**
 * Created by PhpStorm.
 * User: hassiba
 * Date: 08/10/17
 * Time: 08:39
 */

namespace BBundle\Form\Filter;

use Symfony\Component\Validator\Constraints\NotBlank;

class ItemFilterObject
{

    /**
     * @NotBlank(message="contact.form.name.empty")
     */
    private $productName;

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @param mixed $name
     */
    public function setProductName($productName)
    {
        $this->name = $productName;
    }


}