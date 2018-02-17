<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomepageControllerTest extends WebTestCase
{
    public function testHomepageWhenNotLoggedIn()
    {
        $url = '/';

        $client = self::createClient();

        $client->request('GET', $url);
        $crawler = $client->getCrawler();

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Welcome!")')->count()
        );
    }
}
