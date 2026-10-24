<?php

namespace App\Http\Controllers\Api\Chapter2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ai\Agents\SentimentAnalyzer;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Http\JsonResponse;

class StructureOutputController extends Controller
{
    public function analyzeSentiment(Request $request):JsonResponse
    {
        $request->validate([
            'text' => 'required|string|max:2000'
        ]);

        $reponse = (new SentimentAnalyzer)->prompt($request->input('text'));

        return response()->json([
            'demo' => 'Sentiment Analysis',
            'input_text' => $request->input('text'),
            'analysis' => [
                'sentiment' => $reponse['sentiment'],
                'score' => $reponse['score'],
                'topics' => $reponse['topics'],
                'summery' => $reponse['summery'],
            ]
        ]);
    }
}
