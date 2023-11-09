<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class EiosController extends Controller
{
    public function eios()
    {
        return view('eios.eios');
    }

    public function bank_studencheskih_rabot()
    {   
        $works = DB::table('eios_bank_studencheskih_rabots')
                    ->orderBy('id', 'desc')
                    ->get();

        return view('eios.bank-studencheskih-rabot', compact('works'));
    }

    public function portfolio()
    {   
        $portfolios = DB::table('eios_portfolios')
                        ->orderBy('id', 'desc')
                        ->get();

        return view('eios.portfolio', compact('portfolios'));
    }

    public function informacionnye_ehlektronnye_obrazovatelnye_resursy()
    {   
        $resources = DB::table('eios_informacionnye_ehlektronnye_obrazovatelnye_resursies')
                    ->orderBy('id', 'desc')
                    ->get();

        return view('eios.informacionnye-ehlektronnye-obrazovatelnye-resursy', compact('resources'));
    }

    public function rezultaty_osvoeniya_obrazovatelnoj_programmy()
    {   
        $course1 = DB::table('eios_rezultaty_osvoeniya_obrazovatelnoj_programmies')
                    ->where('course', '1')
                    ->orderBy('id', 'desc')
                    ->get();

        $course2 = DB::table('eios_rezultaty_osvoeniya_obrazovatelnoj_programmies')
                    ->where('course', '2')
                    ->orderBy('id', 'desc')
                    ->get();

        $course3 = DB::table('eios_rezultaty_osvoeniya_obrazovatelnoj_programmies')
                    ->where('course', '3')
                    ->orderBy('id', 'desc')
                    ->get();

        $course4 = DB::table('eios_rezultaty_osvoeniya_obrazovatelnoj_programmies')
                    ->where('course', '4')
                    ->orderBy('id', 'desc')
                    ->get();

        return view('eios.rezultaty-osvoeniya-obrazovatelnoj-programmy', compact('course1', 'course2', 'course3', 'course4'));
    }

    public function metodicheskie_materialy_i_programmy()
    {   
        $category1 = DB::table('eios_metodicheskie_materialy_i_programmies')
                        ->where('category', 'Студентам')
                        ->orderBy('id', 'desc')
                        ->get();

        $category2 = DB::table('eios_metodicheskie_materialy_i_programmies')
                        ->where('category', 'Преподавателям')
                        ->orderBy('id', 'desc')
                        ->get();

        return view('eios.metodicheskie-materialy-i-programmy', compact('category1', 'category2'));
    }    
}