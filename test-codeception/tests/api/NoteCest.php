<?php 

class NoteCest
{
    // Get all notes list
    public function getUsers(ApiTester $I) {
        $I->sendGET('/api/note');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    // Get single note
    public function getUserById(ApiTester $I) {
        $id=3;
        $I->sendGET('/api/note/'.$id);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    // Create new note
    public function createNewNote(ApiTester $I) {
        $I->sendPOST('/api/note', [
            'title' => 'This is my first note',
            'body' => 'None',
            'type' => 'to do',
            'user_id' => 1
          ]);
        $I->seeResponseCodeIs(201);
        $I->seeResponseIsJson();
    }

    // Update selected note
    public function updateNote(ApiTester $I) {
        $id = 4;
        $I->sendPUT('/api/note/'.$id , [
            'title' => 'This is my first note',
            'body' => 'None',
            'type' => 'to do',
            'user_id' => 1
          ]);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    // Destroy selected note
    public function destroyUser(ApiTester $I) {
        $id = 5;
        $I->sendDELETE('/api/note/'.$id);
        $I->seeResponseCodeIs(204);
    }
}
