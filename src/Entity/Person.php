<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use App\Repository\PersonRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass=PersonRepository::class)
 */
class Person
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
     /**
     * 
     * 
     * @ORM\Column(type="string")
     */
    private $name;
    /**
     * 
     *@ORM\OneToMany(targetEntity="App\Entity\Post", mappedBy="personID")
     *
     */
    private $postId;
    
    function __construct() 
    {
        $this->postId=new ArrayCollection();
    }

    function getName() {
        return $this->name;
    }
     /**
     * @return Collection|Post[]
     */
    function getPostId():Collection 
    { 
        return $this->postId;
    }

    function setName($name): void {
        $this->name = $name;
    }

    function setPostId($postId): void {
        $this->postId = $postId;
    }

    
    public function getId(): ?int
    {
        return $this->id;
    }
    public function __toString()
            
    {
        return $this->getName();
    }
            
            
}
