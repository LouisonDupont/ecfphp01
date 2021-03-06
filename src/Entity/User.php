<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToMany(targetEntity=Competences::class, inversedBy="users")
     */
    private $Competences;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codepostal;

    /**
     * @ORM\OneToMany(targetEntity=Experiences::class, mappedBy="user")
     */
    private $experiences;

    /**
     * @ORM\OneToMany(targetEntity=Mission::class, mappedBy="user")
     */
    private $mission;



//    /**
//     * * @var datetime $createAt
//     *
//     * @ORM\Column(type="datetime")
//     */
//    protected $createAt;

    public function __construct()
    {
        $this->Competences = new ArrayCollection();
        $this->experiences = new ArrayCollection();
        $this->mission = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUsername()
    {
        // TODO: Implement getUsername() method.
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Competences[]
     */
    public function getCompetences(): Collection
    {
        return $this->Competences;
    }

    public function addCompetence(Competences $competence): self
    {
        if (!$this->Competences->contains($competence)) {
            $this->Competences[] = $competence;
        }

        return $this;
    }

    public function removeCompetence(Competences $competence): self
    {
        $this->Competences->removeElement($competence);

        return $this;
    }

//    public function getCreateAt(): DateTime
//    {
//        return $this->createAt;
//    }
//
//    public function setCreateAt(\DateTimeInterface $createAt): self
//    {
//        $this->createAt = $createAt;
//
//        return $this;
//    }

//    /**
//     * @var datetime $updated
//     *
//     * @ORM\Column(type="datetime", nullable = true)
//     */
//    protected $updated;


    /**
     * Gets triggered only on insert

     * @ORM\PrePersist
     */
//    public function onPrePersist()
//    {
//        $this->createAt = new \DateTime("now");
//    }

//    /**
//     * Gets triggered every time on update
//
//     * @ORM\PreUpdate
//     */
//    public function onPreUpdate()
//    {
//        $this->updated = new \DateTime("now");
//    }



public function getTelephone(): ?string
{
    return $this->telephone;
}

public function setTelephone(string $telephone): self
{
    $this->telephone = $telephone;

    return $this;
}

public function getVille(): ?string
{
    return $this->ville;
}

public function setVille(string $ville): self
{
    $this->ville = $ville;

    return $this;
}

public function getAdresse(): ?string
{
    return $this->adresse;
}

public function setAdresse(string $adresse): self
{
    $this->adresse = $adresse;

    return $this;
}

public function getCodepostal(): ?string
{
    return $this->codepostal;
}

public function setCodepostal(string $codepostal): self
{
    $this->codepostal = $codepostal;

    return $this;
}

    public function setCreateAt(\DateTime $now)
    {
    }
      public function setModifiedAt(\DateTime $now)
    {
    }

      /**
       * @return Collection|Experiences[]
       */
      public function getExperiences(): Collection
      {
          return $this->experiences;
      }

      public function addExperience(Experiences $experience): self
      {
          if (!$this->experiences->contains($experience)) {
              $this->experiences[] = $experience;
              $experience->setUser($this);
          }

          return $this;
      }

      public function removeExperience(Experiences $experience): self
      {
          if ($this->experiences->removeElement($experience)) {
              // set the owning side to null (unless already changed)
              if ($experience->getUser() === $this) {
                  $experience->setUser(null);
              }
          }

          return $this;
      }

      /**
       * @return Collection|Mission[]
       */
      public function getMission(): Collection
      {
          return $this->mission;
      }

      public function addMission(Mission $mission): self
      {
          if (!$this->mission->contains($mission)) {
              $this->mission[] = $mission;
              $mission->setUser($this);
          }

          return $this;
      }

      public function removeMission(Mission $mission): self
      {
          if ($this->mission->removeElement($mission)) {
              // set the owning side to null (unless already changed)
              if ($mission->getUser() === $this) {
                  $mission->setUser(null);
              }
          }

          return $this;
      }

}
