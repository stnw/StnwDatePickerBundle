<?php

namespace Stnw\DatePickerBundle\Filter;

use Sonata\DoctrineORMAdminBundle\Filter\AbstractDateFilter;

class DateTimeFilter extends AbstractDateFilter
{
    /**
     * Flag indicating that filter will have range
     * @var boolean
     */
    protected $range = false;

    /**
     * Flag indicating that filter will filter by datetime instead by date
     * @var boolean
     */
    protected $time = true;


    /**
     * {@inheritdoc}
     */
    public function getRenderSettings()
    {
        return array('filterDateTimePicker', array(
            'field_type'    => $this->getFieldType(),
            'field_options' => $this->getFieldOptions(),
            'label'         => $this->getLabel()
        ));
    }
}
