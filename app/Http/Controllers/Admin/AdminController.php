<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function home()
    {
        return view('dashboard.home');
    }

    public function afisha()
    {
        $afishas = DB::table('afishas')
                    ->orderBy('id', 'desc')
                    ->get();

        return view('dashboard.afisha', compact('afishas'));
    }

    public function afisha_add(Request $request)
    {
        $title = $request->input('title');
        $file = $request->file('inputfile');
        $date = $request->input('datepicker');
        $text = $request->input('text');
        $slug = Str::slug($title);
        $year = date('Y');
        $place = $request->input('place');
        $address = $request->input('address');
        $price = $request->input('price');
        $now = date('Y-m-d H:i:s');
        
        // проверка на уникальный slug
        $have_slug = DB::table('afishas')
                        ->where('slug', $slug)
                        ->get();

        if (count($have_slug) > 0) {
            $newslug = $slug . '-%';
            $slugs = DB::table('afishas')
                        ->where('slug', 'like', $newslug)
                        ->get();
            $count_slugs = count($slugs) + 1;
            $slug = $slug . '-' . $count_slugs;
        }

        $folder = 'afisha';

        $img = (new \App\Services\File())->rename_file($slug, $file, $folder);

        DB::insert('insert into afishas (title, image, text, slug, year, date, place, address, price, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$title, $img, $text, $slug, $year, $date, $place, $address, $price, $now, $now]);

        return redirect('/dashboard/afisha');
    }

    public function afisha_del($id)
    {
        DB::table('afishas')
            ->where('id', $id)
            ->delete();
        
        return redirect('/dashboard/afisha');
    }

    public function kalendar_studenta()
    {
        $calendars = DB::table('calendars')
                    ->orderBy('id', 'desc')
                    ->get();

        return view('dashboard.kalendar-studenta', compact('calendars'));
    }

    public function kalendar_studenta_add(Request $request)
    {
        $title = $request->input('title');
        $file = $request->file('inputfile');
        $date = $request->input('datepicker');
        $place = $request->input('place');
        $text = $request->input('text');
        $now = date('Y-m-d H:i:s');
        $slug = Str::slug($title);

        // проверка на уникальный slug
        $have_slug = DB::table('calendars')
                        ->where('slug', $slug)
                        ->get();

        if (count($have_slug) > 0) {
            $newslug = $slug . '-%';
            $slugs = DB::table('calendars')
                        ->where('slug', 'like', $newslug)
                        ->get();
            $count_slugs = count($slugs) + 1;
            $slug = $slug . '-' . $count_slugs;
        }

        $folder = 'kalendar-studenta';

        $img = (new \App\Services\File())->rename_file($slug, $file, $folder);

        $year = date('Y');

        DB::insert('insert into calendars (title, image, text, slug, year, date, place, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', [$title, $img, $text, $slug, $year, $date, $place, $now, $now]);

        return redirect('/dashboard/kalendar-studenta');
    }

    public function studentam_raspisanie()
    {
        $content = DB::table('studentam_raspisanies')
                        ->get();

        return view('dashboard.studentam-raspisanie', compact('content'));
    }

    public function studentam_raspisanie_update(Request $request)
    {   
        $id = $request->input('id');
        $course = $request->input('course');
        $shedule = $request->file('inputshedule');
        $attestation = $request->file('inputattestation');

        $raspisanie = DB::table('studentam_raspisanies')
                        ->where('course', $course)
                        ->first();

        $now = date('Y-m-d H:i:s');

        $folder = 'shedule';

        $sdl = '';

        if ($shedule) {
            $slug = 'shedule';
            $sdl = (new \App\Services\File())->rename_file($slug, $shedule, $folder);
        } else {
            $sdl = $raspisanie->shedule;
        }

        $att = '';

        if ($attestation) {
            $slug = 'attestation';
            $att = (new \App\Services\File())->rename_file($slug, $attestation, $folder);
        } else {
            $att = $raspisanie->attestation;
        }

        DB::table('studentam_raspisanies')
            ->where('course', $course)
            ->update([
                'shedule' => $sdl,
                'attestation' => $att,
                'updated_at' => $now
            ]);

        return redirect('/dashboard/studentam-raspisanie');
    }

    /**
     * Учеба Студентам форма аттестации
     */
    public function studentam_attestation_form(): View
    {
        // Направления обучения
        $learning_directions = \App\Models\LearningDirection::all();
        
        return view('dashboard.studentam-attestation-form', compact('learning_directions'));
    }

    /**
     * Учеба Студентам форма аттестации обновление
     * @param Illuminate\Http\Request
     * @return Illuminate\Http\RedirectResponse
     */
    public function studentam_attestation_form_update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'course' => 'numeric',
            'learning_direction' => 'numeric',
            'input-main-file' => 'required',
            'input-sig-file' => [
                                'nullable',
                                \Illuminate\Validation\Rules\File::types(['application/pgp-signature', 'text/plain'])
            ],
            'input-key-file' => [
                                'nullable',
                                \Illuminate\Validation\Rules\File::types(['application/pgp-keys', 'text/plain'])
            ],
        ]);

        // Модель форма аттестации
        $attestation_form = \App\Models\StudentamAttestationForm::where('course', $validated['course'])
                                                                ->where('learning_direction_id', $validated['learning_direction'])
                                                                ->first();

        // Если модель есть, то обновление. Иначе создание новой модели
        if ($attestation_form) {
            $attestation_form->update([
                'file' => (new \App\Services\FileUpdate($attestation_form, 'forma-attestacii', $validated))->file_update(),
                'sig_file' => (new \App\Services\FileUpdate($attestation_form, 'forma-attestacii', $validated))->sig_update(),
                'key_file' => (new \App\Services\FileUpdate($attestation_form, 'forma-attestacii', $validated))->key_update()
            ]);
        } else {
            
            $sig_file = array_key_exists('input-sig-file', $validated) ? (new \App\Services\FileAdd($validated['input-sig-file'], 'forma-attestacii'))->add() : NULL;
            $key_file = array_key_exists('input-key-file', $validated) ? (new \App\Services\FileAdd($validated['input-key-file'], 'forma-attestacii'))->add() : NULL;

            \App\Models\StudentamAttestationForm::create([
                'course' => $validated['course'],
                'learning_direction_id' => $validated['learning_direction'],
                'file' => (new \App\Services\FileAdd($validated['input-main-file'], 'forma-attestacii'))->add(),
                'sig_file' => $sig_file,
                'key_file' => $key_file
            ]);
        }
        
        return redirect()->back()->with('status', 'Обновлено');
    }

    public function studentam_gia()
    {   
        $documents = DB::table('studentam_gias')
                        ->orderBy('id', 'desc')
                        ->get();

        return view('dashboard.studentam-gia', compact('documents'));
    }

    public function studentam_gia_add(Request $request)
    {   
        $title = $request->input('title');
        $file = $request->file('inputFile');

        $slug = Str::slug($title);
        $now = date('Y-m-d H:i:s');

        $folder = 'studentam';

        $fl = (new \App\Services\File())->rename_file($slug, $file, $folder);

        DB::insert('insert into studentam_gias (title, file, created_at, updated_at) values (?, ?, ?, ?)', [$title, $fl, $now, $now]);

        return redirect('/dashboard/studentam-gia');
    }

    public function studentam_grafik_uchebnogo_processa()
    {
        $documents = DB::table('studentam_grafik_uchebnogo_processas')
                        ->orderBy('id', 'desc')
                        ->get();

        return view('dashboard.studentam-grafik-uchebnogo-processa', compact('documents'));
    }

    public function studentam_grafik_uchebnogo_processa_add(Request $request)
    {
        $title = $request->input('title');
        $file = $request->file('inputFile');

        $slug = Str::slug($title);
        $now = date('Y-m-d H:i:s');

        $folder = 'studentam';

        $fl = (new \App\Services\File())->rename_file($slug, $file, $folder);

        DB::insert('insert into studentam_grafik_uchebnogo_processas (title, file, created_at, updated_at) values (?, ?, ?, ?)', [$title, $fl, $now, $now]);

        return redirect('/dashboard/studentam-grafik-uchebnogo-processa');
    }

    public function studentam_zayavleniya()
    {
        $documents = DB::table('studentam_zayavleniyas')
                        ->orderBy('id', 'desc')
                        ->get();

        return view('dashboard.studentam-zayavleniya', compact('documents'));
    }

    public function studentam_zayavleniya_add(Request $request)
    {
        $title = $request->input('title');
        $file = $request->file('inputFile');

        $slug = Str::slug($title);
        $now = date('Y-m-d H:i:s');

        $folder = 'studentam';

        $fl = (new \App\Services\File())->rename_file($slug, $file, $folder);

        DB::insert('insert into studentam_zayavleniyas (title, file, created_at, updated_at) values (?, ?, ?, ?)', [$title, $fl, $now, $now]);

        return redirect('/dashboard/studentam-zayavleniya');
    }

    public function studentam_metodicheskie_rekomendacii()
    {
        $documents = DB::table('studentam_metodicheskie_rekomendaciis')
                        ->orderBy('id', 'desc')
                        ->get();

        return view('dashboard.studentam-metodicheskie-rekomendacii', compact('documents'));
    }

    public function studentam_metodicheskie_rekomendacii_add(Request $request)
    {
        $title = $request->input('title');
        $file = $request->file('inputFile');

        $slug = Str::slug($title);
        $now = date('Y-m-d H:i:s');

        $folder = 'studentam';

        $fl = (new \App\Services\File())->rename_file($slug, $file, $folder);

        DB::insert('insert into studentam_metodicheskie_rekomendaciis (title, file, created_at, updated_at) values (?, ?, ?, ?)', [$title, $fl, $now, $now]);

        return redirect('/dashboard/studentam-metodicheskie-rekomendacii');
    }

    public function studentam_polozheniya()
    {
        $documents = DB::table('studentam_polozheniyas')
                        ->orderBy('id', 'desc')
                        ->get();

        return view('dashboard.studentam-polozheniya', compact('documents'));
    }

    public function studentam_polozheniya_add(Request $request)
    {
        $title = $request->input('title');
        $file = $request->file('inputFile');

        $slug = Str::slug($title);
        $now = date('Y-m-d H:i:s');

        $folder = 'studentam';

        $fl = (new \App\Services\File())->rename_file($slug, $file, $folder);

        DB::insert('insert into studentam_polozheniyas (title, file, created_at, updated_at) values (?, ?, ?, ?)', [$title, $fl, $now, $now]);

        return redirect('/dashboard/studentam-polozheniya');
    }

    public function prepodavatelyam_metodicheskie_rekomendacii()
    {
        $documents = DB::table('prepodavatelyam_metodicheskie_rekomendaciis')
                        ->orderBy('id', 'desc')
                        ->get();

        return view('dashboard.prepodavatelyam-metodicheskie-rekomendacii', compact('documents'));
    }

    public function prepodavatelyam_metodicheskie_rekomendacii_add(Request $request)
    {   
        $title = $request->input('title');
        $file = $request->file('inputfile');

        $slug = Str::slug($title);
        $now = date('Y-m-d H:i:s');

        $folder = 'metodicheskie-rekomendacii';

        $filetype = AdminController::get_file_type($file);

        $fl = (new \App\Services\File())->rename_file($slug, $file, $folder);

        DB::insert('insert into prepodavatelyam_metodicheskie_rekomendaciis (title, file, filetype, created_at, updated_at) values (?, ?, ?, ?, ?)', [$title, $fl, $filetype, $now, $now]);

        return redirect('/dashboard/prepodavatelyam-metodicheskie-rekomendacii');
    }

    public function prepodavatelyam_metodicheskie_rekomendacii_del($id)
    {
        DB::table('prepodavatelyam_metodicheskie_rekomendaciis')
            ->where('id', $id)
            ->delete();
        
        return redirect('/dashboard/prepodavatelyam-metodicheskie-rekomendacii');
    }

    public function prepodavatelyam_spiski_studentov()
    {
        $content = DB::table('prepodavatelyam_spiski_studentovs')
                    ->get();

        return view('dashboard.prepodavatelyam-spiski-studentov', compact('content'));
    }

    public function prepodavatelyam_spiski_studentov_update(Request $request)
    {   
        $course = $request->input('course');
        $text = $request->input('text');

        DB::table('prepodavatelyam_spiski_studentovs')
            ->where('course', $course)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/prepodavatelyam-spiski-studentov');
    }

    public function kalendar_studenta_del($id)
    {
        DB::table('сalendars')
            ->where('id', $id)
            ->delete();
        
        return redirect('/dashboard/kalendar-studenta');
    }

    public function centr_sodejstviya_trudoustrojstvu()
    {   
        $text = DB::table('pages')
                ->where('id', 3)
                ->value('text');

        return view('dashboard.centr-sodejstviya-trudoustrojstvu', compact('text'));
    }

    public function centr_sodejstviya_trudoustrojstvu_update(Request $request) {

        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 3)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/centr-sodejstviya-trudoustrojstvu');
    }

    /**
     * Сведения
     * Категории
     */
    public function svedeniya_category($category_id): mixed
    {
        $svedeniya_category = \App\Models\SvedeniyaCategory::where('id', $category_id)
                                                            ->with(['subcategories' => function ($q) {
                                                                $q->orderBy('sort', 'asc');
                                                            }])
                                                            ->first();

        if ($svedeniya_category) {

            return view('dashboard.svedeniya-category', compact('svedeniya_category'));

        } else {
            return abort(404);
        }     
    }

    public function svedeniya_osnovnye_svedeniya()
    {
        $text = DB::table('pages')
                ->where('id', 17)
                ->value('text');

        return view('dashboard.svedeniya-osnovnye-svedeniya', compact('text'));
    }

    public function svedeniya_osnovnye_svedeniya_update(Request $request)
    {
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 17)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/osnovnye-svedeniya');
    }

    public function svedeniya_struktura_i_organy_upravleniya_obrazovatelnoi_organizaciei()
    {
        $text = DB::table('pages')
                ->where('id', 18)
                ->value('text');

        return view('dashboard.svedeniya-struktura-i-organy-upravleniya-obrazovatelnoi-organizaciei', compact('text'));
    }

    public function svedeniya_struktura_i_organy_upravleniya_obrazovatelnoi_organizaciei_update(Request $request)
    {
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 18)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/struktura-i-organy-upravleniya-obrazovatelnoi-organizaciei');
    }

    public function svedeniya_obrazovanie()
    {
        $text = DB::table('pages')
                ->where('id', 20)
                ->value('text');

        return view('dashboard.svedeniya-obrazovanie', compact('text'));
    }

    public function svedeniya_obrazovanie_update(Request $request)
    {
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 20)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie');
    }

    public function svedeniya_obrazovanie_informaciya()
    {
        $text = DB::table('pages')
                ->where('id', 32)
                ->value('text');

        return view('dashboard.svedeniya-obrazovanie-informaciya', compact('text'));
    }

    public function svedeniya_obrazovanie_informaciya_update(Request $request)
    {
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 32)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie-informaciya');
    }

    public function svedeniya_obrazovanie_annotacii_k_programmam_ppssz()
    {
        $text = DB::table('pages')
                ->where('id', 33)
                ->value('text');

        return view('dashboard.svedeniya-obrazovanie-annotacii-k-programmam-ppssz', compact('text'));
    }

    public function svedeniya_obrazovanie_annotacii_k_programmam_ppssz_update(Request $request)
    {
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 33)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie-annotacii-k-programmam-ppssz');
    }

    public function svedeniya_obrazovanie_uchebnye_plany()
    {
        $text = DB::table('pages')
                ->where('id', 34)
                ->value('text');

        return view('dashboard.svedeniya-obrazovanie-uchebnye-plany', compact('text'));
    }

    public function svedeniya_obrazovanie_uchebnye_plany_update(Request $request)
    {
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 34)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie-uchebnye-plany');
    }

    public function svedeniya_obrazovanie_kalendarnye_uchebnye_grafiki()
    {
        $text = DB::table('pages')
                ->where('id', 35)
                ->value('text');

        return view('dashboard.svedeniya-obrazovanie-kalendarnye-uchebnye-grafiki', compact('text'));
    }

    public function svedeniya_obrazovanie_kalendarnye_uchebnye_grafiki_update(Request $request)
    {
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 35)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/kalendarnye-uchebnye-grafiki');
    }

    public function svedeniya_obrazovanie_formy_promezhutochnoj_attestacii()
    {
        $text = DB::table('pages')
                ->where('id', 36)
                ->value('text');

        return view('dashboard.svedeniya-obrazovanie-formy-promezhutochnoj-attestacii', compact('text'));
    }

    public function svedeniya_obrazovanie_formy_promezhutochnoj_attestacii_update(Request $request)
    {
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 36)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/formy-promezhutochnoj-attestacii');
    }

    public function svedeniya_obrazovanie_programmy_podgotovki_specialistov_srednego_zvena()
    {
        $text = DB::table('pages')
                ->where('id', 37)
                ->value('text');

        return view('dashboard.svedeniya-obrazovanie-programmy-podgotovki-specialistov-srednego-zvena', compact('text'));
    }

    public function svedeniya_obrazovanie_programmy_podgotovki_specialistov_srednego_zvena_update(Request $request)
    {
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 37)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/programmy-podgotovki-specialistov-srednego-zvena');
    }

    public function svedeniya_obrazovanie_rabochie_programmy_i_fond_ocenochnyh_sredstv()
    {
        $text = DB::table('pages')
                ->where('id', 38)
                ->value('text');

        return view('dashboard.svedeniya-obrazovanie-rabochie-programmy-i-fond-ocenochnyh-sredstv', compact('text'));
    }

    public function svedeniya_obrazovanie_rabochie_programmy_i_fond_ocenochnyh_sredstv_update(Request $request)
    {
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 38)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie-rabochie-programmy-i-fond-ocenochnyh-sredstv');
    }

    public function svedeniya_obrazovatelnye_standarty()
    {
        $text = DB::table('pages')
                ->where('id', 21)
                ->value('text');

        return view('dashboard.svedeniya-obrazovatelnye-standarty', compact('text'));
    }

    public function svedeniya_obrazovatelnye_standarty_update(Request $request)
    {
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 21)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/obrazovatelnye-standarty-i-trebovaniya');
    }

    public function svedeniya_materialno_texniceskoe_obespecenie_i_osnashhennost_obrazovatelnogo_processa()
    {
        $text = DB::table('pages')
                ->where('id', 22)
                ->value('text');

        return view('dashboard.svedeniya-materialno-texniceskoe-obespecenie-i-osnashhennost-obrazovatelnogo-processa', compact('text'));
    }

    public function svedeniya_materialno_texniceskoe_obespecenie_i_osnashhennost_obrazovatelnogo_processa_update(Request $request)
    {
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 22)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/materialno-texniceskoe-obespecenie-i-osnashhennost-obrazovatelnogo-processa');
    }

    public function svedeniya_stipendii_i_inye_vidy_materialnoi_podderzki()
    {
        $text = DB::table('pages')
                ->where('id', 23)
                ->value('text');

        return view('dashboard.svedeniya-stipendii-i-inye-vidy-materialnoi-podderzki', compact('text'));
    }

    public function svedeniya_stipendii_i_inye_vidy_materialnoi_podderzki_update(Request $request)
    {
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 23)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/stipendii-i-inye-vidy-materialnoi-podderzki');
    }

    public function svedeniya_vakantnye_mesta_dlya_priema_perevoda()
    {
        $text = DB::table('pages')
                ->where('id', 26)
                ->value('text');

        return view('dashboard.svedeniya-vakantnye-mesta-dlya-priema-perevoda', compact('text'));
    }

    public function svedeniya_vakantnye_mesta_dlya_priema_perevoda_update(Request $request)
    {
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 26)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/vakantnye-mesta-dlya-priema-perevoda');
    }

    public function svedeniya_dostupnaya_sreda()
    {
        $text = DB::table('pages')
                ->where('id', 27)
                ->value('text');

        return view('dashboard.svedeniya-dostupnaya-sreda', compact('text'));
    }

    public function svedeniya_dostupnaya_sreda_update(Request $request)
    {
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 27)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/dostupnaya-sreda');
    }

    public function svedeniya_mezdunarodnoe_sotrudnicestvo()
    {
        $text = DB::table('pages')
                ->where('id', 28)
                ->value('text');

        return view('dashboard.svedeniya-mezdunarodnoe-sotrudnicestvo', compact('text'));
    }

    public function svedeniya_mezdunarodnoe_sotrudnicestvo_update(Request $request)
    {
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 28)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/mezdunarodnoe-sotrudnicestvo');
    }

    public function svedeniya_protivodejstvie_korrupcii()
    {
        $text = DB::table('pages')
                ->where('id', 45)
                ->value('text');

        return view('dashboard.svedeniya-protivodejstvie-korrupcii', compact('text'));
    }
    public function svedeniya_protivodejstvie_korrupcii_update(Request $request)
    {
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 45)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('dashboard/svedeniya-ob-obrazovatelnoj-organizacii/protivodejstvie-korrupcii');
    }

    public function svedeniya_razdel_dlya_invalidov_i_lic_s_ovz()
    {
        $text = DB::table('pages')
                ->where('id', 29)
                ->value('text');

        return view('dashboard.svedeniya-razdel-dlya-invalidov-i-lic-s-ovz', compact('text'));
    }

    public function svedeniya_razdel_dlya_invalidov_i_lic_s_ovz_update(Request $request)
    {
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 29)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/razdel-dlya-invalidov-i-lic-s-ovz');
    }

    public function svedeniya_metodicheskie_razrabotki_obespechivayushchie_uchebnyj_process()
    {
        $text = DB::table('pages')
                ->where('id', 30)
                ->value('text');

        return view('dashboard.svedeniya-metodicheskie-razrabotki-obespechivayushchie-uchebnyj-process', compact('text'));
    }

    public function svedeniya_metodicheskie_razrabotki_obespechivayushchie_uchebnyj_process_update(Request $request)
    {
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 30)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/metodicheskie-razrabotki-obespechivayushchie-uchebnyj-process');
    }

    public function abiturientu_podgotovitelnye_kursy()
    {   
        $text = DB::table('pages')
                ->where('id', 15)
                ->value('text');

        return view('dashboard.abiturientu-podgotovitelnye-kursy', compact('text'));
    }

    public function abiturientu_podgotovitelnye_kursy_update(Request $request) {

        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 15)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/abiturientu-podgotovitelnye-kursy');
    }

    public function abiturientu_rezultaty_vstupitelnyh_ispytanij()
    {
        $text = DB::table('pages')
                ->where('id', 31)
                ->value('text');

        return view('dashboard.abiturientu-rezultaty-vstupitelnyh-ispytanij', compact('text'));
    }

    public function abiturientu_rezultaty_vstupitelnyh_ispytanij_update(Request $request)
    {
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 31)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/abiturientu-rezultaty-vstupitelnyh-ispytanij');
    }

    public function konkursy()
    {
        $konkursy = DB::table('konkurs')
                    ->orderBy('id', 'desc')
                    ->get();

        return view('dashboard.konkursy', compact('konkursy'));
    }

    public function konkursy_add(Request $request)
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

        $img = (new \App\Services\File())->rename_file($slug, $image, $folder);

        DB::insert('insert into konkurs (title, image, text, slug, date_start, date_stop, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?, ?)', [$title, $img, $text, $slug, $date_start, $date_stop, $now, $now]);

        return redirect('/dashboard/konkursy');
    }

    public function konkursy_del($id)
    {
        DB::table('konkurs')
            ->where('id', $id)
            ->delete();
        
        return redirect('/dashboard/konkursy');
    }

    public function konkursy_dokumenty()
    {   
        $konkursy = DB::table('konkurs')
                        ->get();

        $documents = \App\Models\Konkurs_documents::orderBy('id', 'desc')->get();

        return view('dashboard.konkursy-dokumenty', compact('konkursy', 'documents'));
    }

    public function konkursy_dokumenty_add(Request $request)
    {
        $konkurs_id = $request->input('konkurs');
        $title = $request->input('title');
        $file = $request->file('inputfile');
        
        $slug = Str::slug($title);
        $now = date('Y-m-d H:i:s');

        $filetype = AdminController::get_file_type($file);

        $folder = 'konkursy';

        $fl = (new \App\Services\File())->rename_file($slug, $file, $folder);

        DB::insert('insert into konkurs_documents (konkurs_id, title, file, filetype, created_at, updated_at) values (?, ?, ?, ?, ?, ?)', [$konkurs_id, $title, $fl, $filetype, $now, $now]);

        return redirect('/dashboard/konkursy-dokumenty');
    }

    public function konkursy_dokumenty_del($id)
    {
        DB::table('konkurs_documents')
            ->where('id', $id)
            ->delete();
    
        return redirect('/dashboard/konkursy-dokumenty');
    }

    public function gazeta_pizzicato()
    {
        $newspapers = DB::table('newspapers')
                    ->orderBy('id', 'desc')
                    ->get();

        return view('dashboard.newspapers', compact('newspapers'));
    }

    public function gazeta_pizzicato_add(Request $request)
    {
        $image = $request->file('inputimage');
        $file_pdf = $request->file('inputpdf');
        $now = date('Y-m-d H:i:s');

        $number = DB::table('newspapers')
                    ->orderBy('number', 'desc')
                    ->first();

        if ($number) {
            $next_number = $number->number + 1;
        } else {
            $next_number = 1;
        }

        $slug = 'pizzicato' . '-' . $next_number;

        $folder = 'pizzicato';

        $img = (new \App\Services\File())->rename_file($slug, $image, $folder);

        $pdf = (new \App\Services\File())->rename_file($slug, $file_pdf, $folder);

        DB::insert('insert into newspapers (number, image, pdf, created_at, updated_at) values (?, ?, ?, ?, ?)', [$next_number, $img, $pdf, $now, $now]);

        return redirect('/dashboard/gazeta-pizzicato');
    }

    public function gazeta_pizzicato_del($id)
    {
        DB::table('newspapers')
            ->where('id', $id)
            ->delete();
        
        return redirect('/dashboard/gazeta-pizzicato');
    }

    public function izdaniya()
    {
        $izdaniya = DB::table('izdaniyas')
                    ->orderBy('id', 'desc')
                    ->get();

        return view('dashboard.izdaniya', compact('izdaniya'));
    }

    public function izdaniya_add(Request $request): RedirectResponse
    {
        $title = $request->input('title');
        $image = $request->file('inputfile');
        $text = $request->input('text');
        $author = $request->input('author');
        $category = $request->input('category');
        $publishing = $request->input('publishing');
        $year = $request->input('year');
        $price = $request->input('price');

        $slug = Str::slug($title);
        
        $excerpt = strip_tags($text);
        $excerpt = AdminController::trim_text($excerpt, 300);

        $now = date('Y-m-d H:i:s');

        $folder = 'izdaniya';

        $img = (new \App\Services\File())->rename_file($slug, $image, $folder);

        DB::insert('insert into izdaniyas (title, image, text, slug, author, category, excerpt, publishing, year, price, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$title, $img, $text, $slug, $author, $category, $excerpt, $publishing, $year, $price, $now, $now]);

        return redirect('/dashboard/studencheskaya-zhizn-izdaniya');
    }

    public function izdaniya_del($id): RedirectResponse
    {
        DB::table('izdaniyas')
            ->where('id', $id)
            ->delete();
    
        return redirect('/dashboard/studencheskaya-zhizn-izdaniya');
    }

    public function video()
    {
        $videos = DB::table('videos')
                    ->orderBy('id', 'desc')
                    ->get();

        return view('dashboard.video', compact('videos'));
    }

    public function video_add(Request $request)
    {
        $title = $request->input('title');
        $image = $request->file('inputfile');
        $date = $request->input('datepicker');
        $video = $request->input('video');

        $now = date('Y-m-d H:i:s');

        $slug = 'video';

        $folder = 'video-cover';

        $excerpt = NULL;

        $img = (new \App\Services\File())->rename_file($slug, $image, $folder);

        DB::insert('insert into videos (title, image, date, excerpt, video, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?)', [$title, $img, $date, $excerpt, $video, $now, $now]);

        return redirect('/dashboard/video');
    }

    public function video_del($id)
    {
        DB::table('videos')
            ->where('id', $id)
            ->delete();
    
        return redirect('/dashboard/video');
    }


    public function studencheskaya_zhizn_kollektivy()
    {
        $text = DB::table('pages')
                    ->where('id', 39)
                    ->value('text');
        
        return view('dashboard.studencheskaya-zhizn-kollektivy', compact('text'));
    }

    public function studencheskaya_zhizn_kollektivy_update(Request $request)
    {   
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 39)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/studencheskaya-zhizn-kollektivy');
    }

    public function studencheskaya_zhizn_rossijskoe_dvizhenie_detej_i_molodezhi()
    {
        $text = DB::table('pages')
                    ->where('id', 40)
                    ->value('text');
        
        return view('dashboard.studencheskaya-zhizn-rossijskoe-dvizhenie-detej-i-molodezhi', compact('text'));
    }

    public function studencheskaya_zhizn_rossijskoe_dvizhenie_detej_i_molodezhi_update(Request $request)
    {
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 40)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/studencheskaya-zhizn-rossijskoe-dvizhenie-detej-i-molodezhi');
    }

    public function studencheskaya_zhizn_sportivnyj_klub_temp()
    {
        $text = DB::table('pages')
                    ->where('id', 41)
                    ->value('text');
        
        return view('dashboard.studencheskaya-zhizn-sportivnyj-klub-temp', compact('text'));
    }

    public function studencheskaya_zhizn_sportivnyj_klub_temp_update(Request $request)
    {
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 41)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/studencheskaya-zhizn-sportivnyj-klub-temp');
    }

    public function studencheskaya_zhizn_vospitatelnaya_rabota()
    {
        $text = DB::table('pages')
                    ->where('id', 42)
                    ->value('text');
        
        return view('dashboard.studencheskaya-zhizn-vospitatelnaya-rabota', compact('text'));
    }

    public function studencheskaya_zhizn_vospitatelnaya_rabota_update(Request $request)
    {
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 42)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/studencheskaya-zhizn-vospitatelnaya-rabota');
    }

    public function studencheskaya_zhizn_volontery()
    {
        $text = DB::table('pages')
                    ->where('id', 43)
                    ->value('text');
        
        return view('dashboard.studencheskaya-zhizn-volontery', compact('text'));
    }

    public function studencheskaya_zhizn_volontery_update(Request $request)
    {
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 43)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/studencheskaya-zhizn-volontery');
    }

    public function studencheskaya_zhizn_media_centr_da_capo()
    {
        $text = DB::table('pages')
                    ->where('id', 44)
                    ->value('text');
        
        return view('dashboard.studencheskaya-zhizn-media-centr-da-capo', compact('text'));
    }

    public function studencheskaya_zhizn_media_centr_da_capo_update(Request $request)
    {
        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 44)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/studencheskaya-zhizn-media-centr-da-capo');
    }

    /**
     * ДШИ
     * Категории
     */
    public function dshi_category($category_id): mixed
    {
        $dshi_category = \App\Models\DshiCategory::where('id', $category_id)
                                                    ->with(['subcategories' => function ($q) {
                                                        $q->orderBy('sort', 'asc');
                                                    }])
                                                    ->first();

        if ($dshi_category) {

            return view('dashboard.dshi-category', compact('dshi_category'));

        } else {
            return abort(404);
        }     
    }

    public function dshi_rukovodstvo_i_pedsostav()
    {   
        $text = DB::table('pages')
                    ->where('id', 5)
                    ->value('text');

        return view('dashboard.dshi-rukovodstvo-i-pedsostav', compact('text'));
    }

    public function dshi_rukovodstvo_i_pedsostav_update(Request $request) {

        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 5)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/dshi-rukovodstvo-i-pedsostav');
    }

    public function dshi_postupayushchim()
    {   
        $text = DB::table('pages')
                ->where('id', 6)
                ->value('text');

        return view('dashboard.dshi-postupayushchim', compact('text'));
    }

    public function dshi_postupayushchim_update(Request $request) {

        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 6)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/dshi-postupayushchim');
    }

    public function dshi_platnye_obrazovatelnye_uslugi()
    {   
        $text = DB::table('pages')
                ->where('id', 7)
                ->value('text');

        return view('dashboard.dshi-platnye-obrazovatelnye-uslugi', compact('text'));
    }

    public function dshi_platnye_obrazovatelnye_uslugi_update(Request $request) {

        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 7)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/dshi-platnye-obrazovatelnye-uslugi');
    }

    /*
    public function dshi_obrazovanie()
    {   
        $text = DB::table('pages')
                ->where('id', 8)
                ->value('text');

        return view('dashboard.dshi-obrazovanie', compact('text'));
    }

    public function dshi_obrazovanie_update(Request $request) {

        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 8)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/dshi-obrazovanie');
    }
    */

    public function dshi_dokumenty()
    {   
        $text = DB::table('pages')
                ->where('id', 9)
                ->value('text');

        return view('dashboard.dshi-dokumenty', compact('text'));
    }

    public function dshi_dokumenty_update(Request $request) {

        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 9)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/dshi-dokumenty');
    }

    public function dshi_kontakty()
    {   
        $text = DB::table('pages')
                ->where('id', 10)
                ->value('text');

        return view('dashboard.dshi-kontakty', compact('text'));
    }

    public function dshi_kontakty_update(Request $request) {

        $text = $request->input('text');

        DB::table('pages')
            ->where('id', 10)
            ->update([
                'text' => $text,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/dshi-kontakty');
    }

    public function prepodavateli()
    {   
        $teachers = DB::table('teachers')
                    ->orderBy('id', 'desc')
                    ->get();

        $categories = DB::table('teachers_categories')
                    ->get();

        return view('dashboard.prepodavateli', compact('teachers', 'categories'));
    }

    public function prepodavateli_add(Request $request)
    {   
        $title = $request->input('title');
        $image = $request->file('inputfile');
        $text = $request->input('text');
        $category_id = $request->input('category');
        $post = $request->input('post');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $sort = $request->input('sort');
        
        $slug = Str::slug($title);

        $now = date('Y-m-d H:i:s');        

        $folder = 'teachers';

        // проверка на уникальный slug
        $have_slug = DB::table('teachers')
                        ->where('slug', $slug)
                        ->get();

        if (count($have_slug) > 0) {
            $newslug = $slug . '-%';
            $slugs = DB::table('teachers')
                        ->where('slug', 'like', $newslug)
                        ->get();
            $count_slugs = count($slugs) + 1;
            $slug = $slug . '-' . $count_slugs;
        }

        $img = (new \App\Services\File())->rename_file($slug, $image, $folder);

        DB::insert('insert into teachers (title, image, post, phone, email, text, slug, category_id, sort, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$title, $img, $post, $phone, $email, $text, $slug, $category_id, $sort, $now, $now]);

        return redirect('/dashboard/prepodavateli');
    }

    public function prepodavateli_edit($id)
    {
        $teacher = DB::table('teachers')
                        ->where('id', $id)
                        ->first();

        $categories = DB::table('teachers_categories')
                        ->get();

        if ($teacher) {

            $teachers = DB::table('teachers')
                            ->orderBy('id', 'desc')
                            ->get();

            $category = DB::table('teachers_categories')
                            ->where('id', $teacher->category_id)
                            ->first();

            if ($category) {
                $teacher->category_title = $category->title;
            } else {
                $teacher->category_title = '';
            }

            return view('dashboard.prepodavateli', compact('teachers', 'teacher', 'categories'));
        } else {
            return abort(404);
        }
    }

    public function prepodavateli_update(Request $request)
    {   
        $id = $request->input('id');

        $title = $request->input('title');
        $image = $request->file('inputfile');
        $text = $request->input('text');
        $category_id = $request->input('category');
        $post = $request->input('post');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $sort = $request->input('sort');

        $slug = Str::slug($title);

        $folder = 'teachers';

        $teacher = DB::table('teachers')
                        ->where('id', $id)
                        ->first();

        if ($image) {
            $img = (new \App\Services\File())->rename_file($slug, $image, $folder);
        } else {
            $img = $teacher->image;
        }

        DB::table('teachers')
            ->where('id', $id)
            ->update([
                'title' => $title,
                'image' => $img,
                'post' => $post,
                'phone' => $phone,
                'email' => $email,
                'text' => $text,
                'slug' => $teacher->slug,
                'category_id' => $category_id,
                'sort' => $sort,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/dashboard/prepodavateli/edit/' . $id);
    }    

    public function prepodavateli_del($id)
    {
        DB::table('teachers')
            ->where('id', $id)
            ->delete();
    
        return redirect('/dashboard/prepodavateli');
    }

    public function eios_bank_studencheskih_rabot()
    {   
        $works = DB::table('eios_bank_studencheskih_rabots')
                    ->orderBy('id', 'desc')
                    ->get();

        foreach($works as $wrk) {
            $short_title = AdminController::trim_text($wrk->title, 80);
            $wrk->short_title = $short_title;
        }

        return view('dashboard.eios-bank-studencheskih-rabot', compact('works'));
    }

    public function eios_bank_studencheskih_rabot_add(Request $request)
    {   
        $title = $request->input('title');
        $text = $request->input('text');
        $course = $request->input('course');
        $pdf = $request->file('inputpdf');

        $now = date('Y-m-d H:i:s');

        $slug = Str::slug($title);

        // проверка на уникальный slug
        $have_slug = DB::table('eios_bank_studencheskih_rabots')
                        ->where('slug', $slug)
                        ->get();

        if (count($have_slug) > 0) {
            $newslug = $slug . '-%';
            $slugs = DB::table('eios_bank_studencheskih_rabots')
                        ->where('slug', 'like', $newslug)
                        ->get();
            $count_slugs = count($slugs) + 1;
            $slug = $slug . '-' . $count_slugs;
        }

        $folder = "bank-studencheskih-rabot";

        $filepdf = (new \App\Services\File())->rename_file($slug, $pdf, $folder);

        DB::insert('insert into eios_bank_studencheskih_rabots (title, text, slug, course, pdf, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?)', [$title, $text, $slug, $course, $filepdf, $now, $now]);

        return redirect('/dashboard/eios-bank-studencheskih-rabot');
    }

    public function eios_bank_studencheskih_rabot_del($id)
    {
        DB::table('eios_bank_studencheskih_rabots')
            ->where('id', $id)
            ->delete();

        return redirect('/dashboard/eios-bank-studencheskih-rabot');
    }

    public function eios_portfolio()
    {
        $portfolios = DB::table('eios_portfolios')
                    ->orderBy('id', 'desc')
                    ->get();

        foreach($portfolios as $prt) {
            $short_title = AdminController::trim_text($prt->title, 80);
            $prt->short_title = $short_title;
        }

        return view('dashboard.eios-portfolio', compact('portfolios'));
    }

    public function eios_portfolio_add(Request $request)
    {
        $title = $request->input('title');
        $text = $request->input('text');
        $course = $request->input('course');
        $pdf = $request->file('inputpdf');

        $now = date('Y-m-d H:i:s');

        $slug = Str::slug($title);

        // проверка на уникальный slug
        $have_slug = DB::table('eios_portfolios')
                        ->where('slug', $slug)
                        ->get();

        if (count($have_slug) > 0) {
            $newslug = $slug . '-%';
            $slugs = DB::table('eios_portfolios')
                        ->where('slug', 'like', $newslug)
                        ->get();
            $count_slugs = count($slugs) + 1;
            $slug = $slug . '-' . $count_slugs;
        }

        $folder = "eios";

        $fl = (new \App\Services\File())->rename_file($slug, $pdf, $folder);

        DB::insert('insert into eios_portfolios (title, text, slug, course, file, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?)', [$title, $text, $slug, $course, $fl, $now, $now]);

        return redirect('/dashboard/eios-portfolio');
    }

    public function eios_portfolio_del($id)
    {
        DB::table('eios_portfolios')
            ->where('id', $id)
            ->delete();

        return redirect('/dashboard/eios-portfolio');
    }

    public function eios_informacionnye_ehlektronnye_obrazovatelnye_resursy()
    {
        $resursies = DB::table('eios_informacionnye_ehlektronnye_obrazovatelnye_resursies')
                        ->orderBy('id', 'desc')
                        ->get();

        return view('dashboard.eios-informacionnye-ehlektronnye-obrazovatelnye-resursy', compact('resursies'));
    }

    public function eios_informacionnye_ehlektronnye_obrazovatelnye_resursy_add(Request $request)
    {
        $title = $request->input('title');
        $link = $request->input('link');

        $now = date('Y-m-d H:i:s');

        DB::insert('insert into eios_informacionnye_ehlektronnye_obrazovatelnye_resursies (title, link, created_at, updated_at) values (?, ?, ?, ?)', [$title, $link, $now, $now]);

        return redirect('/dashboard/eios-informacionnye-ehlektronnye-obrazovatelnye-resursy');
    }

    public function eios_rezultaty_osvoeniya_obrazovatelnoj_programmy()
    {   
        $documents = DB::table('eios_rezultaty_osvoeniya_obrazovatelnoj_programmies')
                        ->orderBy('id', 'desc')
                        ->get();

        foreach($documents as $doc) {
            $short_title = AdminController::trim_text($doc->title, 80);
            $doc->short_title = $short_title;
        }
        
        return view('dashboard.eios-rezultaty-osvoeniya-obrazovatelnoj-programmy', compact('documents'));
    }

    public function eios_rezultaty_osvoeniya_obrazovatelnoj_programmy_add(Request $request)
    {   
        $course = $request->input('course');
        $title = $request->input('title');
        $file = $request->file('inputfile');

        $slug = Str::slug($title);
        $now = date('Y-m-d H:i:s');

        $folder = 'eios';

        $fl = (new \App\Services\File())->rename_file($slug, $file, $folder);

        DB::insert('insert into eios_rezultaty_osvoeniya_obrazovatelnoj_programmies (course, title, file, created_at, updated_at) values (?, ?, ?, ?, ?)', [$course, $title, $fl, $now, $now]);

        return redirect('/dashboard/eios-rezultaty-osvoeniya-obrazovatelnoj-programmy');
    }

    public function eios_rezultaty_osvoeniya_obrazovatelnoj_programmy_del($id)
    {
        DB::table('eios_rezultaty_osvoeniya_obrazovatelnoj_programmies')
            ->where('id', $id)
            ->delete();
        
        return redirect('/dashboard/eios-rezultaty-osvoeniya-obrazovatelnoj-programmy');
    }
    
    public function eios_metodicheskie_materialy_i_programmy()
    {
        $materials = DB::table('eios_metodicheskie_materialy_i_programmies')
                    ->orderBy('id', 'desc')
                    ->get();

        foreach($materials as $mt) {
            $short_title = Str::limit($mt->title, 40, '...');
            $mt->short_title = $short_title;
        }

        return view('dashboard.eios-metodicheskie-materialy-i-programmy', compact('materials'));
    }

    public function eios_metodicheskie_materialy_i_programmy_add(Request $request)
    {   
        $title = $request->input('title');
        $file = $request->file('inputfile');
        $category = $request->input('category');

        $slug = Str::slug($title);
        $now = date('Y-m-d H:i:s');

        $folder = 'eios';

        $fl = (new \App\Services\File())->rename_file($slug, $file, $folder);

        $course = NULL;
        $code = NULL;
        $specialization = NULL;

        DB::insert('insert into eios_metodicheskie_materialy_i_programmies (course, title, file, category, code, specialization, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?, ?)', [$course, $title, $fl, $category, $code, $specialization, $now, $now]);

        return redirect('/dashboard/eios-metodicheskie-materialy-i-programmy');
    }

    public function eios_metodicheskie_materialy_i_programmy_del($id)
    {
        DB::table('eios_metodicheskie_materialy_i_programmies')
            ->where('id', $id)
            ->delete();
    
        return redirect('/dashboard/eios-metodicheskie-materialy-i-programmy');
    }

    public function anteroom_commission()
    {   
        $people = DB::table('podat_dokumenties')
                    ->orderBy('id', 'desc')
                    ->limit(20)
                    ->get();

        foreach($people as $ppl) {
            $fio = $ppl->surname . " " . $ppl->name . " " . $ppl->patronymic;
            $ppl->fio = $fio;

            $year = mb_substr($ppl->created_at, 0, 4);
            $month = mb_substr($ppl->created_at, 5, 2);
            $day = mb_substr($ppl->created_at, 8, 2);

            $ppl->date = $day . "." . $month . "." . $year;
        }

        return view('dashboard.anteroom-commission', compact('people'));
    }
    
    public function single_anteroom_commission($id)
    {
        $abit = DB::table('podat_dokumenties')
                    ->where('id', $id)
                    ->first();

        if ($abit) {

            $abit->fio = $abit->surname . " " . $abit->name . " " . $abit->patronymic;

            $year = mb_substr($abit->created_at, 0, 4);
            $month = mb_substr($abit->created_at, 5, 2);
            $day = mb_substr($abit->created_at, 8, 2);

            $abit->date = $day . "." . $month . "." . $year;

            return view('dashboard.single-anteroom-commission', compact('abit'));

        } else {
            return abort(404);
        }
    }

    public function abit_update(Request $request)
    {   
        $id = $request->input('id');

        if ($id) {
            $status = $request->input('status');

            DB::table('podat_dokumenties')
                ->where('id', $id)
                ->update([
                    'status' => $status,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

            return redirect('/dashboard/anteroom-commission');

        } else {
            return abort(404);
        }
    }

    public function information(): View
    {
        $information = \App\Models\Information::find(1);
        
        return view('dashboard.information', compact('information'));
    }

    public function information_update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'text' => 'required',
        ]);

        $information = \App\Models\Information::find(1);

        $information->update([
            'text' => $validated['text']
        ]);
        
        return redirect()->back();
    }

    public function tiny_file_upload(Request $request)
    {
        $fileName = $request->file("file")->getClientOriginalName();
        $mimetype = $request->file("file")->getMimeType();
        $extension = $request->file("file")->getClientOriginalExtension();

        $filetype = "";
        switch ($mimetype) {
            case "image/jpeg":
                $filetype = ".jpg";
                break;
            case "image/png":
                $filetype = ".png";
                break;
            case "image/gif":
                $filetype = ".gif";
                break;
            case "image/webp":
                $filetype = ".webp";
                break;
            case "application/pdf":
                $filetype = ".pdf";
                break;
            case "application/msword":
                $filetype = ".doc";
                break;
            case "application/vnd.openxmlformats-officedocument.wordprocessingml.document":
                $filetype = ".docx";
                break;
            case "application/vnd.ms-excel":
                $filetype = ".xls";
                break;
            case "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet":
                $filetype = ".xlsx";
                break;
            case "application/octet-stream":
                if($extension == "xlsx") {
                    $filetype = ".xlsx";
                }
                break;
            default:
                $filetype = "other";
        }

        if ($filetype == "other") {
            return false;
        }

        $fileName = "file" . "-" . date("dmY") . "-" . mt_rand() . $filetype;

        $path = $request->file("file")->storeAs("/uploads/files", $fileName, "public");

        return response()->json(["location" => '/storage/' . $path]);
    }

    public function dashboard_404()
    {
        $requestUri = request()->getRequestUri();

        if (auth()->check() && auth()->user()->role == "admin") {
            if (strpos($requestUri, 'dashboard')) {
                return view('dashboard.404');
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
    }

    /*
    * Получение mime типа (расширения) файла
    * $text строка
    * Обязательный агрумент $file
    * Illuminate\Http\UploadedFile object
    */
    public static function get_file_type($file)
    {
        $mimetype = $file->getMimeType();
        $filetype = "";
        switch ($mimetype) {
            case "image/jpeg":
                $filetype = "jpg";
                break;
            case "image/png":
                $filetype = "png";
                break;
            case "image/gif":
                $filetype = "gif";
                break;
            case "image/webp":
                $filetype = "webp";
                break;
            case "application/pdf":
                $filetype = "pdf";
                break;
            case "application/msword":
                $filetype = "doc";
                break;
            case "application/vnd.openxmlformats-officedocument.wordprocessingml.document":
                $filetype = "doc";
                break;
            case "application/vnd.ms-excel":
                $filetype = "xls";
                break;
            case "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet":
                $filetype = "xls";
                break;
            case "application/octet-stream":
                if($file->getClientOriginalExtension() == "xlsx") {
                    $filetype = "xls";
                }
                break;
            default:
                $filetype = "none";
        }

        return $filetype;
    }

    /*
    * Обрезка текста
    * $text строка
    * $length число
    */
    public static function trim_text($text, $length)
    {
        if (strlen($text) > $length) {
            $text = strip_tags($text);

            $text = substr($text, 0, $length);

            $text = rtrim($text, "!,.-");

            $text = substr($text, 0, strrpos($text, ' ')) . "…";
        }

        return $text;
    }
}