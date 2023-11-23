<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MainController extends Controller
{
    public function home()
    {
        $news = DB::table('mainnews')
                    ->orderBy('id', 'desc')
                    ->limit(3)
                    ->get();

        $afisha = DB::table('afishas')
                    ->orderBy('id', 'desc')
                    ->limit(4)
                    ->get();

        foreach($afisha as $fsh) {
            $short_title = Str::limit($fsh->title, 43, '...');
            $fsh->short_title = $short_title;
        }

        $kalendar_studenta = DB::table('calendars')
                                ->orderBy('id', 'desc')
                                ->limit(4)
                                ->get();

        $information = \App\Models\Information::find(1);

        $home_page = true;

        return view('home', compact('home_page', 'news', 'afisha', 'kalendar_studenta', 'information'));
    }

    public function o_kolledzhe_istoriya(): View
    {
        return view('o-kolledzhe-istoriya');
    }

    public function o_kolledzhe_pedagogicheskij_sostav(): View
    {
        // Руководители
        $teachers = \App\Models\Teacher::where('category_id', '1')
                                        ->orderBy('sort', 'asc')
                                        ->get();

        // Документы
        $documents = \App\Models\PedagogicheskijSostavDokumenty::all();

        return view('o-kolledzhe-pedagogicheskij-sostav', compact('teachers', 'documents'));
    }

    public function o_kolledzhe_single_otdelenie($slug)
    {   
        $teachers_category = DB::table('teachers_categories')
                                ->where('slug', $slug)
                                ->first();
        
        if ($teachers_category) {

            $teachers = DB::table('teachers')
                            ->where('category_id', $teachers_category->id)
                            ->get();

            return view('o-kolledzhe-single-otdelenie', compact('teachers_category', 'teachers'));

        } else {
            return abort(404);
        }
    }

    public function o_kolledzhe_single_teacher($slug)
    {   
        $single_teacher = DB::table('teachers')
                            ->where('slug', $slug)
                            ->first();

        if ($single_teacher) {
            return view('o-kolledzhe-single-teacher', compact('single_teacher'));
        } else {
            return abort(404);
        }
    }

    public function o_kolledzhe_kontakty()
    {   
        return view('o-kolledzhe-kontakty');
    }

    public function studentam_raspisanie(): View
    {
        $sdl_att = DB::table('studentam_raspisanies')
                        ->get();

        $gia = DB::table('studentam_gias')
                    ->orderByDesc('id')
                    ->get();

        $gup = DB::table('studentam_grafik_uchebnogo_processas')
                    ->orderByDesc('id')
                    ->get();

        $zvl = DB::table('studentam_zayavleniyas')
                    ->orderByDesc('id')
                    ->get();

        $mrd = DB::table('studentam_metodicheskie_rekomendaciis')
                    ->orderByDesc('id')
                    ->get();

        $plz = DB::table('studentam_polozheniyas')
                    ->orderByDesc('id')
                    ->get();

        return view('studentam-raspisanie', compact('sdl_att', 'gia', 'gup', 'zvl', 'mrd', 'plz'));
    }

    /**
     * Страница Формы аттестации
     * @param string $id номер курса
     * @return mixed
     */
    public function studentam_attestation_form($id): mixed
    {
        if ($id >= 0 && $id < 5) {

            // Коллекция моделей с сортировкой по полю learning_direction_id
            $attestation_forms = \App\Models\StudentamAttestationForm::where('course', $id)
                                                                    ->orderBy('learning_direction_id', 'asc')
                                                                    ->get();

            return view('studentam-attestation-form', compact('attestation_forms', 'id'));
        } else {
            return abort(404);
        }
    }

    public function prepodavatelyam()
    {
        return view('prepodavatelyam');
    }

    /**
     * Учеба Преподавателям макеты
     */
    public function ucheba_prepodavatelyam_makety(): View
    {
        $documents = \App\Models\UchebaPrepodavatelyamMakety::orderBy('id', 'desc')->get();

        return view('ucheba-prepodavatelyam-makety', compact('documents'));
    }

    public function prepodavatelyam_metodicheskie_rekomendacii(): View
    {
        $documents = \App\Models\Prepodavatelyam_metodicheskie_rekomendacii::all();

        return view('prepodavatelyam-metodicheskie-rekomendacii', compact('documents'));
    }

    /**
     * Учеба Издания
     */
    public function ucheba_izdaniya(): View
    {
        $izdaniya = \App\Models\Izdaniya::orderBy('id', 'desc')->get();
        
        return view('ucheba-izdaniya', compact('izdaniya'));
    }

    /**
     * Учеба Издания карточка
     */
    public function ucheba_izdaniya_inner($slug): mixed
    {
        $single_izdaniye = \App\Models\Izdaniya::where('slug', $slug)->first();

        if ($single_izdaniye) {
            return view('ucheba-izdaniya-inner', compact('single_izdaniye'));
        } else {
            return abort(404);
        }
    }

    public function prepodavatelyam_spiski_studentov()
    {
        $content = DB::table('prepodavatelyam_spiski_studentovs')
                    ->get();

        return view('prepodavatelyam-spiski-studentov', compact('content'));
    }

    public function abiturientu_napravleniya_podgotovki(): View
    {
        return view('abiturientu-napravleniya-podgotovki');
    }

    public function single_abiturientu_napravleniya_podgotovki($slug): mixed
    {
        $learning_direction = \App\Models\LearningDirection::where('slug', $slug)->first();

        if ($learning_direction) {

            $single_napravlenie = \App\Models\AbiturientuNapravleniyaPodgotovki::where('learning_direction_id', $learning_direction->id)->first();
            
            return view('single-abiturientu-napravleniya-podgotovki', compact('single_napravlenie'));
        } else {
            return abort(404);
        }
    }

    public function abiturientu_podgotovitelnye_kursy()
    {
        $text = DB::table('pages')
                ->where('title', 'Абитуриенту Подготовительные курсы')
                ->value('text');

        return view('abiturientu-podgotovitelnye-kursy', compact('text'));
    }

    public function abiturientu_dokumenty(): View
    {
        $documents = \App\Models\AbiturientuDokumenty::orderBy('id', 'desc')->get();

        return view('abiturientu-dokumenty', compact('documents'));
    }

    public function abiturientu_podat_dokumenty()
    {
        return view('abiturientu-podat-dokumenty');
    }

    public function abiturientu_podat_dokumenty_add(Request $request)
    {   
        $surname = $request->input('surname');
        $name = $request->input('name');
        $patronymic = $request->input('patronymic');
        $birth_date = $request->input('birth-date');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $attestat = $request->file('attestat');
        $passport = $request->file('passport');
        $processing = $request->input('processing');
        $privacy = $request->input('privacy');

        $attestat_filetype = "";
        if($attestat) {
            $attestat_filetype = MainController::get_file_type($attestat);
        }        

        $passport_filetype = "";
        if($passport) {
            $passport_filetype = MainController::get_file_type($passport);
        }            

        if(strlen($surname) >= 3 && strlen($surname) <= 100 &&
           strlen($name) >= 3 && strlen($name) <= 100 &&
           strlen($patronymic) >= 3 && strlen($patronymic) <= 100 && 
           strlen($birth_date) == 10 && 
           strlen($phone) == 16 && 
           strlen($email) >= 8 && strlen($email) <= 40 && 
           $attestat_filetype == "pdf" && 
           $passport_filetype == "pdf" && 
           $processing == "on" && 
           $privacy == "on") {

            $now = date('Y-m-d H:i:s');

            $folder = 'podat-dokumenty';

            $attestat_slug = Str::slug($surname) . "-attestat";

            $attestat_file = (new \App\Services\File())->rename_file($attestat_slug, $attestat, $folder);

            $passport_slug = Str::slug($surname) . "-passport";

            $passport_file = (new \App\Services\File())->rename_file($passport_slug, $passport, $folder);

            $status = "В обработке";

            DB::insert('insert into podat_dokumenties (surname, name, patronymic, birth_date, phone, email, attestat, passport, status, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$surname, $name, $patronymic, $birth_date, $phone, $email, $attestat_file, $passport_file, $status, $now, $now]);

            return back()->withErrors(['message' => 'Спасибо. Документы отправлены.']);

        } else {
            return back()->withErrors(['message' => 'Ошибка. Попробуйте еще раз.']);
        }        
    }

    public function abiturientu_rezultaty_vstupitelnyh_ispytanij()
    {   
        $text = DB::table('pages')
                ->where('id', '31')
                ->value('text');

        return view('abiturientu-rezultaty-vstupitelnyh-ispytanij', compact('text'));
    }

    public function studencheskaya_zhizn_gazeta_pizzicato()
    {
        $newspapers = DB::table('newspapers')
                        ->orderBy('id', 'desc')
                        ->get();

        return view('studencheskaya-zhizn-gazeta-pizzicato', compact('newspapers'));
    }

    public function studencheskaya_zhizn_video()
    {
        $videos = DB::table('videos')
                ->orderBy('id', 'desc')
                ->get();        

        foreach($videos as $vds) {
            $short_title = MainController::trim_text($vds->title, 70);
            $vds->short_title = $short_title;
        }
                
        return view('studencheskaya-zhizn-video', compact('videos'));
    }

    public function studencheskaya_zhizn_kollektivy()
    {   
        $text = DB::table('pages')
                ->where('id', 39)
                ->value('text');

        return view('studencheskaya-zhizn-kollektivy', compact('text'));
    }

    public function studencheskaya_zhizn_rossijskoe_dvizhenie_detej_i_molodezhi()
    {
        $text = DB::table('pages')
                ->where('id', 40)
                ->value('text');
        
        return view('studencheskaya-zhizn-rossijskoe-dvizhenie-detej-i-molodezhi', compact('text'));
    }

    public function studencheskaya_zhizn_sportivnyj_klub_temp()
    {
        $text = DB::table('pages')
                ->where('id', 41)
                ->value('text');
        
        return view('studencheskaya-zhizn-sportivnyj-klub-temp', compact('text'));
    }

    public function studencheskaya_zhizn_vospitatelnaya_rabota()
    {
        $text = DB::table('pages')
                ->where('id', 42)
                ->value('text');
        
        return view('studencheskaya-zhizn-vospitatelnaya-rabota', compact('text'));
    }

    public function studencheskaya_zhizn_volontery()
    {
        $text = DB::table('pages')
                ->where('id', 43)
                ->value('text');
        
        return view('studencheskaya-zhizn-volontery', compact('text'));
    }
    
    public function studencheskaya_zhizn_media_centr_da_capo()
    {
        $text = DB::table('pages')
                ->where('id', 44)
                ->value('text');
        
        return view('studencheskaya-zhizn-media-centr-da-capo', compact('text'));
    }

    public function dshi_rukovodstvo_i_pedsostav()
    {
        $text = DB::table('pages')
                    ->where('title', 'Детская школа искусств руководство и педсостав')
                    ->value('text');

        return view('dshi-rukovodstvo-i-pedsostav', compact('text'));
    }

    public function dshi_postupayushchim()
    {
        $text = DB::table('pages')
                    ->where('title', 'Детская школа искусств поступающим')
                    ->value('text');

        return view('dshi-postupayushchim', compact('text'));
    }

    public function dshi_platnye_obrazovatelnye_uslugi()
    {
        $text = DB::table('pages')
                    ->where('title', 'Детская школа искусств платные образовательные услуги')
                    ->value('text');

        return view('dshi-platnye-obrazovatelnye-uslugi', compact('text'));
    }

    /**
     * ДШИ
     * Образование
     */
    public function dshi_obrazovanie(): View
    {
        $text = DB::table('pages')
                    ->where('title', 'Детская школа искусств образование')
                    ->value('text');

        // ДШИ категория Образование
        $category_id = 4;

        $svedeniya_subcategories = \App\Models\DshiSubcategory::where('dshi_category_id', $category_id)
                                                                    ->orderBy('sort', 'asc')
                                                                    ->get();

        return view('dshi-obrazovanie', compact('text', 'svedeniya_subcategories'));
    }

    /**
     * Сведения
     * Страница Список документов в подкатегории
     */
    public function dshi_dokumenty_inner($subcat): View
    {
        $dshi_subcategory = \App\Models\DshiSubcategory::where('slug', $subcat)->first();

        if ($dshi_subcategory) {

            return view('dshi-dokumenty-inner', compact('dshi_subcategory'));

        } else {
            return abort(404);
        }
    }

    public function dshi_dokumenty()
    {
        $text = DB::table('pages')
                    ->where('title', 'Детская школа искусств документы')
                    ->value('text');

        return view('dshi-dokumenty', compact('text'));
    }

    public function dshi_kontakty()
    {
        $text = DB::table('pages')
                    ->where('title', 'Детская школа искусств контакты')
                    ->value('text');

        return view('dshi-kontakty', compact('text'));
    }

    public function centr_sodejstviya_trudoustrojstvu()
    {   
        $text = DB::table('pages')
                ->where('title', 'Центр содействия трудоустройству')
                ->value('text');

        return view('centr-sodejstviya-trudoustrojstvu', compact('text'));
    }

    public function svedeniya_ob_obrazovatelnoj_organizacii(): View
    {
        $categories = \App\Models\SvedeniyaCategory::all();

        return view('svedeniya-ob-obrazovatelnoj-organizacii', compact('categories'));
    }

    public function svedeniya_osnovnye_svedeniya()
    {   
        $text = DB::table('pages')
                    ->where('title', 'Основные сведения')
                    ->value('text');

        return view('svedeniya-osnovnye-svedeniya', compact('text'));
    }

    /**
     * Сведения
     * Структура и органы управления образовательной организацией
     */
    public function struktura_i_organy_upravleniya_obrazovatelnoi_organizaciei(): View
    {   
        // Текст
        $text = DB::table('pages')
                    ->where('title', 'Структура и органы управления образовательной организацией')
                    ->value('text');

        // Документы
        $documents = \App\Models\SvedeniyaStrukturaDokumenty::orderBy('id', 'desc')->get();

        return view('svedeniya-struktura-i-organy-upravleniya-obrazovatelnoi-organizaciei', compact('text', 'documents'));
    }

    public function svedeniya_dokumenty(): View
    {   
        // Сведения категория Документы
        $category_id = 4;

        $svedeniya_subcategories = \App\Models\SvedeniyaSubcategory::where('svedeniya_category_id', $category_id)
                                                                    ->orderBy('sort', 'asc')
                                                                    ->get();

        return view('svedeniya-dokumenty', compact('svedeniya_subcategories'));
    }

    /**
     * Сведения
     * Страница Список документов в подкатегории
     */
    public function svedeniya_dokumenty_inner($subcat): View
    {
        $svedeniya_subcategory = \App\Models\SvedeniyaSubcategory::where('slug', $subcat)->first();

        if ($svedeniya_subcategory) {

            return view('svedeniya-dokumenty-inner', compact('svedeniya_subcategory'));

        } else {
            return abort(404);
        }
    }

    public function svedeniya_obrazovanie()
    {   
        $text = DB::table('pages')
                    ->where('id', '20')
                    ->value('text');

        return view('svedeniya-obrazovanie', compact('text'));
    }

    public function svedeniya_obrazovanie_informaciya()
    {   
        $text = DB::table('pages')
                    ->where('id', '32')
                    ->value('text');

        return view('svedeniya-obrazovanie-informaciya', compact('text'));
    }

    public function svedeniya_obrazovanie_annotacii_k_programmam_ppssz()
    {   
        $text = DB::table('pages')
                    ->where('id', '33')
                    ->value('text');

        return view('svedeniya-obrazovanie-annotacii-k-programmam-ppssz', compact('text'));
    }

    public function svedeniya_obrazovanie_uchebnye_plany()
    {   
        $text = DB::table('pages')
                    ->where('id', '34')
                    ->value('text');

        return view('svedeniya-obrazovanie-uchebnye-plany', compact('text'));
    }

    public function svedeniya_obrazovanie_kalendarnye_uchebnye_grafiki()
    {   
        $text = DB::table('pages')
                    ->where('id', '35')
                    ->value('text');

        return view('svedeniya-obrazovanie-kalendarnye-uchebnye-grafiki', compact('text'));
    }

    public function svedeniya_obrazovanie_formy_promezhutochnoj_attestacii()
    {   
        $text = DB::table('pages')
                    ->where('id', '36')
                    ->value('text');

        return view('svedeniya-obrazovanie-formy-promezhutochnoj-attestacii', compact('text'));
    }

    public function svedeniya_obrazovanie_programmy_podgotovki_specialistov_srednego_zvena()
    {   
        $text = DB::table('pages')
                    ->where('id', '37')
                    ->value('text');

        return view('svedeniya-obrazovanie-programmy-podgotovki-specialistov-srednego-zvena', compact('text'));
    }

    public function svedeniya_obrazovanie_rabochie_programmy_i_fond_ocenochnyh_sredstv()
    {   
        $text = DB::table('pages')
                    ->where('id', '38')
                    ->value('text');

        return view('svedeniya-obrazovanie-rabochie-programmy-i-fond-ocenochnyh-sredstv', compact('text'));
    }

    public function svedeniya_obrazovatelnye_standarty()
    {   
        $text = DB::table('pages')
                    ->where('id', '21')
                    ->value('text');

        return view('svedeniya-obrazovatelnye-standarty', compact('text'));
    }

    public function rukovodstvo_pedagogiceskii_naucno_pedagogiceskii_sostav()
    {
        return redirect('/o-kolledzhe/pedagogicheskij-sostav');
    }

    public function materialno_texniceskoe_obespecenie_i_osnashhennost_obrazovatelnogo_processa()
    {   
        $text = DB::table('pages')
                    ->where('title', 'Материально-техническое обеспечение и оснащенность образовательного процесса')
                    ->value('text');

        return view('svedeniya-materialno-texniceskoe-obespecenie-i-osnashhennost-obrazovatelnogo-processa', compact('text'));
    }

    public function stipendii_i_inye_vidy_materialnoi_podderzki()
    {   
        $text = DB::table('pages')
                    ->where('title', 'Стипендии и иные виды материальной поддержки')
                    ->value('text');

        return view('svedeniya-stipendii-i-inye-vidy-materialnoi-podderzki', compact('text'));
    }

    /**
     * Сведения
     * Финансово-хозяйственная деятельность
     */
    public function svedeniya_finansovo_xozyaistvennaya_deyatelnost(): View
    {   
        // Сведения категория Финансово-хозяйственная деятельность
        $category_id = 5;

        $svedeniya_subcategories = \App\Models\SvedeniyaSubcategory::where('svedeniya_category_id', $category_id)
                                                                    ->orderBy('id', 'desc')
                                                                    ->get();

        return view('svedeniya-finansovo-xozyaistvennaya-deyatelnost', compact('svedeniya_subcategories'));
    }

    /**
     * Сведения
     * Платные образовательные услуги
     */
    public function svedeniya_platnye_obrazovatelnye_uslugi(): View
    {   
        // Сведения категория Платные образовательные услуги
        $category_id = 6;

        $svedeniya_subcategories = \App\Models\SvedeniyaSubcategory::where('svedeniya_category_id', $category_id)
                                                                    ->orderBy('id', 'desc')
                                                                    ->get();

        return view('svedeniya-platnye-obrazovatelnye-uslugi', compact('svedeniya_subcategories'));
    }

    public function svedeniya_vakantnye_mesta_dlya_priema_perevoda()
    {   
        $text = DB::table('pages')
                    ->where('title', 'Вакантные места для приема (перевода)')
                    ->value('text');

        return view('svedeniya-vakantnye-mesta-dlya-priema-perevoda', compact('text'));
    }

    public function svedeniya_dostupnaya_sreda()
    {   
        $text = DB::table('pages')
                    ->where('id', '27')
                    ->value('text');

        return view('svedeniya-dostupnaya-sreda', compact('text'));
    }
    
    public function svedeniya_mezdunarodnoe_sotrudnicestvo()
    {   
        $text = DB::table('pages')
                    ->where('id', '28')
                    ->value('text');

        return view('svedeniya-mezdunarodnoe-sotrudnicestvo', compact('text'));
    }

    /**
     * Сведения
     * Противодействие коррупции
     */
    public function svedeniya_protivodejstvie_korrupcii(): View
    {
        // Сведения категория Платные образовательные услуги
        $category_id = 14;

        $svedeniya_subcategories = \App\Models\SvedeniyaSubcategory::where('svedeniya_category_id', $category_id)
                                                                    ->orderBy('id', 'desc')
                                                                    ->get();

        return view('svedeniya-protivodejstvie-korrupcii', compact('svedeniya_subcategories'));
    }

    public function svedeniya_razdel_dlya_invalidov_i_lic_s_ovz()
    {   
        $text = DB::table('pages')
                    ->where('id', '29')
                    ->value('text');

        return view('svedeniya-razdel-dlya-invalidov-i-lic-s-ovz', compact('text'));
    }

    public function svedeniya_metodicheskie_razrabotki_obespechivayushchie_uchebnyj_process()
    {   
        $text = DB::table('pages')
                    ->where('id', '30')
                    ->value('text');

        return view('svedeniya-metodicheskie-razrabotki-obespechivayushchie-uchebnyj-process', compact('text'));
    }

    public function svedeniya_obrazovanie_obshchij_gumanitarnyj_i_socialno_ehkonomicheskij_cikl()
    {
        return view('svedeniya-obrazovanie-obshchij-gumanitarnyj-i-socialno-ehkonomicheskij-cikl');
    }

    public function svedeniya_obrazovanie_51_02_01_narodnoe_hudozhestvennoe_tvorchestvo()
    {
        return view('svedeniya-obrazovanie-51-02-01-narodnoe-hudozhestvennoe-tvorchestvo');
    }

    public function svedeniya_obrazovanie_obshcheprofessionalnye_discipliny()
    {
        return view('svedeniya-obrazovanie-obshcheprofessionalnye-discipliny');
    }

    public function svedeniya_obrazovanie_53_02_00_instr_ispol_horov_dirizh_soln_i_horov_narod_penie_vok_iskusstvo()
    {
        return view('svedeniya-obrazovanie-53-02-00-instr-ispol-horov-dirizh-soln-i-horov-narod-penie-vok-iskusstvo');
    }

    public function svedeniya_obrazovanie_53_02_03_fortepiano()
    {
        return view('svedeniya-obrazovanie-53-02-03-fortepiano');
    }

    public function svedeniya_obrazovanie_53_02_05_solnoe_i_horovoe_narodnoe_penie()
    {
        return view('svedeniya-obrazovanie-53-02-05-solnoe-i-horovoe-narodnoe-penie');
    }

    public function metodicheskie_razrabotki_pck_fortepiano()
    {
        return view('metodicheskie-razrabotki-pck-fortepiano');
    }
    
    public function metodicheskie_razrabotki_pck_instrumenty_narodnogo_orkestra()
    {
        return view('metodicheskie-razrabotki-pck-instrumenty-narodnogo-orkestra');
    }

    public function metodicheskie_razrabotki_pck_orkestrovye_strunnye_duhovye_i_udarnye_instrumenty()
    {
        return view('metodicheskie-razrabotki-pck-orkestrovye-strunnye-duhovye-i-udarnye-instrumenty');
    }
    
    public function metodicheskie_razrabotki_pck_horovoe_dirizhirovanie()
    {
        return view('metodicheskie-razrabotki-pck-horovoe-dirizhirovanie');
    }

    public function metodicheskie_razrabotki_pck_solnoe_i_horovoe_narodnoe_penie()
    {
        return view('metodicheskie-razrabotki-pck-solnoe-i-horovoe-narodnoe-penie');
    }

    public function metodicheskie_razrabotki_pck_horeograficheskoe_tvorchestvo()
    {
        return view('metodicheskie-razrabotki-pck-horeograficheskoe-tvorchestvo');
    }

    public function metodicheskie_razrabotki_pck_muzykalno_teoreticheskie_discipliny()
    {
        return view('metodicheskie-razrabotki-pck-muzykalno-teoreticheskie-discipliny');
    }

    public function metodicheskie_razrabotki_pck_obshchie_gumanitarnye_i_socialno_ehkonomicheskie_discipliny()
    {
        return view('metodicheskie-razrabotki-pck-obshchie-gumanitarnye-i-socialno-ehkonomicheskie-discipliny');
    }

    public function metodicheskie_razrabotki_pk_fortepiano_raznyh_specialnostej()
    {
        return view('metodicheskie-razrabotki-pk-fortepiano-raznyh-specialnostej');
    }

    public function svedeniya_o_rezultatax_proverok()
    {
        return view('svedeniya-o-rezultatax-proverok');
    }

    public function afisha_archive()
    {
        $afisha = DB::table('afishas')
                    ->orderBy('year', 'desc')
                    ->get();

        $prev_year = "";
        $years_array = [];

        foreach ($afisha as $fsh) {

            if ($prev_year != $fsh->year) {
                $years_array[] = $fsh->year;
            }

            $prev_year = $fsh->year;
        }

        $twelve_afisha = DB::table('afishas')
                        ->orderBy('id', 'desc')
                        ->limit(12)
                        ->get();

        foreach($twelve_afisha as $fsh) {
            $short_title = MainController::trim_text($fsh->title, 70);
            $fsh->short_title = $short_title;
        }
                
        return view('afisha-archive', compact('years_array', 'twelve_afisha'));
    }

    public function afisha_archive_year($year)
    {
        if (is_numeric($year) && $year > 2000 && $year < 2050) {
            $afisha = DB::table('afishas')
                        ->where('year', $year)
                        ->orderBy('created_at', 'desc')
                        ->get();

            $prefix = 'afisha';
            $cat = 'afisha';

            $content = MainController::archive_content($afisha, $prefix, $cat);

            return view('afisha-archive-year', compact('content', 'year'));

        } else {
            return abort(404);
        }
    }

    public function single_afisha($slug)
    {
        $single_afisha = DB::table('afishas')
                            ->where('slug', $slug)
                            ->first();

        if ($single_afisha) {

            $id = $single_afisha->id;

            $prev_id = $id - 1;
            $next_id = $id + 1;

            $prev = DB::table('afishas')
                            ->where('id', $prev_id)
                            ->value('slug');

            $next = DB::table('afishas')
                            ->where('id', $next_id)
                            ->value('slug');

            if ($prev) {
                $prev = '/afisha/' . $prev;
            } else {
                $prev = '#';
            }

            if ($next) {
                $next = '/afisha/' . $next;
            } else {
                $next = '#';
            }
        
            return view('single-afisha', compact('single_afisha', 'prev', 'next'));
        } else {
            return abort(404);
        }
    }

    public function news_archive()
    {
        $news_year = DB::table('mainnews')
                    ->orderBy('year', 'desc')
                    ->pluck('year');

        $prev_year = "";
        $years_array = [];

        foreach ($news_year as $nws) {
            if ($prev_year != $nws) {
                $years_array[] = $nws;
            }
            $prev_year = $nws;
        }
        
        $twelve_news = DB::table('mainnews')
                        ->orderBy('id', 'desc')
                        ->limit(12)
                        ->get();

        foreach($twelve_news as $nws) {
            $short_title = MainController::trim_text($nws->title, 100);
            $nws->short_title = $short_title;
        }

        return view('news-archive', compact('years_array', 'twelve_news'));
    }

    public function news_archive_year($year)
    {
        if (is_numeric($year) && $year > 2000 && $year < 2050) {
            $news = DB::table('mainnews')
                        ->where('year', $year)
                        ->orderBy('created_at', 'desc')
                        ->get();

            $prefix = 'news';
            
            $content = MainController::archive_content($news, $prefix);

            return view('news-archive-year', compact('content', 'year'));

        } else {
            return abort(404);
        }
    }

    /**
     * Карточка новости
     * @param string slug
     * @return mixed
     */
    public function single_news($slug): mixed
    {
        $single_news = \App\Models\Mainnew::where('slug', $slug)->first();

        if ($single_news) {

            $id = $single_news->id;

            $prev_id = $id - 1;
            $next_id = $id + 1;

            $prev = DB::table('mainnews')
                            ->where('id', $prev_id)
                            ->value('slug');

            $next = DB::table('mainnews')
                            ->where('id', $next_id)
                            ->value('slug');

            if ($prev) {
                $prev = '/news/' . $prev;
            } else {
                $prev = '#';
            }

            if ($next) {
                $next = '/news/' . $next;
            } else {
                $next = '#';
            }

            return view('single-news', compact('single_news', 'prev', 'next'));
        } else {
            return abort(404);
        }
    }

    public function kalendar_studenta_archive()
    {
        $calendars = DB::table('calendars')
                    ->orderBy('year', 'desc')
                    ->get();

        $prev_year = "";
        $years_array = [];

        foreach ($calendars as $cldr) {

            if ($prev_year != $cldr->year) {
                $years_array[] = $cldr->year;
            }
            
            $prev_year = $cldr->year;
        }

        $eight_ks = [];
        $i = 0;
        foreach ($calendars as $ks) {
            if ($i > 7) {
                break;
            }
            $eight_ks[] = $ks;
            $i++;
        }
                    
        return view('kalendar-studenta-archive', compact('years_array', 'eight_ks'));
    }

    public function kalendar_studenta_archive_year($year)
    {
        if (is_numeric($year) && $year > 2000 && $year < 2050) {
            $сalendars = DB::table('calendars')
                            ->where('year', $year)
                            ->orderBy('created_at', 'desc')
                            ->get();

            $prefix = 'kalendar-studenta';
            
            $content = MainController::archive_content($сalendars, $prefix);

            return view('kalendar-studenta-archive-year', compact('content', 'year'));

        } else {
            return abort(404);
        }
    }

    public function single_kalendar_studenta($slug)
    {
        $single_kalendar = DB::table('calendars')
                            ->where('slug', $slug)
                            ->first();

        if ($single_kalendar) {

            $id = $single_kalendar->id;

            $prev_id = $id - 1;
            $next_id = $id + 1;

            $prev = DB::table('calendars')
                            ->where('id', $prev_id)
                            ->value('slug');

            $next = DB::table('calendars')
                            ->where('id', $next_id)
                            ->value('slug');

            if ($prev) {
                $prev = '/kalendar-studenta/' . $prev;
            } else {
                $prev = '#';
            }

            if ($next) {
                $next = '/kalendar-studenta/' . $next;
            } else {
                $next = '#';
            }

            return view('single-kalendar-studenta', compact('single_kalendar', 'prev', 'next'));
        } else {
            return abort(404);
        }
    }

    public function konkursy()
    {
        $konkursy = DB::table('konkurs')
                        ->orderBy('id', 'desc')
                        ->get();

        return view('konkursy', compact('konkursy'));
    }

    public function single_konkurs($slug)
    {
        $single_konkurs = DB::table('konkurs')
                            ->where('slug', $slug)
                            ->first();

        if ($single_konkurs) {

            $id = $single_konkurs->id;

            $documents = DB::table('konkurs_documents')
                            ->where('konkurs_id', $id)
                            ->orderby('id', 'desc')
                            ->get();

            $prev_id = $id - 1;
            $next_id = $id + 1;

            $prev = DB::table('konkurs')
                            ->where('id', $prev_id)
                            ->value('slug');

            $next = DB::table('konkurs')
                            ->where('id', $next_id)
                            ->value('slug');

            if ($prev) {
                $prev = '/konkursy/' . $prev;
            } else {
                $prev = '#';
            }

            if ($next) {
                $next = '/konkursy/' . $next;
            } else {
                $next = '#';
            }
        
            return view('single-konkurs', compact('single_konkurs', 'documents', 'prev', 'next'));
        } else {
            return abort(404);
        }

    }

    /**
     * Политика конфиденциальности
     */
    public function politika_konfidencialnosti(): View
    {
        return view('politika-konfidencialnosti');
    }

    /**
     * Правила на обработку персональных данных
     */
    public function pravila_na_obrabotku_personalnyh_dannyh(): View
    {
        return view('pravila-na-obrabotku-personalnyh-dannyh');
    }

    /**
     * Обратная связь Напишите нам
     * @param
     * @return Illuminate\View\View
     */
    public function feedback(): View
    {
        return view('feedback');
    }

    public function feedback_store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:100',
            'phone' => 'required|min:3|max:100',
            'email' => 'required|min:3|max:100',
            'message' => 'required|min:3|max:1000',
            'processing' => 'required',
            'privacy' => 'required',
            'g-recaptcha-response' => 'required',
        ]);

        // Google Captcha
        $g_response = (new \App\Services\GoogleCaptcha($validated))->get();

        if (!$g_response) {
            redirect()->back()->with('error', 'Ошибка');
        }

        \App\Models\Feedback::create([
            'name' => $validated["name"],
            'phone' => $validated["phone"],
            'email' => $validated["email"],
            'message' => $validated["message"],
        ]);
        
        return redirect()->back()->with('status', 'Ваше обращение принято');
    }

    public static function archive_content($object, $prefix, $cat = null) {
        $content = "";
        $content1 = "";
        $prev_month = "";

        foreach ($object as $obj) {
            $month = "";

            if ($cat == 'afisha') {
                // Сортировка по полю date для афиши
                $date = $obj->date;
                $month = mb_substr($date, 3, 2);
            } else {
                // Сортировка по полю created_at для новостей
                $created_at = $obj->created_at;
                $month = date('m', strtotime($created_at));
            }

            $content2 = "";
            if ($prev_month != $month) {
                $content2 .= "<div class=\"month\">";
                switch ($month) {
                    case '12':
                        $content2 .= "Декабрь";
                        break;
                    case '11':
                        $content2 .= "Ноябрь";
                        break;
                    case '10':
                        $content2 .= "Октябрь";
                        break;
                    case '09':
                        $content2 .= "Сентябрь";
                        break;
                    case '08':
                        $content2 .= "Август";
                        break;
                    case '07':
                        $content2 .= "Июль";
                        break;
                    case '06':
                        $content2 .= "Июнь";
                        break;
                    case '05':
                        $content2 .= "Май";
                        break;
                    case '04':
                        $content2 .= "Апрель";
                        break;
                    case '03':
                        $content2 .= "Март";
                        break;
                    case '02':
                        $content2 .= "Февраль";
                        break;
                    case '01':
                        $content2 .= "Январь";
                        break;
                }
                $content2 .= "</div>";
            }

            $content1 = "<div class=\"posts-per-month\">";
            $content1 .= "<div class=\"post-thumb\">";
            $content1 .= "<span class=\"number\">" . mb_substr($obj->date, 0, 2)  .  "</span>";
            $content1 .= "</div>";
            $content1 .= "<a href=\"/" . $prefix . "/" . $obj->slug . "\">";

            $content1 .= $obj->title;
            $content1 .= "</a>";
            $content1 .= "</div>";
            $content .= $content2 . $content1;
            $prev_month = $month;
        }

        return $content;
    }

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
                $filetype = "xlsx";
                break;
            case "application/octet-stream":
                if($file->getClientOriginalExtension() == "xlsx") {
                    $filetype = "xlsx";
                }
                break;
            default:
                $filetype = "none";
        }

        return $filetype;
    }
}