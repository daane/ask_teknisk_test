<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MakerControllerTest extends WebTestCase
{

    public function testMakerPing()
    {
        $client = static::createClient();
        $client->request('GET', '/api/ping');
        $this->assertResponseIsSuccessful();
        $responseData = json_decode($client->getResponse()->getContent());
        $this->assertTrue(is_numeric($responseData));
        // Assumes that the number of "Maker" entities is known:
        $this->assertEquals(20,$responseData);
    }

    public function testListOfMakersIsOk(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertResponseIsSuccessful();

        $linkToMakers = $crawler->filter('.makers')->first()->link();

        $crawler = $client->click($linkToMakers);
        $this->assertResponseIsSuccessful();

        $crawler = $client->click($linkToMakers);

        // Confirms that list is not empty:
        $this->assertGreaterThan(0, $crawler->filter('li')->count());

        /*
            If the code is tested three days from now it will fail, so it might not be the most ideal solution.
            A better solution would probably have been to use an empty test database, insert a few entities where some
            are newer than three days, and verify that the number of list objects is correct.
            I didn't figure out how to do that, but I can look more into it at a later time.
        */
    }
}
