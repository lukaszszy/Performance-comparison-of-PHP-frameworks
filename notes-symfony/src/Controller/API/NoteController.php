<?php
namespace App\Controller\API;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use App\Entity\Note;
use App\Entity\User;

/**
 * Note controller.
 * @Route("/api")
 */
class NoteController extends FOSRestController
{
  /**
   * Lists all Notes.
   * @Rest\Get("/note")
   */
  public function index()
  {
    $repository = $this->getDoctrine()->getRepository(Note::class);
    $note = $repository->findAll();
    return $this->handleView($this->view($note, 200));
  }

  /**
   * List selected note.
   * @Rest\Get("/note/{id}")
   */
  public function show($id)
  {
    $repository = $this->getDoctrine()->getRepository(Note::class);
    $note = $repository->findOneBy(array('id' => $id));
    if(is_null($note)){ 
      return $this->handleView($this->view(["message " => "Record not found."], 404));
    }
    return $this->handleView($this->view($note, 200));
  }

  /**
   * Create Note.
   * @Rest\Post("/note")
   *
   * @return Response
   */
  public function create(Request $request)
  {
    $entityManager = $this->getDoctrine()->getManager();

    $note = new Note();
    $note->setTitle($request->get('title'));
    $note->setBody($request->get('body'));
    $note->setType($request->get('type'));
    $note->setUserId($request->get('user_id'));

    $entityManager->persist($note);
    $entityManager->flush();

    return $this->handleView($this->view($note, 201));
  }

  /**
   * Update note.
   * @Rest\Put("/note/{id}")
   */
  public function update($id, Request $request)
  {
    $entityManager = $this->getDoctrine()->getManager();
    $note = $entityManager->getRepository(Note::class)->find($id);

    if(is_null($note)){ 
      return $this->handleView($this->view(["message " => "Record not found."], 404));
    }

    if ($request->get('title') != NULL) $note->setTitle($request->get('title'));
    if ($request->get('body') != NULL) $note->setBody($request->get('body'));
    if ($request->get('type') != NULL) $note->setType($request->get('type'));
    if ($request->get('user_id') != NULL) $note->setUserId($request->get('user_id'));
    $entityManager->persist($note);
    $entityManager->flush();

    return $this->handleView($this->view($note, 200));
  }

  /**
   * Delete note.
   * @Rest\Delete("/note/{id}")
   */
  public function destroy($id)
  {
    $entityManager = $this->getDoctrine()->getManager();
    $note = $entityManager->getRepository(Note::class)->find($id);

    if(is_null($note)){ 
      return $this->handleView($this->view(["message " => "Record not found."], 404));
    }

    $entityManager->remove($note);
    $entityManager->flush();

    return $this->handleView($this->view(null, 204));
  }

}