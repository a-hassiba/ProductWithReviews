<?php
/**
 * Created by PhpStorm.
 * User: hassiba
 * Date: 08/10/17
 * Time: 18:06
 */

namespace BBundle\Entity;


class Task
{
    protected $category;

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

}