<?php

namespace App\Entity;

use App\Entity\Admin\User;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass="App\Repository\CompanyRepository")
 * @UniqueEntity("name")
 * @Vich\Uploadable
 */
class Company
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"json"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Groups({"json"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"json"})
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"json"})
     */
    private $logo;

    /**
     * @Vich\UploadableField(mapping="company_logos", fileNameProperty="logo")
     * @Groups({"json"})
     * @var File
     */
    private $logoFile;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Branch", inversedBy="companies")
     * @Groups({"json"})
     */
    private $branch;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"json"})
     */
    private $contribution;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"json"})
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"json"})
     */
    private $geographicPerimeter;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"json"})
     */
    private $postalCode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"json"})
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"json"})
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"json"})
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"json"})
     */
    private $urlWebsite;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"json"})
     */
    private $keywords;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"json"})
     */
    private $complementaryInformations;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="company")
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="companies")
     * @Groups({"json"})
     */
    private $owner;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"json"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"json"})
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"json"})
     */
    private $nomDeLaRue;


    public function __construct()
    {
        $this->createdAt = time();
        $this->updatedAt = time();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function arrayExport(): ?array
    {
        return [
            $this->name,
            $this->email,
            $this->telephone,
            $this->logo,
            $this->branch->getName(),
            $this->contribution,
            $this->nomDeLaRue,
            $this->city,
            $this->country,
            $this->postalCode,
            $this->geographicPerimeter,
            $this->description,
            $this->complementaryInformations,
            $this->urlWebsite,
            $this->keywords,
        ];
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }


    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getGeographicPerimeter(): ?string
    {
        return $this->geographicPerimeter;
    }

    public function setGeographicPerimeter(?string $geographicPerimeter): self
    {
        $this->geographicPerimeter = $geographicPerimeter;

        return $this;
    }



    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setPublicMail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getComplementaryInformations(): ?string
    {
        return $this->complementaryInformations;
    }

    public function setComplementaryInformations(?string $complementaryInformations): self
    {
        $this->complementaryInformations = $complementaryInformations;

        return $this;
    }

    public function getBranch(): ?Branch
    {
        return $this->branch;
    }

    public function setBranch(?Branch $branch): self
    {
        $this->branch = $branch;

        return $this;
    }

    public function getContribution(): ?string
    {
        return $this->contribution;
    }

    public function setContribution(?string $contribution): self
    {
        $this->contribution = $contribution;

        return $this;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUrlWebsite(): ?string
    {
        return $this->urlWebsite;
    }

    public function setUrlWebsite(?string $urlWebsite): self
    {
        $this->urlWebsite = $urlWebsite;

        return $this;
    }

    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    public function setKeywords(?string $keywords): self
    {
        $this->keywords = $keywords;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function setLogoFile(File $logo = null)
    {
        $this->logoFile = $logo;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($logo) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = time();
        }
    }

    public function getLogoFile()
    {
        return $this->logoFile;
    }

    public function getNomDeLaRue(): ?string
    {
        return $this->nomDeLaRue;
    }

    public function setNomDeLaRue(string $nomDeLaRue): self
    {
        $this->nomDeLaRue = $nomDeLaRue;

        return $this;
    }


}
