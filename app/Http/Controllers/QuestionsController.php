<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * GET
     * http://localhost:8000/api/questions
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Question::get(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * POST
     * http://localhost:8000/api/questions
     * Pass the data to this method as a form data or as json text.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json(Question::create(request()->all()), 201);
    }

    /**
     * Display the specified resource.
     *
     * GET
     * http://localhost:8000/api/questions/1
     *
     * @param  \App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return response()->json($question, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * PUT/PATCH
     * http://localhost:8000/api/questions/1
     *
     * Pass the id with the URL
     * And pass the data to change in a form data or as json text.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        return response()->json($question->update(request()->all()), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * http://localhost:8000/api/questions/1
     *
     * DELETE
     * If question is found at the database; 204 status code
     * will be returned with the response. If question is
     * not found at the database, 404 status code
     * will be returned with the response.
     *
     * @param Question $question
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Question $question)
    {
        return response()->json($question->delete(), 204);
    }
}
