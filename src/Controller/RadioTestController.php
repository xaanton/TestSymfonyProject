<?php

namespace App\Controller;

use App\Entity\RadioTest;
use App\Form\RadioTestType;
use App\Repository\RadioTestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/radio/test")
 */
class RadioTestController extends AbstractController
{
    /**
     * @Route("/", name="radio_test_index", methods={"GET"})
     */
    public function index(RadioTestRepository $radioTestRepository): Response
    {
        return $this->render('radio_test/index.html.twig', [
            'radio_tests' => $radioTestRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="radio_test_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $radioTest = new RadioTest();
        $form = $this->createForm(RadioTestType::class, $radioTest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($radioTest);
            $entityManager->flush();

            return $this->redirectToRoute('radio_test_index');
        }

        return $this->render('radio_test/new.html.twig', [
            'radio_test' => $radioTest,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="radio_test_show", methods={"GET"})
     */
    public function show(RadioTest $radioTest): Response
    {
        return $this->render('radio_test/show.html.twig', [
            'radio_test' => $radioTest,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="radio_test_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RadioTest $radioTest): Response
    {
        $form = $this->createForm(RadioTestType::class, $radioTest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('radio_test_index');
        }

        return $this->render('radio_test/edit.html.twig', [
            'radio_test' => $radioTest,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="radio_test_delete", methods={"POST"})
     */
    public function delete(Request $request, RadioTest $radioTest): Response
    {
        if ($this->isCsrfTokenValid('delete'.$radioTest->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($radioTest);
            $entityManager->flush();
        }

        return $this->redirectToRoute('radio_test_index');
    }
}
