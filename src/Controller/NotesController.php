<?php

namespace App\Controller;

use App\Entity\Notes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NotesController extends AbstractController
{
    /**
     * @Route("/notes", name="notes")
     */
    public function index(): Response
    {
        return $this->render('notes/index.html.twig', [
            'controller_name' => 'NotesController',
        ]);
    }
    /**
     * @Route("/admin/notes", name="notes")
     */
    public function listeNotes(): Response
    {
        $notes = $this->getDoctrine()->getRepository(Notes::class)->findAll();
        return $this->render('admin/listeNotes.html.twig', ['notes' => $notes]);
    }
}
