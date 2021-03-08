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
    public function getAssessmentData(Request $request)
    {
        // needs some more request validation

        $requestContent = json_decode($request->getContent(), true);
        $assessmentCode = $requestContent['assessmentCode'];

        $assessmentRepository = $this->getDoctrine()->getRepository(Assessment::class);
        $orderedQuestions = $assessmentRepository->findOneBy(['code' => $assessmentCode])
                                                 ->getAssessmentQuestions()
                                                 ->toArray();

        $assessmentQuestions = [];

        foreach($orderedQuestions as $question){
            $questionIndex = $question->getQuestionIndex();
            $questionId    = $question->getQuestionId()->getId();
            $questionBody  = $question->getQuestionId()->getBodyText();
            $questionType  = $question->getQuestionId()->getQuestionType();

            $assessmentQuestions[] = ['questionId'    => $questionId,
                                      'questionIndex' => $questionIndex,
                                      'questionBody'  => $questionBody,
                                      'questionType'  => $questionType];
        }

        $response = new Response();

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setContent(json_encode($assessmentQuestions));

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
