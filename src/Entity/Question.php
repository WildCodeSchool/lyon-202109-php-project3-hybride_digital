<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestionRepository::class)
 */
class Question
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $question;

    /**
     * @ORM\ManyToMany(targetEntity=Audit::class, mappedBy="question")
     */
    private ArrayCollection $audits;

    /**
     * @ORM\Column(type="integer")
     */
    private int $typeofanswer;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $valuepoint;

    public function __construct()
    {
        $this->audits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    /**
     * @return Collection|Audit[]
     */
    public function getAudits(): Collection
    {
        return $this->audits;
    }

    public function addAudit(Audit $audit): self
    {
        if (!$this->audits->contains($audit)) {
            $this->audits[] = $audit;
            $audit->addQuestion($this);
        }

        return $this;
    }

    public function removeAudit(Audit $audit): self
    {
        if ($this->audits->removeElement($audit)) {
            $audit->removeQuestion($this);
        }

        return $this;
    }

    public function getSelector(): ?string
    {
        return $this->getQuestion();
    }

    public function getTypeofanswer(): ?int
    {
        return $this->typeofanswer;
    }

    public function setTypeofanswer(int $typeofanswer): self
    {
        $this->typeofanswer = $typeofanswer;

        return $this;
    }

    public function getValuepoint(): ?int
    {
        return $this->valuepoint;
    }

    public function setValuepoint(?int $valuepoint): self
    {
        $this->valuepoint = $valuepoint;

        return $this;
    }
}
