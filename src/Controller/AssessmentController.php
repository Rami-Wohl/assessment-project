<?php

namespace App\Controller;

use App\Entity\Assessment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AssessmentController extends AbstractController
{
    /**
     * @Route("/{reactRouting}", name="home", defaults={"reactRouting": null})
     */
    public function index(): Response
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/api/assessment", name="assessment")
     * @param int $assessmentCode
     * @return JsonResponse
     */
    public function getAssessmentData(int $assessmentCode)
    {
        $assessmentRepository = $this->getDoctrine()->getRepository(Assessment::class);
        $assessment = $assessmentRepository->findOneBy(['code' => $assessmentCode]);
        $assessmentData = $assessment->getAssessmentQuestions();
        $response = new Response();

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setContent(json_encode($assessmentData));

        return $response;
    }


}