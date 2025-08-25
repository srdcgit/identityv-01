<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\GoogleClientService;
use Illuminate\Http\Request;

class GoogleAuthController extends Controller
{
    public function redirect(GoogleClientService $googleClientService)
    {
        $client = $googleClientService->getClient();
        $authUrl = $client->createAuthUrl();

        return redirect($authUrl);
    }

    public function callback(Request $request, GoogleClientService $googleClientService)
    {
        $client = $googleClientService->getClient();
        $client->authenticate($request->input('code'));

        session(['google_access_token' => $client->getAccessToken()]);

        return redirect('/'); // Redirect to your desired page.
    }
}
