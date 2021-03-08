<?php

namespace App\Entity;

use App\Repository\AssessmentQuestionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AssessmentQuestionRepository::class)
 */
class AssessmentQuestion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Question::class, inversedBy="assessmentQuestions", fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     */
    private $questionId;

    /**
     * @ORM\ManyToOne(targetEntity=Assessment::class, inversedBy="assessmentQuestions", fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     */
    private $assessmentId;

    /**
     * @ORM\Column(type="integer")
     */
    private $questionIndex;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestionId(): ?Question
    {
        return $this->questionId;
    }

    public function setQuestionId(?Question $questionId): self
    {
        $this->questionId = $questionId;

        return $this;
    }

    public function getAssessmentId(): ?Assessment
    {
        return $this->assessmentId;
    }

    public function setAssessmentId(?Assessment $assessmentId): self
    {
        $this->assessmentId = $assessmentId;

        return $this;
    }

    public function getQuestionIndex(): ?int
    {
        return $this->questionIndex;
    }

    public function setQuestionIndex(int $questionIndex): self
    {
        $this->questionIndex = $questionIndex;

        return $this;
    }
}
