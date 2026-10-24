<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Chapter1\SetupController;
use App\Http\Controllers\Api\Chapter2\AgentPromptingController;
use App\Http\Controllers\Api\Chapter2\ConversationalAgentController;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('chapter1')->group(function () {
    Route::get('/health-check', [SetupController::class, 'healthCheck']);
    Route::get('/verify-ai-sdk', [SetupController::class, 'verifyAiSdk']);
    Route::post('/generate-token', [SetupController::class, 'generateToken']);
});

Route::prefix('chapter1')->middleware('auth:sanctum')->group(function(){
    Route::get('/me',[SetupController::class,'me']);
});

// Chapter 2

Route::prefix('/chapter2')->middleware('auth:sanctum')->group(function(){
    Route::get('/helloworld',[AgentPromptingController::class,'helloworld']);
    Route::post('/prompt',[AgentPromptingController::class,'promptWtihInput']);
    Route::post('/conversation/start',[ConversationalAgentController::class,'startConversation']);
    Route::post('/conversation/continue',[ConversationalAgentController::class,'continueConversation']);
});