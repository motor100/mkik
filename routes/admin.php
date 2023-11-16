<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\KonkursyController;
use App\Http\Controllers\Admin\LearningDirectionController;
use App\Http\Controllers\Admin\MainnewsController;
use App\Http\Controllers\Admin\PedagogicheskijSostavDokumentyController;
use App\Http\Controllers\Admin\AbiturientuNapravleniyaPodgotovkiController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\SvedeniyaSubcategoryController;
use App\Http\Controllers\Admin\SvedeniyaDocumentsController;
use App\Http\Controllers\Admin\AbiturientuDokumentyController;
use App\Http\Controllers\Admin\UchebaPrepodavatelyamMaketyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



require __DIR__.'/auth.php';

// Админ панель
Route::middleware('can:view-dashboard')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'home']);


    Route::get('/dashboard/news', [MainnewsController::class, 'index']);

    Route::get('/dashboard/news/create', [MainnewsController::class, 'create'])->name('news-create');

    Route::post('/dashboard/news/store', [MainnewsController::class, 'store'])->name('news-store');

    Route::get('/dashboard/news/{id}/edit', [MainnewsController::class, 'edit'])->name('news-edit');

    Route::post('/dashboard/news/{id}/update', [MainnewsController::class, 'update'])->name('news-update');

    Route::get('/dashboard/news/{id}/destroy', [MainnewsController::class, 'destroy'])->name('news-destroy');


    Route::get('/dashboard/afisha', [AdminController::class, 'afisha']);

    Route::post('/dashboard/afisha/add', [AdminController::class, 'afisha_add']);

    Route::get('/dashboard/afisha/del/{id}', [AdminController::class, 'afisha_del']);

    Route::get('/dashboard/kalendar-studenta', [AdminController::class, 'kalendar_studenta']);

    Route::post('/dashboard/kalendar-studenta/add', [AdminController::class, 'kalendar_studenta_add']);

    Route::get('/dashboard/kalendar-studenta/del/{id}', [AdminController::class, 'kalendar_studenta_del']);

    Route::get('/dashboard/studentam-raspisanie', [AdminController::class, 'studentam_raspisanie']);

    Route::post('/dashboard/studentam-raspisanie-update', [AdminController::class, 'studentam_raspisanie_update']);

    // Учеба Студентам форма аттестации
    Route::get('/dashboard/studentam-attestation-form', [AdminController::class, 'studentam_attestation_form']);

    // Учеба Студентам форма аттестации обновление
    Route::post('/dashboard/studentam-attestation-form-update', [AdminController::class, 'studentam_attestation_form_update']);
    
    Route::get('/dashboard/studentam-gia', [AdminController::class, 'studentam_gia']);

    Route::post('/dashboard/studentam-gia/add', [AdminController::class, 'studentam_gia_add']);

    Route::get('/dashboard/studentam-grafik-uchebnogo-processa', [AdminController::class, 'studentam_grafik_uchebnogo_processa']);

    Route::post('/dashboard/studentam-grafik-uchebnogo-processa/add', [AdminController::class, 'studentam_grafik_uchebnogo_processa_add']);

    Route::get('/dashboard/studentam-zayavleniya', [AdminController::class, 'studentam_zayavleniya']);

    Route::post('/dashboard/studentam-zayavleniya/add', [AdminController::class, 'studentam_zayavleniya_add']);

    Route::get('/dashboard/studentam-metodicheskie-rekomendacii', [AdminController::class, 'studentam_metodicheskie_rekomendacii']);

    Route::post('/dashboard/studentam-metodicheskie-rekomendacii/add', [AdminController::class, 'studentam_metodicheskie_rekomendacii_add']);

    Route::get('/dashboard/studentam-polozheniya', [AdminController::class, 'studentam_polozheniya']);

    Route::post('/dashboard/studentam-polozheniya/add', [AdminController::class, 'studentam_polozheniya_add']);


    // Учеба Преподавателям макеты
    Route::get('/dashboard/ucheba-prepodavatelyam-makety', [UchebaPrepodavatelyamMaketyController::class, 'index']);

    Route::get('/dashboard/ucheba-prepodavatelyam-makety/create', [UchebaPrepodavatelyamMaketyController::class, 'create'])->name('dashboard.ucheba-prepodavatelyam-makety-create');

    Route::post('/dashboard/ucheba-prepodavatelyam-makety/store', [UchebaPrepodavatelyamMaketyController::class, 'store'])->name('dashboard.ucheba-prepodavatelyam-makety-store');

    Route::get('/dashboard/ucheba-prepodavatelyam-makety/{id}/edit', [UchebaPrepodavatelyamMaketyController::class, 'edit'])->name('dashboard.ucheba-prepodavatelyam-makety-edit');

    Route::post('/dashboard/ucheba-prepodavatelyam-makety/{id}/update', [UchebaPrepodavatelyamMaketyController::class, 'update'])->name('dashboard.ucheba-prepodavatelyam-makety-update');

    Route::get('/dashboard/ucheba-prepodavatelyam-makety/{id}/destroy', [UchebaPrepodavatelyamMaketyController::class, 'destroy'])->name('dashboard.ucheba-prepodavatelyam-makety-destroy');


    Route::get('/dashboard/prepodavatelyam-metodicheskie-rekomendacii', [AdminController::class, 'prepodavatelyam_metodicheskie_rekomendacii']);

    Route::post('/dashboard/prepodavatelyam-metodicheskie-rekomendacii/add', [AdminController::class, 'prepodavatelyam_metodicheskie_rekomendacii_add']);

    Route::get('/dashboard/prepodavatelyam-metodicheskie-rekomendacii/del/{id}', [AdminController::class, 'prepodavatelyam_metodicheskie_rekomendacii_del']);

    Route::get('/dashboard/prepodavatelyam-spiski-studentov', [AdminController::class, 'prepodavatelyam_spiski_studentov']);

    Route::post('/dashboard/prepodavatelyam-spiski-studentov-update', [AdminController::class, 'prepodavatelyam_spiski_studentov_update']);

    
    Route::get('/dashboard/konkursy', [KonkursyController::class, 'index']);

    Route::get('/dashboard/konkursy/create', [KonkursyController::class, 'create'])->name('konkursy-create');

    Route::post('/dashboard/konkursy/store', [KonkursyController::class, 'store'])->name('konkursy-store');

    Route::get('/dashboard/konkursy/{id}/edit', [KonkursyController::class, 'edit'])->name('konkursy-edit');

    Route::post('/dashboard/konkursy/update', [KonkursyController::class, 'update'])->name('konkursy-update');

    Route::get('/dashboard/konkursy/{id}/destroy', [KonkursyController::class, 'destroy'])->name('konkursy-destroy');


    Route::get('/dashboard/konkursy-dokumenty', [AdminController::class, 'konkursy_dokumenty']);

    Route::post('/dashboard/konkursy-dokumenty/add', [AdminController::class, 'konkursy_dokumenty_add']);

    Route::get('/dashboard/konkursy-dokumenty/del/{id}', [AdminController::class, 'konkursy_dokumenty_del']);

    Route::get('/dashboard/studencheskaya-zhizn-gazeta-pizzicato', [AdminController::class, 'gazeta_pizzicato']);

    Route::post('/dashboard/studencheskaya-zhizn-gazeta-pizzicato/add', [AdminController::class, 'gazeta_pizzicato_add']);

    Route::get('/dashboard/studencheskaya-zhizn-gazeta-pizzicato/del/{id}', [AdminController::class, 'gazeta_pizzicato_del']);

    Route::get('/dashboard/studencheskaya-zhizn-izdaniya', [AdminController::class, 'izdaniya']);

    Route::post('/dashboard/studencheskaya-zhizn-izdaniya/add', [AdminController::class, 'izdaniya_add']);

    Route::get('/dashboard/studencheskaya-zhizn-izdaniya/del/{id}', [AdminController::class, 'izdaniya_del']);

    Route::get('/dashboard/studencheskaya-zhizn-video', [AdminController::class, 'video']);

    Route::post('/dashboard/studencheskaya-zhizn-video/add', [AdminController::class, 'video_add']);

    Route::get('/dashboard/studencheskaya-zhizn-video/del/{id}', [AdminController::class, 'video_del']);

    Route::get('/dashboard/studencheskaya-zhizn-kollektivy', [AdminController::class, 'studencheskaya_zhizn_kollektivy']);

    Route::post('/dashboard/studencheskaya-zhizn-kollektivy-update', [AdminController::class, 'studencheskaya_zhizn_kollektivy_update']);

    Route::get('/dashboard/studencheskaya-zhizn-rossijskoe-dvizhenie-detej-i-molodezhi', [AdminController::class, 'studencheskaya_zhizn_rossijskoe_dvizhenie_detej_i_molodezhi']);

    Route::post('/dashboard/studencheskaya-zhizn-rossijskoe-dvizhenie-detej-i-molodezhi-update', [AdminController::class, 'studencheskaya_zhizn_rossijskoe_dvizhenie_detej_i_molodezhi_update']);

    Route::get('/dashboard/studencheskaya-zhizn-sportivnyj-klub-temp', [AdminController::class, 'studencheskaya_zhizn_sportivnyj_klub_temp']);

    Route::post('/dashboard/studencheskaya-zhizn-sportivnyj-klub-temp-update', [AdminController::class, 'studencheskaya_zhizn_sportivnyj_klub_temp_update']);

    Route::get('/dashboard/studencheskaya-zhizn-vospitatelnaya-rabota', [AdminController::class, 'studencheskaya_zhizn_vospitatelnaya_rabota']);

    Route::post('/dashboard/studencheskaya-zhizn-vospitatelnaya-rabota-update', [AdminController::class, 'studencheskaya_zhizn_vospitatelnaya_rabota_update']);

    Route::get('/dashboard/studencheskaya-zhizn-volontery', [AdminController::class, 'studencheskaya_zhizn_volontery']);

    Route::post('/dashboard/studencheskaya-zhizn-volontery-update', [AdminController::class, 'studencheskaya_zhizn_volontery_update']);

    Route::get('/dashboard/studencheskaya-zhizn-media-centr-da-capo', [AdminController::class, 'studencheskaya_zhizn_media_centr_da_capo']);

    Route::post('/dashboard/studencheskaya-zhizn-media-centr-da-capo-update', [AdminController::class, 'studencheskaya_zhizn_media_centr_da_capo_update']);

    // Абитуриенту Направления подготовки
    Route::get('/dashboard/abiturientu-napravleniya-podgotovki', [AbiturientuNapravleniyaPodgotovkiController::class, 'index']);

    Route::get('/dashboard/abiturientu-napravleniya-podgotovki/{id}/edit', [AbiturientuNapravleniyaPodgotovkiController::class, 'edit'])->name('dashboard.abiturientu-napravleniya-podgotovki-edit');

    Route::post('/dashboard/abiturientu-napravleniya-podgotovki/{id}/update', [AbiturientuNapravleniyaPodgotovkiController::class, 'update'])->name('dashboard.abiturientu-napravleniya-podgotovki-update');

    // Абитуриенту Подготовительные курсы
    Route::get('/dashboard/abiturientu-podgotovitelnye-kursy', [AdminController::class, 'abiturientu_podgotovitelnye_kursy']);

    Route::post('/dashboard/abiturientu-podgotovitelnye-kursy-update', [AdminController::class, 'abiturientu_podgotovitelnye_kursy_update']);


    // Абитуриенту Документы
    Route::get('/dashboard/abiturientu-dokumenty', [AbiturientuDokumentyController::class, 'index']);

    Route::get('/dashboard/abiturientu-dokumenty/create', [AbiturientuDokumentyController::class, 'create'])->name('dashboard.abiturientu-dokumenty-create');

    Route::post('/dashboard/abiturientu-dokumenty/store', [AbiturientuDokumentyController::class, 'store'])->name('dashboard.abiturientu-dokumenty-store');

    Route::get('/dashboard/abiturientu-dokumenty/{id}/edit', [AbiturientuDokumentyController::class, 'edit'])->name('dashboard.abiturientu-dokumenty-edit');

    Route::post('/dashboard/abiturientu-dokumenty/{id}/update', [AbiturientuDokumentyController::class, 'update'])->name('dashboard.abiturientu-dokumenty-update');

    Route::get('/dashboard/abiturientu-dokumenty/{id}/destroy', [AbiturientuDokumentyController::class, 'destroy'])->name('dashboard.abiturientu-dokumenty-destroy');


    Route::get('/dashboard/abiturientu-rezultaty-vstupitelnyh-ispytanij', [AdminController::class, 'abiturientu_rezultaty_vstupitelnyh_ispytanij']);
    // абитуриенту результаты вступительных испытаний

    Route::post('/dashboard/abiturientu-rezultaty-vstupitelnyh-ispytanij-update', [AdminController::class, 'abiturientu_rezultaty_vstupitelnyh_ispytanij_update']);

    Route::get('/dashboard/dshi-rukovodstvo-i-pedsostav', [AdminController::class, 'dshi_rukovodstvo_i_pedsostav']);

    Route::post('/dashboard/dshi-rukovodstvo-i-pedsostav-update', [AdminController::class, 'dshi_rukovodstvo_i_pedsostav_update']);

    Route::get('/dashboard/dshi-postupayushchim', [AdminController::class, 'dshi_postupayushchim']);

    Route::post('/dashboard/dshi-postupayushchim-update', [AdminController::class, 'dshi_postupayushchim_update']);

    Route::get('/dashboard/dshi-platnye-obrazovatelnye-uslugi', [AdminController::class, 'dshi_platnye_obrazovatelnye_uslugi']);

    Route::post('/dashboard/dshi-platnye-obrazovatelnye-uslugi-update', [AdminController::class, 'dshi_platnye_obrazovatelnye_uslugi_update']);

    Route::get('/dashboard/dshi-obrazovanie', [AdminController::class, 'dshi_obrazovanie']);

    Route::post('/dashboard/dshi-obrazovanie-update', [AdminController::class, 'dshi_obrazovanie_update']);

    Route::get('/dashboard/dshi-dokumenty', [AdminController::class, 'dshi_dokumenty']);

    Route::post('/dashboard/dshi-dokumenty-update', [AdminController::class, 'dshi_dokumenty_update']);

    Route::get('/dashboard/dshi-kontakty', [AdminController::class, 'dshi_kontakty']);

    Route::post('/dashboard/dshi-kontakty-update', [AdminController::class, 'dshi_kontakty_update']);

    Route::get('/dashboard/prepodavateli', [AdminController::class, 'prepodavateli']);

    Route::post('/dashboard/prepodavateli/add', [AdminController::class, 'prepodavateli_add']);

    Route::get('/dashboard/prepodavateli/edit/{id}', [AdminController::class, 'prepodavateli_edit']);

    Route::post('/dashboard/prepodavateli/update/{id}', [AdminController::class, 'prepodavateli_update']);

    Route::get('/dashboard/prepodavateli/del/{id}', [AdminController::class, 'prepodavateli_del']);

    Route::get('/dashboard/eios-bank-studencheskih-rabot', [AdminController::class, 'eios_bank_studencheskih_rabot']);

    Route::post('/dashboard/eios-bank-studencheskih-rabot/add', [AdminController::class, 'eios_bank_studencheskih_rabot_add']);

    Route::get('/dashboard/eios-bank-studencheskih-rabot/del/{id}', [AdminController::class, 'eios_bank_studencheskih_rabot_del']);

    Route::get('/dashboard/eios-portfolio', [AdminController::class, 'eios_portfolio']);

    Route::post('/dashboard/eios-portfolio/add', [AdminController::class, 'eios_portfolio_add']);

    Route::get('/dashboard/eios-portfolio/del/{id}', [AdminController::class, 'eios_portfolio_del']);

    Route::get('/dashboard/eios-informacionnye-ehlektronnye-obrazovatelnye-resursy', [AdminController::class, 'eios_informacionnye_ehlektronnye_obrazovatelnye_resursy']);

    Route::post('/dashboard/eios-informacionnye-ehlektronnye-obrazovatelnye-resursy/add', [AdminController::class, 'eios_informacionnye_ehlektronnye_obrazovatelnye_resursy_add']);

    Route::get('/dashboard/eios-rezultaty-osvoeniya-obrazovatelnoj-programmy', [AdminController::class, 'eios_rezultaty_osvoeniya_obrazovatelnoj_programmy']);

    Route::post('/dashboard/eios-rezultaty-osvoeniya-obrazovatelnoj-programmy/add', [AdminController::class, 'eios_rezultaty_osvoeniya_obrazovatelnoj_programmy_add']);

    Route::get('/dashboard/eios-rezultaty-osvoeniya-obrazovatelnoj-programmy/del/{id}', [AdminController::class, 'eios_rezultaty_osvoeniya_obrazovatelnoj_programmy_del']);
    
    Route::get('/dashboard/eios-metodicheskie-materialy-i-programmy', [AdminController::class, 'eios_metodicheskie_materialy_i_programmy']);

    Route::post('/dashboard/eios-metodicheskie-materialy-i-programmy/add', [AdminController::class, 'eios_metodicheskie_materialy_i_programmy_add']);

    Route::get('/dashboard/eios-metodicheskie-materialy-i-programmy/del/{id}', [AdminController::class, 'eios_metodicheskie_materialy_i_programmy_del']);
    
    Route::get('/dashboard/anteroom-commission', [AdminController::class, 'anteroom_commission']);

    Route::get('/dashboard/anteroom-commission/{id}', [AdminController::class, 'single_anteroom_commission']);
    
    Route::post('/dashboard/abit-update', [AdminController::class, 'abit_update']);

    Route::get('/dashboard/centr-sodejstviya-trudoustrojstvu', [AdminController::class, 'centr_sodejstviya_trudoustrojstvu']);

    Route::post('/dashboard/centr-sodejstviya-trudoustrojstvu-update', [AdminController::class, 'centr_sodejstviya_trudoustrojstvu_update']);

    // Сведения Категории
    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/category/{id}', [AdminController::class, 'svedeniya_category'])->name('dashboard.svedeniya-category');


    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/osnovnye-svedeniya', [AdminController::class, 'svedeniya_osnovnye_svedeniya']);
    // основные сведения

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/osnovnye-svedeniya-update', [AdminController::class, 'svedeniya_osnovnye_svedeniya_update']);

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/struktura-i-organy-upravleniya-obrazovatelnoi-organizaciei', [AdminController::class, 'svedeniya_struktura_i_organy_upravleniya_obrazovatelnoi_organizaciei']);
    // структура и органы управления образовательной организацией

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/struktura-i-organy-upravleniya-obrazovatelnoi-organizaciei-update', [AdminController::class, 'svedeniya_struktura_i_organy_upravleniya_obrazovatelnoi_organizaciei_update']);


    // Сведения Подкатегории
    // subcategories/create/{category_id} category_id категории в которой создается подкатегория
    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/subcategories/create/{category_id}', [SvedeniyaSubcategoryController::class, 'create'])->name('dashboard.svedeniya-subcategories-create');

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/subcategories/store', [SvedeniyaSubcategoryController::class, 'store'])->name('dashboard.svedeniya-subcategories-store');

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/subcategories/{id}', [SvedeniyaSubcategoryController::class, 'show'])->name('dashboard.svedeniya-subcategories-show');

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/subcategories/{id}/edit', [SvedeniyaSubcategoryController::class, 'edit'])->name('dashboard.svedeniya-subcategories-edit');

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/subcategories/{id}/update', [SvedeniyaSubcategoryController::class, 'update'])->name('dashboard.svedeniya-subcategories-update');

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/subcategories/{id}/destroy', [SvedeniyaSubcategoryController::class, 'destroy'])->name('dashboard.svedeniya-subcategories-destroy');


    // Сведения Документы
    // documents/create/{subcategory_id} subcategory_id подкатегория в которую добавляется документ
    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/dokumenty/create/{subcategory_id}', [SvedeniyaDocumentsController::class, 'create'])->name('dashboard.svedeniya-dokumenty-create');

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/dokumenty/store', [SvedeniyaDocumentsController::class, 'store'])->name('dashboard.svedeniya-dokumenty-store');

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/dokumenty/{id}', [SvedeniyaDocumentsController::class, 'show'])->name('dashboard.svedeniya-dokumenty-show');

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/dokumenty/{id}/edit', [SvedeniyaDocumentsController::class, 'edit'])->name('dashboard.svedeniya-dokumenty-edit');

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/dokumenty/{id}/update', [SvedeniyaDocumentsController::class, 'update'])->name('dashboard.svedeniya-dokumenty-update');

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/dokumenty/{id}/destroy', [SvedeniyaDocumentsController::class, 'destroy'])->name('dashboard.svedeniya-dokumenty-destroy');


    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie', [AdminController::class, 'svedeniya_obrazovanie']);
    // образование

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie-update', [AdminController::class, 'svedeniya_obrazovanie_update']);

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie-informaciya', [AdminController::class, 'svedeniya_obrazovanie_informaciya']);
    // образование информация

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie-informaciya-update', [AdminController::class, 'svedeniya_obrazovanie_informaciya_update']);

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie-annotacii-k-programmam-ppssz', [AdminController::class, 'svedeniya_obrazovanie_annotacii_k_programmam_ppssz']);
    // образование аннотации к программам ППССЗ

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie-annotacii-k-programmam-ppssz-update', [AdminController::class, 'svedeniya_obrazovanie_annotacii_k_programmam_ppssz_update']);

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie-uchebnye-plany', [AdminController::class, 'svedeniya_obrazovanie_uchebnye_plany']);
    // образование учебные планы

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie-uchebnye-plany-update', [AdminController::class, 'svedeniya_obrazovanie_uchebnye_plany_update']);

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/kalendarnye-uchebnye-grafiki', [AdminController::class, 'svedeniya_obrazovanie_kalendarnye_uchebnye_grafiki']);
    // образование календарные учебные графики

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/kalendarnye-uchebnye-grafiki-update', [AdminController::class, 'svedeniya_obrazovanie_kalendarnye_uchebnye_grafiki_update']);

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/formy-promezhutochnoj-attestacii', [AdminController::class, 'svedeniya_obrazovanie_formy_promezhutochnoj_attestacii']);
    // образование формы промежуточной аттестации

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/formy-promezhutochnoj-attestacii-update', [AdminController::class, 'svedeniya_obrazovanie_formy_promezhutochnoj_attestacii_update']);

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/programmy-podgotovki-specialistov-srednego-zvena', [AdminController::class, 'svedeniya_obrazovanie_programmy_podgotovki_specialistov_srednego_zvena']);
    // образование программы подготовки специалистов среднего звена

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie-programmy-podgotovki-specialistov-srednego-zvena-update', [AdminController::class, 'svedeniya_obrazovanie_programmy_podgotovki_specialistov_srednego_zvena_update']);

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie-rabochie-programmy-i-fond-ocenochnyh-sredstv', [AdminController::class, 'svedeniya_obrazovanie_rabochie_programmy_i_fond_ocenochnyh_sredstv']);
    // образование рабочие программы и фонд оценочных средств

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie-rabochie-programmy-i-fond-ocenochnyh-sredstv-update', [AdminController::class, 'svedeniya_obrazovanie_rabochie_programmy_i_fond_ocenochnyh_sredstv_update']);

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/obrazovatelnye-standarty-i-trebovaniya', [AdminController::class, 'svedeniya_obrazovatelnye_standarty']);
    // образовательные стандарты

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/obrazovatelnye-standarty-i-trebovaniya-update', [AdminController::class, 'svedeniya_obrazovatelnye_standarty_update']);

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/materialno-texniceskoe-obespecenie-i-osnashhennost-obrazovatelnogo-processa', [AdminController::class, 'svedeniya_materialno_texniceskoe_obespecenie_i_osnashhennost_obrazovatelnogo_processa']);
    // материально-техническое обеспечение и оснащенность образовательного процесса

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/materialno-texniceskoe-obespecenie-i-osnashhennost-obrazovatelnogo-processa-update', [AdminController::class, 'svedeniya_materialno_texniceskoe_obespecenie_i_osnashhennost_obrazovatelnogo_processa_update']);

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/stipendii-i-inye-vidy-materialnoi-podderzki', [AdminController::class, 'svedeniya_stipendii_i_inye_vidy_materialnoi_podderzki']);
    // стипендии и иные виды материальной поддержки

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/stipendii-i-inye-vidy-materialnoi-podderzki-update', [AdminController::class, 'svedeniya_stipendii_i_inye_vidy_materialnoi_podderzki_update']);


    // Педагогический состав документы
    Route::get('/dashboard/pedagogicheskij-sostav-dokumenty', [PedagogicheskijSostavDokumentyController::class, 'index']);

    Route::get('/dashboard/pedagogicheskij-sostav-dokumenty/create', [PedagogicheskijSostavDokumentyController::class, 'create'])->name('pedagogicheskij-sostav-dokumenty-create');

    Route::post('/dashboard/pedagogicheskij-sostav-dokumenty/store', [PedagogicheskijSostavDokumentyController::class, 'store'])->name('pedagogicheskij-sostav-dokumenty-store');

    // Route::get('/dashboard/pedagogicheskij-sostav-dokumenty/{id}', [PedagogicheskijSostavDokumentyController::class, 'show'])->name('pedagogicheskij-sostav-dokumenty-show');

    Route::get('/dashboard/pedagogicheskij-sostav-dokumenty/{id}/edit', [PedagogicheskijSostavDokumentyController::class, 'edit'])->name('pedagogicheskij-sostav-dokumenty-edit');

    Route::post('/dashboard/pedagogicheskij-sostav-dokumenty/{id}/update', [PedagogicheskijSostavDokumentyController::class, 'update'])->name('pedagogicheskij-sostav-dokumenty-update');

    Route::get('/dashboard/pedagogicheskij-sostav-dokumenty/{id}/destroy', [PedagogicheskijSostavDokumentyController::class, 'destroy'])->name('pedagogicheskij-sostav-dokumenty-destroy');


    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/platnye-obrazovatelnye-uslugi', [AdminController::class, 'svedeniya_platnye_obrazovatelnye_uslugi']);
    // платные образовательные услуги

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/platnye-obrazovatelnye-uslugi-update', [AdminController::class, 'svedeniya_platnye_obrazovatelnye_uslugi_update']);

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/finansovo-xozyaistvennaya-deyatelnost', [AdminController::class, 'svedeniya_finansovo_xozyaistvennaya_deyatelnost']);
    // финансово-хозяйственная деятельность

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/finansovo-xozyaistvennaya-deyatelnost-update', [AdminController::class, 'svedeniya_finansovo_xozyaistvennaya_deyatelnost_update']);

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/vakantnye-mesta-dlya-priema-perevoda', [AdminController::class, 'svedeniya_vakantnye_mesta_dlya_priema_perevoda']);
    // вакантные места для приема (перевода)

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/vakantnye-mesta-dlya-priema-perevoda-update', [AdminController::class, 'svedeniya_vakantnye_mesta_dlya_priema_perevoda_update']);

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/dostupnaya-sreda', [AdminController::class, 'svedeniya_dostupnaya_sreda']);
    // доступная среда

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/dostupnaya-sreda-update', [AdminController::class, 'svedeniya_dostupnaya_sreda_update']);

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/mezdunarodnoe-sotrudnicestvo', [AdminController::class, 'svedeniya_mezdunarodnoe_sotrudnicestvo']);
    // международное сотрудничество

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/mezdunarodnoe-sotrudnicestvo-update', [AdminController::class, 'svedeniya_mezdunarodnoe_sotrudnicestvo_update']);

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/protivodejstvie-korrupcii', [AdminController::class, 'svedeniya_protivodejstvie_korrupcii']);
    // противодействие коррупции

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/protivodejstvie-korrupcii-update', [AdminController::class, 'svedeniya_protivodejstvie_korrupcii_update']);

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/razdel-dlya-invalidov-i-lic-s-ovz', [AdminController::class, 'svedeniya_razdel_dlya_invalidov_i_lic_s_ovz']);
    // раздел для инвалидов и лиц с ОВЗ

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/razdel-dlya-invalidov-i-lic-s-ovz-update', [AdminController::class, 'svedeniya_razdel_dlya_invalidov_i_lic_s_ovz_update']);

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/metodicheskie-razrabotki-obespechivayushchie-uchebnyj-process', [AdminController::class, 'svedeniya_metodicheskie_razrabotki_obespechivayushchie_uchebnyj_process']);
    // раздел для инвалидов и лиц с ОВЗ

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/metodicheskie-razrabotki-obespechivayushchie-uchebnyj-process-update', [AdminController::class, 'svedeniya_metodicheskie_razrabotki_obespechivayushchie_uchebnyj_process_update']);


    // Обращения через форму Напишите нам
    Route::get('/dashboard/feedbacks', [FeedbackController::class, 'index']);

    Route::get('/dashboard/feedbacks/{id}', [FeedbackController::class, 'show']);


    Route::get('/dashboard/learning-directions', [LearningDirectionController::class, 'index']);
    // Направления подготовки

    Route::get('/dashboard/learning-directions/create', [LearningDirectionController::class, 'create'])->name('learning-directions-create');

    Route::post('/dashboard/learning-directions/store', [LearningDirectionController::class, 'store'])->name('learning-directions-store');

    Route::get('/dashboard/learning-directions/{id}', [LearningDirectionController::class, 'show'])->name('learning-directions-show');

    Route::get('/dashboard/learning-directions/{id}/edit', [LearningDirectionController::class, 'edit'])->name('learning-directions-edit');

    Route::post('/dashboard/learning-directions/{id}/update', [LearningDirectionController::class, 'update'])->name('learning-directions-update');

    Route::get('/dashboard/learning-directions/{id}/destroy', [LearningDirectionController::class, 'destroy'])->name('learning-directions-destroy');


    // Главная страница секция Информация
    Route::get('/dashboard/information', [AdminController::class, 'information']);

    Route::post('/dashboard/information-update', [AdminController::class, 'information_update']);



    Route::post('/dashboard/tinyfileupload', [AdminController::class, 'tiny_file_upload']);

});




// Route::fallback([AdminController::class, 'dashboard_404']);