<?php

namespace App\Controller;

use App\Form\MarsTimeType;
use App\Utils\MarsTimeCalculatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MarsTimeController extends AbstractController
{

    /**
     * @Route("/", name="mars-time")
     */
    public function index(Request $request, MarsTimeCalculatorInterface $marsTimeCalculator)
    {
        $msd = null;
        $mtc = null;
        $form = $this->createForm(MarsTimeType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if (!empty($form->getData()) && $form->getData()['earthDate']) {
                $earthDate = $form->getData()['earthDate'];
                list($msd, $mtc) = $marsTimeCalculator->getTimes($earthDate);
            }
        }

        return $this->render('mars_time.html.twig', [
                    'form' => $form->createView(),
                    'msd' => $msd,
                    'mtc' => $mtc
        ]);
    }

}
