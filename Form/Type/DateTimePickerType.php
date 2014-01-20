<?php

namespace Stnw\DatePickerBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class DateTimePickerType
 * @package Stnw\DatePickerBundle\Form\Type
 * @author Studenikin Sergey <studenikin.s@gmail.com>
 */
class DateTimePickerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $dateOptions = $builder->get('date')->getOptions();

        $builder
            ->remove('date')
            ->add('date', 'datePicker', $dateOptions);
    }

    public function getParent()
    {
        return 'datetime';
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'date_widget' => 'single_text',
            'time_widget' => 'choice'
        ));
    }

    public function getName()
    {
        return 'dateTimePicker';
    }
}
