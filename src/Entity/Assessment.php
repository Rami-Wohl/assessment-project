<?php

namespace App\Entity;

use App\Repository\AssessmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AssessmentRepository::class)
 */
class Assessment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity=AssessmentQuestion::class, mappedBy="assessmentId", orphanRemoval=true, fetch="EAGER")
     * @ORM\OrderBy({"questionIndex": "ASC"})
     */
    private $assessmentQuestions;

    public function __construct()
    {
        $this->assessmentQuestions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|AssessmentQuestion[]
     */
    public function getAssessmentQuestions(): Collection
    {
        return $this->assessmentQuestions;
    }

    public function addAssessmentQuestion(AssessmentQuestion $assessmentQuestion): self
    {
        if (!$this->assessmentQuestions->contains($assessmentQuestion)) {
            $this->assessmentQuestions[] = $assessmentQuestion;
            $assessmentQuestion->setAssessmentId($this);
        }

        return $this;
    }

    public function removeAssessmentQuestion(AssessmentQuestion $assessmentQuestion): self
    {
        if ($this->assessmentQuestions->removeElement($assessmentQuestion)) {
            // set the owning side to null (unless already changed)
            if ($assessmentQuestion->getAssessmentId() === $this) {
                $assessmentQuestion->setAssessmentId(null);
            }
        }

        return $this;
    }
}
