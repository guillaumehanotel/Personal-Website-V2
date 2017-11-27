<?php
/**
 * Created by PhpStorm.
 * User: guillaumeh
 * Date: 27/11/17
 * Time: 12:10
 */

namespace Tests\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BlogControllerTest extends WebTestCase {

    public function testIndex() {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
    }

}
