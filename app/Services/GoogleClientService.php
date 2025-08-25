<?php
namespace App\Services;

use Google\Client;
use Google\Service\Calendar;

class GoogleClientService
{
    public function getClient()
    {
        $client = new Client();
        $client->setAuthConfig(storage_path('app/google-credentials.json'));
        $client->addScope(Calendar::CALENDAR);
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');

        return $client;
    }
}
