<?php

namespace App\Resource;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\AbstractResource;
use App\Entity\Note;
use \Slim\App;

/**
 * Class Resource
 * @package App
 */
class NoteResource extends AbstractResource
{
    /**
     *
     * @return string
     */
    public function index()
    {
        $notes = $this->getEntityManager()->getRepository('App\Entity\Note')->findAll();
        $notes = array_map(function($note) {
            return $this->convertToArray($note); },
            $notes);
        $data = json_encode($notes);

        return $data;
    }

    /**
     * @param $id
     *
     * @return string
     */
    public function show($id)
    {
        $note = $this->getEntityManager()->find('App\Entity\Note', $id);

        if(is_null($note)){ 
            $data = array('message' => 'Record not found');
            return json_encode($data);
          }
        
        $data = $this->convertToArray($note);

        return json_encode($data);
    }

    /**
     *
     *
     * @return string
     */
    public function create($request)
    {
        $note = new Note();
        $note->setTitle($request->getParsedBody()['title']);
        $note->setBody($request->getParsedBody()['body']);
        $note->setType($request->getParsedBody()['type']);
        $note->setUserId($request->getParsedBody()['user_id']);
        $this->getEntityManager()->persist($note);
        $this->getEntityManager()->flush();

        return json_encode($this->convertToArray($note));
    }


    /**
     * @param $id
     *
     * @return string
     */
    public function update($id, $request)
    {
        $note = $this->getEntityManager()->find('App\Entity\Note', $id);
        if(is_null($note)){ 
            $data = array('message' => 'Record not found');
            return json_encode($data);
        }

        if ($request->getParsedBody()['title'] ?? FALSE != FALSE) $note->setTitle($request->getParsedBody()['title']);
        if ($request->getParsedBody()['body'] ?? FALSE != FALSE) $note->setBody($request->getParsedBody()['body']);
        if ($request->getParsedBody()['type'] ?? FALSE != FALSE) $note->setType($request->getParsedBody()['type']);
        if ($request->getParsedBody()['user_id'] ?? FALSE != FALSE) $note->setUserId($request->getParsedBody()['user_id']);
        $this->getEntityManager()->persist($note);
        $this->getEntityManager()->flush();

        return json_encode($this->convertToArray($note));
    }


    public function destroy($id)
    {
        $note = $this->getEntityManager()->find('App\Entity\Note', $id);
        if(is_null($note)){ 
            $data = array('message' => 'Record not found');
            return json_encode($data);
        }

        $this->getEntityManager()->remove($note);
        $this->getEntityManager()->flush();

        return json_encode(null);
    }


    private function convertToArray(Note $note) {
        return array(
            'id' => $note->getId(),
            'title' => $note->getTitle(),
            'body' => $note->getBody(),
            'type' => $note->getType(),
            'user_id' => $note->getUserId()
        );
    }

}