<?php

namespace App\Controller;

use App\Form\MarsTimeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MarsSynchController extends AbstractController
{
    /**
     * @Route("/", name="mars_sync")
     */
    public function index()
    {
        $form = $this->createForm(MarsTimeType::class);
        return $this->render( 'mars_synch.html.twig', [
           'form' => $form->createView()
        ]);
    }
}
