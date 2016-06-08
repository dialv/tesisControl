<?php

namespace tesisControl\tesisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TesisEstadoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreEs')
            ->add('descripcionEs')
            ->add('fechaDefensa')
            ->add('fechaInicio')
            ->add('fechaFin')
            ->add('status')
            ->add('observacion')
            ->add('idLocal')
            ->add('idGrupo')
            ->add('idEtapa')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'tesisControl\tesisBundle\Entity\TesisEstado'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tesiscontrol_tesisbundle_tesisestado';
    }
}
