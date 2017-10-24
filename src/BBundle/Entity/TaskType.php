<?php
/**
 * Created by PhpStorm.
 * User: hassiba
 * Date: 08/10/17
 * Time: 18:27
 */

namespace BBundle\Entity;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use BBundle\Entity\Task;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type as Filters;
use BBundle\Services\FormService;

class TaskType extends AbstractType
{
    private $formService;

    public function __construct(FormService $formService)
    {
        $this->formService = $formService;
    }

    public function getCategories()
    {
        return $this->formService->getAllCategories();
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('save', SubmitType::class)
            ->add('category', 'choice', array(
                'placeholder' => 'Choose a season',
                'choices' => $this->getCategories(),
                'expanded' => true,
                'multiple' => false
            ))
        ;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection'   => true,
            'data_class' => 'BBundle\Entity\Task',
        ));
    }

}