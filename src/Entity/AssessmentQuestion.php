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
    private $question;

    /**
     * @ORM\ManyToOne(targetEntity=Assessment::class, inversedBy="assessmentQuestions", fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     */
    private $assessment;

    /**
     * @ORM\Column(type="integer")
     */
    private $questionIndex;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(?Question $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getAssessment(): ?Assessment
    {
        return $this->assessment;
    }

    public function setAssessment(?Assessment $assessment): self
    {
        $this->assessment = $assessment;

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
