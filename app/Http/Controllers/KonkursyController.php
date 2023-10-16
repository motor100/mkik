<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Konkurs;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\AdminController;

class KonkursyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konkursy = Konkurs::orderBy('id', 'desc')->get();
        
        return view('dashboard.konkursy', compact('konkursy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.konkursy-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $image = $request->file('inputimage');
        $date_start = $request->input('datepicker-start');
        $date_stop = $request->input('datepicker-stop');
        $text = $request->input('text');
        $now = date('Y-m-d H:i:s');

        $slug = Str::slug($title);

        // проверка на уникальный slug
        $have_slug = DB::table('konkurs')
                        ->where('slug', $slug)
                        ->get();

        if (count($have_slug) > 0) {
            $newslug = $slug . '-%';
            $slugs = DB::table('konkurs')
                        ->where('slug', 'like', $newslug)
                        ->get();
            $count_slugs = count($slugs) + 1;
            $slug = $slug . '-' . $count_slugs;
        }

        $folder = 'konkursy';

        $img = AdminController::rename_file($slug, $image, $folder);

        DB::insert('insert into konkurs (title, image, text, slug, date_start, date_stop, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?, ?)', [$title, $img, $text, $slug, $date_start, $date_stop, $now, $now]);

        return redirect('/dashboard/konkursy');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $konkurs = Konkurs::find($id);

        return view('dashboard.konkursy-edit', compact('konkurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $id = $request->input('id');
        $title = $request->input('title');
        $image = $request->file('inputimage');
        $date_start = $request->input('datepicker-start');
        $date_stop = $request->input('datepicker-stop');
        $text = $request->input('text');
        $now = date('Y-m-d H:i:s');

        $cr = Konkurs::find($id);

        $slug = Str::slug($title);

        if($slug != $cr->slug) {
            // проверка на уникальный slug
            $have_slug = DB::table('konkurs')
                            ->where('slug', $slug)
                            ->get();

            if (count($have_slug) > 0) {
                $newslug = $slug . '-%';
                $slugs = DB::table('konkurs')
                            ->where('slug', 'like', $newslug)
                            ->get();
                $count_slugs = count($slugs) + 1;
                $slug = $slug . '-' . $count_slugs;
            }
        }

        $folder = 'konkursy';

        if($image) {
            if (File::exists(public_path() . $cr->image)) {
                File::delete(public_path() . $cr->image);
            }
            $img = \App\Http\Controllers\Admin\AdminController::rename_file($slug, $image, $folder);
        } else {
            $img = $cr->image;
        }

        $cr->update([
            'title' => $title,
            'image' => $img,
            'text' => $text,
            'slug' => $slug,
            'date_start' => $date_start,
            'date_stop' => $date_stop,
            'updated_at' => $now
        ]);

        return redirect('/dashboard/konkursy');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $konkurs = Konkurs::find($id);

        if (File::exists(public_path() . $konkurs->image)) {
            File::delete(public_path() . $konkurs->image);
        }

        $konkurs->delete();

        return redirect('/dashboard/konkursy');
    }
}
