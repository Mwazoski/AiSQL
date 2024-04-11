<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Http;

class OpenAIController extends Controller
{
    public function index(): JsonResponse
    {
        $search = "
        CREATE TABLE `articulos` (
            `ART_NUM` int(11) NOT NULL,
            `ART_NOM` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
            `ART_PESO` int(11) DEFAULT NULL,
            `ART_COL` varchar(7) COLLATE utf8_spanish_ci DEFAULT NULL,
            `ART_PC` float NOT NULL,
            `ART_PV` float NOT NULL,
            `ART_PRV` int(11) DEFAULT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

        Given this table. Help me with this exercise. DONT GIVE ME THE SOLUTION:
        
        Exercise -> List all the articles.

        FORBIDDEN TO GIVE ME THE EXACT SOLUTION.
        ";

        $data = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '. env('OPEN_API_KEY'),
        ])->post('https://api.openai.com/v1/chat/completions', [
                    'model' => 'gpt-3.5-turbo-0125',
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => $search
                        ]
                    ],
                    'temperature' => 0.5,
                    'max_tokens' => 100,
                    'top_p' => 1.0,
                    'frequency_penalty' => 0.52,
                    'presence_penalty' => 0.5,
                    'stop' => ["11."],
                ])->json();
        return response()->json($data["choices"][0]["message"]["content"], 200, array(), JSON_PRETTY_PRINT);
    }
}
