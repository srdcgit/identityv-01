<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Google\Client as GoogleClient;
use Google\Service\Calendar;


class GoogleCalenderController extends Controller
{
    public function redirectToGoogle()
    {
        return redirect()->away($this->googleClient->createAuthUrl());
    }

    public function handleGoogleCallback(Request $request)
    {
        $this->googleClient->fetchAccessTokenWithAuthCode($request->code);
        $token = $this->googleClient->getAccessToken();

        session(['google_token' => $token]);

        return redirect()->route('calendar.events');
    }

    public function listEvents()
    {
        $this->googleClient->setAccessToken(session('google_token'));

        $service = new Calendar($this->googleClient);
        $events = $service->events->listEvents('primary');

        return view('calendar.events', compact('events'));
    }

    public function createEvent(Request $request)
    {
        $this->googleClient->setAccessToken(session('google_token'));

        $service = new Calendar($this->googleClient);
        $event = new Calendar\Event([
            'summary' => $request->title,
            'start' => ['dateTime' => $request->start_time],
            'end' => ['dateTime' => $request->end_time],
        ]);

        $service->events->insert('primary', $event);

        return redirect()->route('calendar.events');
    }
}
