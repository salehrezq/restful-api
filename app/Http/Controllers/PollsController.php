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
        /**
         * The find() method either returns a single model or null {}.
         * At both cases 200 status code will be returned.
         */
//        return response()->json(Poll::find($id), 200);

        /**
         * findOrFail() and firstOrFail() methods either return a single model
         * or throw ModelNotFoundException, If you don't catch this exception yourself
         * Laravel will respond with a 404 page with 404 status code.
         */
//        return response()->json(Poll::findOrFail($id), 200);

        /**
         * Either found and return a model
         * or return null {} with status code 404 but no 404 page.
         */
        $poll = Poll::find($id);
        if (is_null($poll)) {
            // null returned {} but no 404 page.
            return response()->json(null, 404);
        }
        return response()->json(Poll::findOrFail($id), 200);
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

    /**
     * http://localhost:8000/api/polls/1
     *
     * Pass the id with the URL
     * And pass the data to change in a a form data or as json text.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Poll $poll)
    {
        $poll->update(request()->all());
        return response()->json($poll, 200);
    }

    /**
     * http://localhost:8000/api/polls/1
     *
     * If poll is found at the database; 204 status code
     * will be returned with the response. If poll is
     * not found at the database, 404 status code
     * will be returned with the response.
     *
     * @param Poll $poll
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception => No primary key defined on model
     */
    public function destroy(Poll $poll)
    {
        $poll->delete();
        // Poll::destroy($poll->id);
        return response()->json(null, 204);
    }

}
