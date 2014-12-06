<?php

use Facebook\FacebookRequest;
use Facebook\FacebookSession;
use Facebook\GraphSessionInfo;

class GraphSessionInfoTest extends PHPUnit_Framework_TestCase
{

    public function testSessionInfo()
    {
        $params = array(
            'input_token' => FacebookTestHelper::$testSession->getToken()
        );
        $response = (new FacebookRequest(
            new FacebookSession(FacebookTestHelper::getAppToken()),
            'GET',
            '/debug_token',
            $params
        ))->execute()->getGraphObject(GraphSessionInfo::className());
        $this->assertTrue($response instanceof GraphSessionInfo);
        $this->assertNotNull($response->getAppId());
        $this->assertTrue($response->isValid());
    }

}
