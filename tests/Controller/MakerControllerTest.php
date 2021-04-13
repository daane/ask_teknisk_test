<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MakerControllerTest extends WebTestCase
{


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
