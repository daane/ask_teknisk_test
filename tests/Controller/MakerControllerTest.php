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
        // I am not quite sure how to write tests that interacts with the DB,
        // but I can look more into it if it's important
    }

    public function testListOfMakersIsOk(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertResponseIsSuccessful();

        $linkToMakers = $crawler->filter('.makers')->first()->link();

        $crawler = $client->click($linkToMakers);
        $this->assertResponseIsSuccessful();

    }
}
