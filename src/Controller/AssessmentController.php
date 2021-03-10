<?php

namespace App\Controller;

use App\Entity\Assessment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AssessmentController extends AbstractController
{
    /**
     * @Route("/api/assessment", name="assessment")
     * @param Request $request
     * @return Response
     */
    public function getAssessmentData(Request $request): Response
    {
        // TODO: needs some more request validation

        $requestContent = json_decode($request->getContent(), true);
        $assessmentCode = $requestContent['assessmentCode'];

        $assessmentRepository = $this->getDoctrine()->getRepository(Assessment::class);
        $orderedQuestions = $assessmentRepository->findOneBy(['code' => $assessmentCode])
            ->getAssessmentQuestions()
            ->toArray();

        $assessmentQuestions = [];

        foreach ($orderedQuestions as $question) {
            $questionIndex = $question->getQuestionIndex();
            $questionId = $question->getQuestionId()->getId();
            $questionBody = $question->getQuestionId()->getBodyText();
            $questionType = $question->getQuestionId()->getQuestionType();

            $assessmentQuestions[] = ['questionId' => $questionId,
                'questionIndex' => $questionIndex,
                'questionBody' => $questionBody,
                'questionType' => $questionType];
        }

        $response = new Response();

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setContent(json_encode($assessmentQuestions));

        return $response;
    }

    /**
     * @Route("/api/submit", name="submit")
     * @param Request $request
     * @return Response
     */
    public function processSubmit(Request $request): Response
    {
        // TODO: needs some more request validation

        $requestContent = json_decode($request->getContent(), true);
        $assessmentAnswers = $requestContent['assessmentAnswers'];

        // TODO: validating test answers and calculating result should not happen here and not this way,
        // but for now:

        $result1 = ((80 - $assessmentAnswers[0]) + $assessmentAnswers[1] +
            (80 - $assessmentAnswers[2]) + (80 - $assessmentAnswers[3]) + $assessmentAnswers[4]) / 5;
        $result2 = ((8 - $assessmentAnswers[5]) + $assessmentAnswers[6] +
            $assessmentAnswers[7] + (8 - $assessmentAnswers[8]) + (8 - $assessmentAnswers[9])) / 5;

        $results = [["resultTitle" => "Veranderkracht",
                    "resultValue"  => $result1],
                    ["resultTitle" => "Teamplayer",
                    "resultValue" => $result2]];

        $response = new Response();

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setContent(json_encode($results));

        return $response;
    }

    /**
     * @Route("/{reactRouting}", name="home", defaults={"reactRouting": null})
     */
    public function index(): Response
    {
        $assessmentRepository = $this->getDoctrine()->getRepository(Assessment::class);
        $assessment = $assessmentRepository->findOneBy(['code' => 'TEST1']);

        return $this->render('assessment/index.html.twig', [
            'assessmentTitle' => $assessment->getTitle(),
            'assessmentCode' => $assessment->getCode(),
        ]);
    }


}
