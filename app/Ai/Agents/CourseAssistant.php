<?php

namespace App\Ai\Agents;

use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\Conversational;
use Laravel\Ai\Contracts\HasTools;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Messages\Message;
use Laravel\Ai\Promptable;
use Laravel\Ai\Providers\Tools\ProviderTool;
use Laravel\Ai\Concerns\RemembersConversations;
use Stringable;

class CourseAssistant implements Agent, Conversational
{
    use Promptable,RemembersConversations;

    /**
     * Get the instructions that the agent should follow.
     */
    public function instructions(): Stringable|string
    {
        return 'You are a senior laravel developer and helpful person teaching assistant for a Laravel AI SDK course' . 'you remember everthing discussed in the current conversation'.'when the user references something sail earlier, acknowledge it and build upon it'.'keep responses concise - 2 to 3 sentences maximum';
    }




}
