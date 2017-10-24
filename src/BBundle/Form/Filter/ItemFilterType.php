<?php
/**
 * Created by PhpStorm.
 * User: hassiba
 * Date: 08/10/17
 * Time: 07:58
 */

namespace BBundle\Form\Filter;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type as Filters;

class ItemFilterType extends AbstractType
{
    private $loop;

    public function __construct($loop)
    {
        $this->loop = $loop;
    }


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('productName', Filters\TextFilterType::class);
    }

    public function getBlockPrefix()
    {
        return 'item_filter';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection'   => true,
            'data_class' => 'BBundle\Form\Filter\ItemFilterObject',
        ));
    }
}