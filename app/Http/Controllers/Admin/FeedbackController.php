<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $feedbacks = Feedback::orderBy('id', 'desc')
                                ->limit(50)
                                ->get();

        return view('dashboard.feedbacks', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $feedback = Feedback::findOrFail($id);

        return view('dashboard.feedbacks-show', compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
