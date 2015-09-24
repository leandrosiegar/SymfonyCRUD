<?php
namespace edcBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class cineastasType extends AbstractType
{
 /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
	// Como el Form de cineastas no tiene combos que tiren de otras tablas a esta función se 
	// la llama tanto para Add como para Edit
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('guardar', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'edcBundle\Entity\cineastas'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'edcbundle_cineastas';
    }
}
