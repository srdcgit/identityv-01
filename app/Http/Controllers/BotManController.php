<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    /**
     * Handle the incoming messages from the Botman chatbot.
     */
    public function handle()
    {
        DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

        $config = [];
        $botman = BotManFactory::create($config);

        // Define a sample conversation
        $botman->hears('hello', function (BotMan $bot) {
            $bot->reply('Hello! How can I help you today?');
        });

        $botman->hears('help', function (BotMan $bot) {
            $bot->reply("Sure, I'm here to help! You can ask me about our services or support options.");
        });

        $botman->hears('services', function (BotMan $bot) {
            $bot->reply("We offer a range of services including...");
        });

        $botman->fallback(function (BotMan $bot) {
            $bot->reply("I'm sorry, I don't understand that command.");
        });

        $botman->listen();
    }
    /**
     * Ask the user for their name when they say 'hi'.
     */
    public function askName($botman)
    {
        $botman->ask('Hello! What is your name?', function (Answer $answer, $conversation) {
            $name = $answer->getText();
            $this->say('Nice to meet you, ' . $name);
            $conversation->ask('Can you advise about your email address.', function (Answer $answer, $conversation) {
                $email = $answer->getText();
                $this->say('Email : ' . $email);
            });
        });
    }
}
