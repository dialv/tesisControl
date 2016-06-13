<?php

namespace tesisControl\tesisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NotasType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nota')
            ->add('ponderacion')
            ->add('observacion')
            ->add('carnetA')
            ->add('idEtapa')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'tesisControl\tesisBundle\Entity\Notas'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tesiscontrol_tesisbundle_notas';
    }
}
