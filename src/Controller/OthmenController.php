<?php

namespace App\Controller;

use App\Entity\Othmen;
use App\Form\OthmenType;
use App\Repository\OthmenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/othmen")
 */
class OthmenController extends AbstractController
{
    /**
     * @Route("/", name="othmen_index", methods={"GET"})
     */
    public function index(OthmenRepository $othmenRepository): Response
    {
        return $this->render('othmen/index.html.twig', [
            'othmens' => $othmenRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="othmen_new", methods={"GET","POST"})
     */
    public function new(Request $request,FileUploader $fileUploader): Response
    {
        $othman = new Othmen();
        $form = $this->createForm(OthmenType::class, $othman);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file1 = $form['image']->getData();
            if ($file1) {
                $file_name = $fileUploader->upload($file1);
                $othman->setImage($file_name);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($othman);
            $entityManager->flush();

            return $this->redirectToRoute('othmen_index');
        }
  

        return $this->render('othmen/new.html.twig', [
            'othman' => $othman,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="othmen_show", methods={"GET"})
     */
    public function show(Othmen $othman): Response
    {
        return $this->render('othmen/show.html.twig', [
            'othman' => $othman,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="othmen_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Othmen $othman): Response
    {
        $form = $this->createForm(OthmenType::class, $othman);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('othmen_index');
        }

        return $this->render('othmen/edit.html.twig', [
            'othman' => $othman,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="othmen_delete", methods={"POST"})
     */
    public function delete(Request $request, Othmen $othman): Response
    {
        if ($this->isCsrfTokenValid('delete'.$othman->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($othman);
            $entityManager->flush();
        }

        return $this->redirectToRoute('othmen_index');
    }
}
