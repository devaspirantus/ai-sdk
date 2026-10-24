<?php

namespace App\Ai\Agents;

use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\Conversational;
use Laravel\Ai\Contracts\HasTools;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Messages\Message;
use Laravel\Ai\Promptable;
use Laravel\Ai\Providers\Tools\ProviderTool;
use Stringable;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Contracts\HasStructuredOutput;
class SentimentAnalyzer implements Agent,HasStructuredOutput
{
    use Promptable;

    /**
     * Get the instructions that the agent should follow.
     */
    public function instructions(): Stringable|string
    {
        return 'You are a sentiment analysis engine.' . 'analyze the given text and return sstructured data.' . 'the sentiment must be exactly one of :postive,negative, or neutral.'.'the score must be between 1 (very negative) and 10 (very positive).'.'Extract 1 to 5 key topics mentioned in the text.'.'Provide a concise one-sentence summary of the overall sentiment.';
    }

    public function schema(JsonSchema $schema):array
    {
        return [
            'sentiment' => $schema->string()->enum(['postive','negative','neutral'])->description('The Overall sentiment of the text')->required(),
            'score' => $schema->integer()->min(1)->max(10)->description('Sentiment score from 1 (very negative) to 10 (very positive)')->required(),
            'topics' => $schema->array()->items($schema->string())->description('key topics or subjects mentioned in the text')->required(),
            'summery' => $schema->string()->description('a concise one-sentence summery of the sentiment')->required(),
        ];  
    }

}
