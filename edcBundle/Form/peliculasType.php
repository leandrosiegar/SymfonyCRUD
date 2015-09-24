<?php
namespace edcBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Doctrine\ORM\EntityRepository;

class peliculasType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
	// Como el Form de peliculas TIENE combos que tiren de otras tablas (cineastas) a esta función se
	// la llama solo cuando vayamos a Add
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
         $builder
            ->add('titulo')
            ->add('anno')
            ->add('idDirector', 'entity', array(
    			'class' => 'edcBundle:cineastas',
                'property' => 'nombre',
    			'query_builder' => function (EntityRepository $er) {
        								return $er->createQueryBuilder('c')
            							->orderBy('c.nombre', 'ASC');
    				}
            ))
            ->add('idActor1', 'entity', array(
    			'class' => 'edcBundle:cineastas',
                'property' => 'nombre',
    			'query_builder' => function (EntityRepository $er) {
        								return $er->createQueryBuilder('c')
            							->orderBy('c.nombre', 'ASC');
    				}))
            ->add('idActor2', 'entity', array(
    			'class' => 'edcBundle:cineastas',
                'property' => 'nombre',
    			'query_builder' => function (EntityRepository $er) {
        								return $er->createQueryBuilder('c')
            							->orderBy('c.nombre', 'ASC');
    				}))
            ->add('guardar', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'edcBundle\Entity\peliculas'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'edcbundle_peliculas';
    }
}