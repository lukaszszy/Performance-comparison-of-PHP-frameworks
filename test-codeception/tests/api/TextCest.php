<?php 

class NoteCest
{
    // Get text
    public function getText(ApiTester $I) {
        $I->sendGET('/api/text');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }
}
