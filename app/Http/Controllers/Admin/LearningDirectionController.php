<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LearningDirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $learning_directions = \App\Models\TeachersCategory::all();
        
        return view('dashboard.learning-directions', compact('learning_directions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.learning-directions-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:4|max:255',
        ]);

        $slug = Str::slug($validated['title']);

        // Проверка на уникальный slug
        $slug = (new \App\Services\Slug(Teachers_category::query(), $slug))->check();

        Teachers_category::create([
            'title' => $validated["title"],
            'slug' => $slug
        ]);

        return redirect('/dashboard/learning-directions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $learning_direction = Teachers_category::findOrFail($id);

        return view('dashboard.learning-directions-show', compact('learning_direction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $learning_direction = Teachers_category::findOrFail($id);
        
        return view('dashboard.learning-directions-edit', compact('learning_direction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|min:4|max:255',
        ]);

        $slug = Str::slug($validated['title']);

        // Проверка на уникальный slug
        $slug = (new \App\Services\Slug(Teachers_category::query(), $slug))->check();

        Teachers_category::where('id', $id)
                            ->update([
                                'title' => $validated["title"],
                                'slug' => $slug
                            ]);

        return redirect('/dashboard/learning-directions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $learning_direction = Teachers_category::findOrFail($id);

        $learning_direction->delete();

        return redirect('/dashboard/learning-directions');
    }
}
