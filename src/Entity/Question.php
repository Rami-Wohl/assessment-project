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
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bodyText;

    /**
     * @ORM\Column(type="integer")
     */
    private $questionType;

    /**
     * @ORM\OneToMany(targetEntity=AssessmentQuestion::class, mappedBy="questionId", orphanRemoval=true)
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

    public function getBodyText(): ?string
    {
        return $this->bodyText;
    }

    public function setBodyText(string $bodyText): self
    {
        $this->bodyText = $bodyText;

        return $this;
    }

    public function getQuestionType(): ?int
    {
        return $this->questionType;
    }

    public function setQuestionType(int $questionType): self
    {
        $this->questionType = $questionType;

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
            $assessmentQuestion->setQuestionId($this);
        }

        return $this;
    }

    public function removeAssessmentQuestion(AssessmentQuestion $assessmentQuestion): self
    {
        if ($this->assessmentQuestions->removeElement($assessmentQuestion)) {
            // set the owning side to null (unless already changed)
            if ($assessmentQuestion->getQuestionId() === $this) {
                $assessmentQuestion->setQuestionId(null);
            }
        }

        return $this;
    }
}
