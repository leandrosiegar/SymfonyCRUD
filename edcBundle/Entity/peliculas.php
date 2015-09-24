<?php
namespace edcBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * peliculas
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class peliculas
{
	
	
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=40)
     */
    private $titulo;

    /**
     * @var integer
     *
     * @ORM\Column(name="anno", type="integer")
     */
    private $anno;

    /**
     * @var integer
     *
     * @ORM\Column(name="idDirector", type="integer")
     */
    private $idDirector;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="idActor1", type="integer")
     */
    private $idActor1;

    /**
     * @var integer
     *
     * @ORM\Column(name="idActor2", type="integer")
     */
    private $idActor2;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     *
     * @return peliculas
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set anno
     *
     * @param integer $anno
     *
     * @return peliculas
     */
    public function setAnno($anno)
    {
        $this->anno = $anno;

        return $this;
    }

    /**
     * Get anno
     *
     * @return integer
     */
    public function getAnno()
    {
        return $this->anno;
    }

    /**
     * Set idDirector
     *
     * @param integer $idDirector
     *
     * @return peliculas
     */
    public function setIdDirector($idDirector)
    {
        $this->idDirector = $idDirector;
        return $this;
    }
    
    /**
     * Get idDirector
     *
     * @return integer
     */
    public function getIdDirector()
    {
        return $this->idDirector;
    }
    
  
    
    /**
     * Set idActor1
     *
     * @param integer $idActor1
     *
     * @return peliculas
     */
    public function setIdActor1($idActor1)
    {
        $this->idActor1 = $idActor1;

        return $this;
    }

    /**
     * Get idActor1
     *
     * @return integer
     */
    public function getIdActor1()
    {
        return $this->idActor1;
    }

    /**
     * Set idActor2
     *
     * @param integer $idActor2
     *
     * @return peliculas
     */
    public function setIdActor2($idActor2)
    {
        $this->idActor2 = $idActor2;

        return $this;
    }

    /**
     * Get idActor2
     *
     * @return integer
     */
    public function getIdActor2()
    {
        return $this->idActor2;
    }

}

