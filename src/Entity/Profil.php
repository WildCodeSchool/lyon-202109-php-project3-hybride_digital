<?php

namespace App\Entity;

use App\Repository\ProfilRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfilRepository::class)
 */
class Profil
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="profils")
     * @ORM\JoinColumn(nullable=false)
     */
    private User $user;

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTimeInterface $createAt;

    /**
     * @ORM\Column(type="string", length=9, nullable=true)
     */
    private ?string $numberSiren;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $sizeFirm;

    /**
     * @ORM\Column(type="integer")
     */
    private int $sectorFirm;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $numberSales;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private ?bool $poleMarketing;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $numberMarketers;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private ?bool $poleCommercial;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $numberCommercial;

    /**
     * @ORM\Column(type="integer")
     */
    private int $crmUsed;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $crmName;

    /**
     * @ORM\Column(type="integer")
     */
    private int $timeOfProspec;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $precisTimeOfProspec;

    /**
     * @ORM\Column(type="array")
     */
    private array $typeOfProspec = [];

    /**
     * @ORM\Column(type="integer")
     */
    private int $prospecMoreClient;

    /**
     * @ORM\Column(type="integer")
     */
    private int $numberClosPerMonth;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $precisClosPerMonth;

    /**
     * @ORM\Column(type="integer")
     */
    private int $budOfProspPerMonth;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $prcisBudProsMonth;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $analyseProspec;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $satisfiedOfRoi;

    /**
     * @ORM\Column(type="json")
     */
    private array $priorityCommercial = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCreateAt(): \DateTimeInterface
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeInterface $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getNumberSiren(): ?string
    {
        return $this->numberSiren;
    }

    public function setNumberSiren(?string $numberSiren): self
    {
        $this->numberSiren = $numberSiren;

        return $this;
    }

    public function getSizeFirm(): ?int
    {
        return $this->sizeFirm;
    }

    public function setSizeFirm(?int $sizeFirm): self
    {
        $this->sizeFirm = $sizeFirm;

        return $this;
    }

    public function getSectorFirm(): ?int
    {
        return $this->sectorFirm;
    }

    public function setSectorFirm(int $sectorFirm): self
    {
        $this->sectorFirm = $sectorFirm;

        return $this;
    }

    public function getNumberSales(): ?int
    {
        return $this->numberSales;
    }

    public function setNumberSales(?int $numberSales): self
    {
        $this->numberSales = $numberSales;

        return $this;
    }

    public function getPoleMarketing(): ?bool
    {
        return $this->poleMarketing;
    }

    public function setPoleMarketing(?bool $poleMarketing): self
    {
        $this->poleMarketing = $poleMarketing;

        return $this;
    }

    public function getNumberMarketers(): ?int
    {
        return $this->numberMarketers;
    }

    public function setNumberMarketers(?int $numberMarketers): self
    {
        $this->numberMarketers = $numberMarketers;

        return $this;
    }

    public function getPoleCommercial(): ?bool
    {
        return $this->poleCommercial;
    }

    public function setPoleCommercial(?bool $poleCommercial): self
    {
        $this->poleCommercial = $poleCommercial;

        return $this;
    }

    public function getNumberCommercial(): ?int
    {
        return $this->numberCommercial;
    }

    public function setNumberCommercial(?int $numberCommercial): self
    {
        $this->numberCommercial = $numberCommercial;

        return $this;
    }

    public function getCrmUsed(): ?int
    {
        return $this->crmUsed;
    }

    public function setCrmUsed(int $crmUsed): self
    {
        $this->crmUsed = $crmUsed;

        return $this;
    }

    public function getCrmName(): ?string
    {
        return $this->crmName;
    }

    public function setCrmName(?string $crmName): self
    {
        $this->crmName = $crmName;

        return $this;
    }

    public function getTimeOfProspec(): ?int
    {
        return $this->timeOfProspec;
    }

    public function setTimeOfProspec(int $timeOfProspec): self
    {
        $this->timeOfProspec = $timeOfProspec;

        return $this;
    }

    public function getPrecisTimeOfProspec(): ?string
    {
        return $this->precisTimeOfProspec;
    }

    public function setPrecisTimeOfProspec(?string $precisTimeOfProspec): self
    {
        $this->precisTimeOfProspec = $precisTimeOfProspec;

        return $this;
    }

    public function getTypeOfProspec(): ?array
    {
        return $this->typeOfProspec;
    }

    public function setTypeOfProspec(array $typeOfProspec): self
    {
        $this->typeOfProspec = $typeOfProspec;

        return $this;
    }

    public function getProspecMoreClient(): ?int
    {
        return $this->prospecMoreClient;
    }

    public function setProspecMoreClient(int $prospecMoreClient): self
    {
        $this->prospecMoreClient = $prospecMoreClient;

        return $this;
    }

    public function getNumberClosPerMonth(): ?int
    {
        return $this->numberClosPerMonth;
    }

    public function setNumberClosPerMonth(int $numberClosPerMonth): self
    {
        $this->numberClosPerMonth = $numberClosPerMonth;

        return $this;
    }

    public function getPrecisClosPerMonth(): ?string
    {
        return $this->precisClosPerMonth;
    }

    public function setPrecisClosPerMonth(?string $precisClosPerMonth): self
    {
        $this->precisClosPerMonth = $precisClosPerMonth;

        return $this;
    }

    public function getBudOfProspPerMonth(): ?int
    {
        return $this->budOfProspPerMonth;
    }

    public function setBudOfProspPerMonth(int $budOfProspPerMonth): self
    {
        $this->budOfProspPerMonth = $budOfProspPerMonth;

        return $this;
    }

    public function getPrcisBudProsMonth(): ?string
    {
        return $this->prcisBudProsMonth;
    }

    public function setPrcisBudProsMonth(?string $prcisBudProsMonth): self
    {
        $this->prcisBudProsMonth = $prcisBudProsMonth;

        return $this;
    }

    public function getAnalyseProspec(): ?bool
    {
        return $this->analyseProspec;
    }

    public function setAnalyseProspec(bool $analyseProspec): self
    {
        $this->analyseProspec = $analyseProspec;

        return $this;
    }

    public function getSatisfiedOfRoi(): ?bool
    {
        return $this->satisfiedOfRoi;
    }

    public function setSatisfiedOfRoi(bool $satisfiedOfRoi): self
    {
        $this->satisfiedOfRoi = $satisfiedOfRoi;

        return $this;
    }

    public function getPriorityCommercial(): ?array
    {
        return $this->priorityCommercial;
    }

    public function setPriorityCommercial(array $priorityCommercial): self
    {
        $this->priorityCommercial = $priorityCommercial;

        return $this;
    }
}
