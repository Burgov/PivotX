<?php

namespace PivotX\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class MediarelationType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('sortingOrder')
            ->add('content')
            ->add('extrafield')
            ->add('media')
        ;
    }

    public function getName()
    {
        return 'pivotx_corebundle_mediarelationtype';
    }
}