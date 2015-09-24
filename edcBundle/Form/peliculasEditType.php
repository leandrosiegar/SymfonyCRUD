<?php
namespace edcBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Doctrine\ORM\EntityRepository;

class peliculasEditType extends AbstractType
{
	// El constructor es necesario a la hora de modificar para establecer el data en los combos
	public function __construct($em) {
		$this->em = $em;
	}
	
	public function setSelected($campo, $idSelect) {
		switch($campo) {
			case 'idDirector':$this->idDirectorSelect = $idSelect;
						break;
			case 'idActor1':$this->idActor1Select = $idSelect;
						break;
			case 'idActor2':$this->idActor2Select = $idSelect;
						break;
		}
	}

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
	// Como el Form de peliculas TIENE combos que tiren de otras tablas (cineastas) a esta función se 
	// la llama solo cuando vayamos a Edit
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
    				},
    		    'data' => $this->em->getReference("edcBundle:cineastas",$this->idDirectorSelect)
            ))
            ->add('idActor1', 'entity', array(
    			'class' => 'edcBundle:cineastas',
                'property' => 'nombre',
    			'query_builder' => function (EntityRepository $er) {
        								return $er->createQueryBuilder('c')
            							->orderBy('c.nombre', 'ASC');
    				},
    		    'data' => $this->em->getReference("edcBundle:cineastas",$this->idActor1Select)
            
            ))
            ->add('idActor2', 'entity', array(
    			'class' => 'edcBundle:cineastas',
                'property' => 'nombre',
    			'query_builder' => function (EntityRepository $er) {
        								return $er->createQueryBuilder('c')
            							->orderBy('c.nombre', 'ASC');
    				},
    		    'data' => $this->em->getReference("edcBundle:cineastas",$this->idActor2Select)
            ))
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