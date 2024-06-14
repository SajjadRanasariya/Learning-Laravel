<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI;

class AIController extends Controller
{
    public function generateAiResponse(Request $request){
        // $title = $request->title;
        $client = OpenAI::client(env('OPENAI_API_KEY'));
        $result = $client->completions()->create([
            "model" => "gpt-3.5-turbo",
            "temperature" => 0.7,
            "top_p" => 1,
            "frequency_penalty" => 0,
            "presence_penalty" => 0,
            'max_tokens' => 600,
            'prompt' => sprintf('Write article about: %s', 'OpenAI'),
        ]);
    
        var_dump($result);
        // $content = trim($result['choices'][0]['text']);
    }
}
