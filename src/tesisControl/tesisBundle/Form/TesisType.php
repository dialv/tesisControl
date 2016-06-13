<?php

namespace tesisControl\tesisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TesisType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaInicio')
            ->add('fechaFin')
            ->add('nombreT')
            ->add('idGrupo')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'tesisControl\tesisBundle\Entity\Tesis'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tesiscontrol_tesisbundle_tesis';
    }
}
