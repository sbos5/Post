<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use App\Repository\ComentRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
/**
 * @ORM\Entity(repositoryClass=ComentRepository::class)
 */
class Coment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $komemtarz;

    /**
     *@ORM\OneToMany(targetEntity="App\Entity\Post", mappedBy="coment")
     */
    private $Why;
     public function __construct() 
    {
        $this->Why=new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKomemtarz(): ?string
    {
        return $this->komemtarz;
    }

    public function setKomemtarz(?string $komemtarz): self
    {
        $this->komemtarz = $komemtarz;

        return $this;
    }
    /**
     * @return Collection|Post[]
     */

    public function getWhy(): Collection
    {
        return $this->Why;
    }

    public function setWhy( $Why): self
    {
        $this->Why = $Why;

        return $this;
    }
     public function __toString()
    {
        return $this->getKomemtarz();
    }
   
}
