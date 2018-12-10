<?php

namespace App\Http\Controllers;

use App\Poll;
use Illuminate\Http\Request;

class PollsController extends Controller
{
    // http://localhost:8000/api/polls
    public function index()
    {
        return response()->json(Poll::get(), 200);
    }

    // http://localhost:8000/api/polls/1
    public function show($id)
    {
        return response()->json(Poll::find($id), 200);
    }

    /**
     * http://localhost:8000/api/polls
     *
     * Pass the data to this method as a form data or as json text.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        $poll = Poll::create(request()->all());
        return response()->json($poll, 201);
    }

}
