<?php

namespace App\Http\Controllers\Api\Chapter2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ai\Agents\HelloWorldAgent;
use Illuminate\Http\JsonResponse;
class AgentPromptingController extends Controller
{
    public function helloWorld():JsonResponse
    {
        $agent = HelloWorldAgent::make();

        $response = $agent->prompt('Hello! What are you and what can you help me with ?');

        return response()->json([
            'demo' => 'Basic Prompt - Hello World',
            'response' => (string) $response,
        ]);
    }

    public function promptWtihInput(Request $request):JsonResponse
    {
        $request->validate([
            'prompt' => 'required|string|max:1000'
        ]);

        // $agent = HelloWorldAgent::make();

        $prompt = $request->input('prompt');

        $response = (new HelloWorldAgent)->prompt($prompt);

        return response()->json([
            'demo' => 'Basic prompt - With Input',
            "user_message" => $prompt,
            'response' => (string) $response,
        ]);
    }
}
