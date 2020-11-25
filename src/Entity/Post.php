<?php

namespace App\Entity;
use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $cretedAt;
     /**
     
     * @ORM\ManyToOne(targetEntity="App\Entity\Person",inversedBy="postId")
      
     */
    private $personID;
    function getPersonID() {
        return $this->personID;
    }

    function setPersonID($personID): void {
        $this->personID = $personID;
    }
   
     /** 
     * @ORM\ManyToOne(targetEntity="App\Entity\Coment", inversedBy="id")
     * 
     */
    private $coment;
    function getComent() 
    {
        return $this->coment;
    }

    function setComent($coment): void {
        $this->coment = $coment;
    }

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(?string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCretedAt(): ?\DateTimeInterface
    {
        return $this->cretedAt;
    }

    public function setCretedAt(?\DateTimeInterface $cretedAt): self
    {
        $this->cretedAt = $cretedAt;

        return $this;
    }
     public function __toString()
    {
        return $this->personID;
    }
}
