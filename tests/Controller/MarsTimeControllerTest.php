<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MarsTimeControllerTest extends WebTestCase
{
    /**
     * submit form without date, shouldn't show the result table
     */
    public function testIndexWithEmptyDate()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $form = $crawler->selectButton('mars_time[submit]')->form();
        $form['mars_time[earthDate]'] = '';
        $client->submit($form); 
        $this->assertNotContains('result-table', $client->getResponse()->getContent());
    }
    
    /**
     * submit form with invalid date, shouldn't show the result table
     */
    public function testIndexWithInvalidDate()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $form = $crawler->selectButton('mars_time[submit]')->form();
        $form['mars_time[earthDate]'] = 'invalidDate';
        $client->submit($form);
        $this->assertNotContains('result-table', $client->getResponse()->getContent());
    }
    
    /**
     * submit form with valid date, should show the result table
     */
    public function testIndexWithValidDate()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $form = $crawler->selectButton('mars_time[submit]')->form();
        $form['mars_time[earthDate]'] = '08-07-2020 16:06';
        $client->submit($form);
        $this->assertContains('result-table', $client->getResponse()->getContent());
    }

}
