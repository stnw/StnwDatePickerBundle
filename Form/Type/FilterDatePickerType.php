<?php

namespace Stnw\DatePickerBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Sonata\AdminBundle\Form\Type\Filter\DateType;
use Sonata\AdminBundle\Form\Type\Filter\DateRangeType;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Translation\TranslatorInterface;


/**
 *
 * Class DatePickerType
 * @package Stnw\DatePickerBundle\Form\Type
 * @author Studenikin Sergey <studenikin.s@gmail.com>
 */
class FilterDatePickerType extends AbstractType
{

    const TYPE_GREATER_EQUAL = 1;

    const TYPE_GREATER_THAN = 2;

    const TYPE_EQUAL = 3;

    const TYPE_LESS_EQUAL = 4;

    const TYPE_LESS_THAN = 5;

    const TYPE_NULL = 6;

    const TYPE_NOT_NULL = 7;

    protected $translator;

    /**
     * @param \Symfony\Component\Translation\TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'filterDatePicker';
    }

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $choices = array(
            self::TYPE_EQUAL            => $this->translator->trans('label_date_type_equal', array(), 'SonataAdminBundle'),
            self::TYPE_GREATER_EQUAL    => $this->translator->trans('label_date_type_greater_equal', array(), 'SonataAdminBundle'),
            self::TYPE_GREATER_THAN     => $this->translator->trans('label_date_type_greater_than', array(), 'SonataAdminBundle'),
            self::TYPE_LESS_EQUAL       => $this->translator->trans('label_date_type_less_equal', array(), 'SonataAdminBundle'),
            self::TYPE_LESS_THAN        => $this->translator->trans('label_date_type_less_than', array(), 'SonataAdminBundle'),
            self::TYPE_NULL             => $this->translator->trans('label_date_type_null', array(), 'SonataAdminBundle'),
            self::TYPE_NOT_NULL         => $this->translator->trans('label_date_type_not_null', array(), 'SonataAdminBundle'),
        );

        $builder
            ->add('type', 'choice', array('choices' => $choices, 'required' => false))
            ->add('value', 'datePicker', array_merge(array('required' => false), $options['field_options']))
        ;
    }

    /**
     * {@inheritDoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'field_type'       => 'datePicker',
            'field_options'    => array('date_format' => 'yyyy-MM-dd')
        ));
    }


}