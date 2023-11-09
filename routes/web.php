<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\EiosController;

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

Route::get('/', [MainController::class, 'home'])->name('home');

Route::get('/o-kolledzhe/istoriya', [MainController::class, 'o_kolledzhe_istoriya']);
// о колледже история

Route::get('/o-kolledzhe/pedagogicheskij-sostav', [MainController::class, 'o_kolledzhe_pedagogicheskij_sostav']);
// о колледже педагогический состав

Route::get('/o-kolledzhe/otdeleniya/{slug}', [MainController::class, 'o_kolledzhe_single_otdelenie']);
// о колледже карточка отделения

Route::get('/o-kolledzhe/pedagogicheskij-sostav/{slug}', [MainController::class, 'o_kolledzhe_single_teacher']);
// о колледже карточка преподавателя

Route::get('/o-kolledzhe/kontakty', [MainController::class, 'o_kolledzhe_kontakty']);
// о колледже контакты

// студентам расписание
Route::get('/studentam-raspisanie', [MainController::class, 'studentam_raspisanie']);

// Студентам форма аттестации
Route::get('/studentam-attestation-form/{id}', [MainController::class, 'studentam_attestation_form']);

Route::get('/prepodavatelyam-makety', [MainController::class, 'prepodavatelyam_makety']);
// преподавателям макеты

Route::get('/prepodavatelyam-metodicheskie-rekomendacii', [MainController::class, 'prepodavatelyam_metodicheskie_rekomendacii']);
// преподавателям методические рекомендации

Route::get('/prepodavatelyam-spiski-studentov', [MainController::class, 'prepodavatelyam_spiski_studentov']);
// преподавателям списки студентов

Route::get('/abiturientu/napravleniya-podgotovki', [MainController::class, 'abiturientu_napravleniya_podgotovki']);
// абитуриенту направления подготовки

Route::get('/abiturientu/napravleniya-podgotovki/{slug}', [MainController::class, 'single_abiturientu_napravleniya_podgotovki']);
// абитуриенту направления подготовки карточка

Route::get('/abiturientu/podgotovitelnye-kursy', [MainController::class, 'abiturientu_podgotovitelnye_kursy']);
// абитуриенту подготовительные курсы

Route::get('/abiturientu/dokumenty', [MainController::class, 'abiturientu_dokumenty']);
// абитуриенту документы

Route::get('/abiturientu/podat-dokumenty', [MainController::class, 'abiturientu_podat_dokumenty']);
// абитуриенту подать документы

Route::post('/abiturientu/podat-dokumenty-add', [MainController::class, 'abiturientu_podat_dokumenty_add']);
// абитуриенту подать документы - обработка формы

Route::get('/abiturientu/rezultaty-vstupitelnyh-ispytanij', [MainController::class, 'abiturientu_rezultaty_vstupitelnyh_ispytanij']);
// абитуриенту результаты вступительных испытаний

Route::get('/konkursy', [MainController::class, 'konkursy']);
// конкурсы 

Route::get('/konkursy/{slug}', [MainController::class, 'single_konkurs']);
// конкурсы карточка конкурса

Route::get('/studencheskaya-zhizn/gazeta-pizzicato', [MainController::class, 'studencheskaya_zhizn_gazeta_pizzicato']);
// студенческая жизнь газета pizzicato

Route::get('/studencheskaya-zhizn/izdaniya', [MainController::class, 'studencheskaya_zhizn_izdaniya']);
// студенческая жизнь издания

Route::get('/studencheskaya-zhizn/izdaniya/{slug}', [MainController::class, 'single_studencheskaya_zhizn_izdaniya']);
// студенческая жизнь издания карточка

Route::get('/studencheskaya-zhizn/video', [MainController::class, 'studencheskaya_zhizn_video']);
// студенческая жизнь видео

Route::get('/studencheskaya-zhizn/kollektivy', [MainController::class, 'studencheskaya_zhizn_kollektivy']);
// студенческая жизнь коллективы

Route::get('/studencheskaya-zhizn/rossijskoe-dvizhenie-detej-i-molodezhi', [MainController::class, 'studencheskaya_zhizn_rossijskoe_dvizhenie_detej_i_molodezhi']);
// студенческая жизнь российское движение детей и молодежи

Route::get('/studencheskaya-zhizn/sportivnyj-klub-temp', [MainController::class, 'studencheskaya_zhizn_sportivnyj_klub_temp']);
// студенческая жизнь спортивный клуб Темп

Route::get('/studencheskaya-zhizn/vospitatelnaya-rabota', [MainController::class, 'studencheskaya_zhizn_vospitatelnaya_rabota']);
// студенческая жизнь воспитательная работа

Route::get('/studencheskaya-zhizn/volontery', [MainController::class, 'studencheskaya_zhizn_volontery']);
// студенческая жизнь волонтеры

Route::get('/studencheskaya-zhizn/media-centr-da-capo', [MainController::class, 'studencheskaya_zhizn_media_centr_da_capo']);
// студенческая жизнь медиа-центр Da Capo

Route::get('/dshi/rukovodstvo-i-pedsostav', [MainController::class, 'dshi_rukovodstvo_i_pedsostav']);
// детская школа искусств руководство и педсостав

Route::get('/dshi/postupayushchim', [MainController::class, 'dshi_postupayushchim']);
// детская школа искусств поступающим

Route::get('/dshi/platnye-obrazovatelnye-uslugi', [MainController::class, 'dshi_platnye_obrazovatelnye_uslugi']);
// детская школа искусств платные образовательные услуги

Route::get('/dshi/obrazovanie', [MainController::class, 'dshi_obrazovanie']);
// детская школа искусств образование

Route::get('/dshi/dokumenty', [MainController::class, 'dshi_dokumenty']);
// детская школа искусств документы

Route::get('/dshi/kontakty', [MainController::class, 'dshi_kontakty']);
// детская школа искусств контакты

Route::get('/centr-sodejstviya-trudoustrojstvu', [MainController::class, 'centr_sodejstviya_trudoustrojstvu']);
// центр содействия трудоустройству

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii', [MainController::class, 'svedeniya_ob_obrazovatelnoj_organizacii']);
// сведения об образовательной организации

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/osnovnye-svedeniya', [MainController::class, 'svedeniya_osnovnye_svedeniya']);
// основные сведения

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/struktura-i-organy-upravleniya-obrazovatelnoi-organizaciei', [MainController::class, 'struktura_i_organy_upravleniya_obrazovatelnoi_organizaciei']);
// структура и органы управления образовательной организацией

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/dokumenty', [MainController::class, 'svedeniya_dokumenty']);
// документы

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/dokumenty/uchreditelnye-dokumenty', [MainController::class, 'svedeniya_dokumenty_uchreditelnye_dokumenty']);
// учредительные документы

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/dokumenty/lokalnye-akty-dlya-obuchayushchihsya', [MainController::class, 'svedeniya_dokumenty_lokalnye_akty_dlya_obuchayushchihsya']);
// локальные акты для обучающихся

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/dokumenty/lokalnye-akty-dlya-sotrudnikov-i-prepodavatelej', [MainController::class, 'svedeniya_dokumenty_lokalnye_akty_dlya_sotrudnikov_i_prepodavatelej']);
// локальные акты для сотрудников и преподавателей

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/dokumenty/publichnye', [MainController::class, 'svedeniya_dokumenty_publichnye']);
// публичные

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie', [MainController::class, 'svedeniya_obrazovanie']);
// образование

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie-informaciya', [MainController::class, 'svedeniya_obrazovanie_informaciya']);
// образование информация

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie-annotacii-k-programmam-ppssz', [MainController::class, 'svedeniya_obrazovanie_annotacii_k_programmam_ppssz']);
// образование аннотации к программам ППССЗ

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie-uchebnye-plany', [MainController::class, 'svedeniya_obrazovanie_uchebnye_plany']);
// образование учебные планы

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie-kalendarnye-uchebnye-grafiki', [MainController::class, 'svedeniya_obrazovanie_kalendarnye_uchebnye_grafiki']);
// образование календарные учебные графики

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie-formy-promezhutochnoj-attestacii', [MainController::class, 'svedeniya_obrazovanie_formy_promezhutochnoj_attestacii']);
// формы промежуточной аттестации

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie-programmy-podgotovki-specialistov-srednego-zvena', [MainController::class, 'svedeniya_obrazovanie_programmy_podgotovki_specialistov_srednego_zvena']);
// программы подготовки специалистов среднего звена

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie-rabochie-programmy-i-fond-ocenochnyh-sredstv', [MainController::class, 'svedeniya_obrazovanie_rabochie_programmy_i_fond_ocenochnyh_sredstv']);
// рабочие программы и фонд оценочных средств

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/obrazovatelnye-standarty-i-trebovaniya', [MainController::class, 'svedeniya_obrazovatelnye_standarty']);
// образовательные стандарты

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/rukovodstvo-pedagogiceskii-naucno-pedagogiceskii-sostav', [MainController::class, 'rukovodstvo_pedagogiceskii_naucno_pedagogiceskii_sostav']);
// Руководство. Педагогический (научно-педагогический) состав

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/materialno-texniceskoe-obespecenie-i-osnashhennost-obrazovatelnogo-processa', [MainController::class, 'materialno_texniceskoe_obespecenie_i_osnashhennost_obrazovatelnogo_processa']);
// материально-техническое обеспечение и оснащенность образовательного процесса

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/stipendii-i-inye-vidy-materialnoi-podderzki', [MainController::class, 'stipendii_i_inye_vidy_materialnoi_podderzki']);
// стипендии и иные виды материальной поддержки

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/platnye-obrazovatelnye-uslugi', [MainController::class, 'svedeniya_platnye_obrazovatelnye_uslugi']);
// платные образовательные услуги

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/finansovo-xozyaistvennaya-deyatelnost', [MainController::class, 'svedeniya_finansovo_xozyaistvennaya_deyatelnost']);
// финансово-хозяйственная деятельность

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/vakantnye-mesta-dlya-priema-perevoda', [MainController::class, 'svedeniya_vakantnye_mesta_dlya_priema_perevoda']);
// вакантные места для приема (перевода)

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/dostupnaya-sreda', [MainController::class, 'svedeniya_dostupnaya_sreda']);
// доступная среда

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/mezdunarodnoe-sotrudnicestvo', [MainController::class, 'svedeniya_mezdunarodnoe_sotrudnicestvo']);
// международное сотрудничество

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/protivodejstvie-korrupcii', [MainController::class, 'svedeniya_protivodejstvie_korrupcii']);
// противодействие коррупции

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/razdel-dlya-invalidov-i-lic-s-ovz', [MainController::class, 'svedeniya_razdel_dlya_invalidov_i_lic_s_ovz']);
// раздел для инвалидов и лиц с ОВЗ

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/metodicheskie-razrabotki-obespechivayushchie-uchebnyj-process', [MainController::class, 'svedeniya_metodicheskie_razrabotki_obespechivayushchie_uchebnyj_process']);
// методические разработки, обеспечивающие учебный процесс

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie/obshchij-gumanitarnyj-i-socialno-ehkonomicheskij-cikl', [MainController::class, 'svedeniya_obrazovanie_obshchij_gumanitarnyj_i_socialno_ehkonomicheskij_cikl']);
// общий гуманитарный и социально-экономический цикл

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie/51-02-01-narodnoe-hudozhestvennoe-tvorchestvo', [MainController::class, 'svedeniya_obrazovanie_51_02_01_narodnoe_hudozhestvennoe_tvorchestvo']);
// 51.02.01 Народное художественное творчество

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie/obshcheprofessionalnye-discipliny', [MainController::class, 'svedeniya_obrazovanie_obshcheprofessionalnye_discipliny']);
// общепрофессиональные дисциплины

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie/53-02-00-instr-ispol-horov-dirizh-soln-i-horov-narod-penie-vok-iskusstvo', [MainController::class, 'svedeniya_obrazovanie_53_02_00_instr_ispol_horov_dirizh_soln_i_horov_narod_penie_vok_iskusstvo']);
// 53.02.00 Инстр.испол,,Хоров.дириж.,Сольн.и хоров.народ.пение,Вок.искусство

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie/53-02-03-fortepiano', [MainController::class, 'svedeniya_obrazovanie_53_02_03_fortepiano']);
// 53.02.03 Фортепиано

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie/53-02-05-solnoe-i-horovoe-narodnoe-penie', [MainController::class, 'svedeniya_obrazovanie_53_02_05_solnoe_i_horovoe_narodnoe_penie']);
// 53.02.05 Сольное и хоровое народное пение

Route::get('/metodicheskie-razrabotki-obespechivayushchie-uchebnyj-process/pck-fortepiano', [MainController::class, 'metodicheskie_razrabotki_pck_fortepiano']);
// ПЦК "Фортепиано"

Route::get('/metodicheskie-razrabotki-obespechivayushchie-uchebnyj-process/pck-instrumenty-narodnogo-orkestra', [MainController::class, 'metodicheskie_razrabotki_pck_instrumenty_narodnogo_orkestra']);
// ПЦК "Инструменты народного оркестра"

Route::get('/metodicheskie-razrabotki-obespechivayushchie-uchebnyj-process/pck-orkestrovye-strunnye-duhovye-i-udarnye-instrumenty', [MainController::class, 'metodicheskie_razrabotki_pck_orkestrovye_strunnye_duhovye_i_udarnye_instrumenty']);
// ПЦК "Оркестровые струнные, духовые и ударные инструменты"

Route::get('/metodicheskie-razrabotki-obespechivayushchie-uchebnyj-process/pck-horovoe-dirizhirovanie', [MainController::class, 'metodicheskie_razrabotki_pck_horovoe_dirizhirovanie']);
// ПЦК "Хоровое дирижирование"

Route::get('/metodicheskie-razrabotki-obespechivayushchie-uchebnyj-process/pck-solnoe-i-horovoe-narodnoe-penie', [MainController::class, 'metodicheskie_razrabotki_pck_solnoe_i_horovoe_narodnoe_penie']);
// ПЦК "Сольное и хоровое народное пение"

Route::get('/metodicheskie-razrabotki-obespechivayushchie-uchebnyj-process/pck-horeograficheskoe-tvorchestvo', [MainController::class, 'metodicheskie_razrabotki_pck_horeograficheskoe_tvorchestvo']);
// ПЦК "Хореографическое творчество"

Route::get('/metodicheskie-razrabotki-obespechivayushchie-uchebnyj-process/pck-muzykalno-teoreticheskie-discipliny', [MainController::class, 'metodicheskie_razrabotki_pck_muzykalno_teoreticheskie_discipliny']);
// ПЦК "Музыкально-теоретические дисциплины"

Route::get('/metodicheskie-razrabotki-obespechivayushchie-uchebnyj-process/pck-obshchie-gumanitarnye-i-socialno-ehkonomicheskie-discipliny', [MainController::class, 'metodicheskie_razrabotki_pck_obshchie_gumanitarnye_i_socialno_ehkonomicheskie_discipliny']);
// ПЦК "Общие гуманитарные и социально-экономические дисциплины"

Route::get('/metodicheskie-razrabotki-obespechivayushchie-uchebnyj-process/pk-fortepiano-raznyh-specialnostej', [MainController::class, 'metodicheskie_razrabotki_pk_fortepiano_raznyh_specialnostej']);
// ПК "Фортепиано разных специальностей"

Route::get('/kalendar-studenta-archive', [MainController::class, 'kalendar_studenta_archive']);
// календарь студента архив

Route::get('/kalendar-studenta-archive-{year}', [MainController::class, 'kalendar_studenta_archive_year']);
// календарь студента архив год

Route::get('/kalendar-studenta/{slug}', [MainController::class, 'single_kalendar_studenta']);
// календарь студента карточка

Route::get('/afisha-archive', [MainController::class, 'afisha_archive']);
// афиша архив

Route::get('/afisha-archive-{year}', [MainController::class, 'afisha_archive_year']);
// афиша архив год

Route::get('/afisha/{slug}', [MainController::class, 'single_afisha']);
// афиша карточка

Route::get('/news-archive', [MainController::class, 'news_archive']);
// архив новостей

Route::get('/news-archive-{year}', [MainController::class, 'news_archive_year']);
// архив новостей год

Route::get('/news/{slug}', [MainController::class, 'single_news'])->name('single-news');
// карточка новости

// Обратная связь Напишите нам
Route::get('/feedback', [MainController::class, 'feedback']);

Route::post('/feedback-store', [MainController::class, 'feedback_store']);

Route::get('/politika-konfidencialnosti', [MainController::class, 'politika_konfidencialnosti']);

require __DIR__.'/auth.php';

// Админ панель
/*
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

    // Учеба студентам форма аттестации
    Route::get('/dashboard/studentam-attestation-form', [AdminController::class, 'studentam_attestation_form']);

    // Учеба студентам форма аттестации обновление
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

    Route::get('/dashboard/prepodavatelyam-makety', [AdminController::class, 'prepodavatelyam_makety']);

    Route::post('/dashboard/prepodavatelyam-makety/add', [AdminController::class, 'prepodavatelyam_makety_add']);

    Route::get('/dashboard/prepodavatelyam-makety/del/{id}', [AdminController::class, 'prepodavatelyam_makety_del']);

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

    // Абитуриенту направления подготовки
    Route::get('/dashboard/abiturientu-napravleniya-podgotovki', [AbiturientuNapravleniyaPodgotovkiController::class, 'index']);

    Route::get('/dashboard/abiturientu-napravleniya-podgotovki/{id}/edit', [AbiturientuNapravleniyaPodgotovkiController::class, 'edit'])->name('dashboard.abiturientu-napravleniya-podgotovki-edit');

    Route::post('/dashboard/abiturientu-napravleniya-podgotovki/{id}/update', [AbiturientuNapravleniyaPodgotovkiController::class, 'update'])->name('dashboard.abiturientu-napravleniya-podgotovki-update');


    Route::get('/dashboard/abiturientu-podgotovitelnye-kursy', [AdminController::class, 'abiturientu_podgotovitelnye_kursy']);

    Route::post('/dashboard/abiturientu-podgotovitelnye-kursy-update', [AdminController::class, 'abiturientu_podgotovitelnye_kursy_update']);

    Route::get('/dashboard/abiturientu-dokumenty', [AdminController::class, 'abiturientu_dokumenty']);

    Route::get('/dashboard/abiturientu-dokumenty/del/{id}', [AdminController::class, 'abiturientu_dokumenty_del']);

    Route::post('/dashboard/abiturientu-dokumenty/add', [AdminController::class, 'abiturientu_dokumenty_add']);

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

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/osnovnye-svedeniya', [AdminController::class, 'svedeniya_osnovnye_svedeniya']);
    // основные сведения

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/osnovnye-svedeniya-update', [AdminController::class, 'svedeniya_osnovnye_svedeniya_update']);

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/struktura-i-organy-upravleniya-obrazovatelnoi-organizaciei', [AdminController::class, 'svedeniya_struktura_i_organy_upravleniya_obrazovatelnoi_organizaciei']);
    // структура и органы управления образовательной организацией

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/struktura-i-organy-upravleniya-obrazovatelnoi-organizaciei-update', [AdminController::class, 'svedeniya_struktura_i_organy_upravleniya_obrazovatelnoi_organizaciei_update']);

    Route::get('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/dokumenty', [AdminController::class, 'svedeniya_dokumenty']);
    // документы

    Route::post('/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/dokumenty-update', [AdminController::class, 'svedeniya_dokumenty_update']);

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

    // Route::get('/dashboard/pedagogicheskij-sostav-dokumenty/{id}', [PsDokumentyController::class, 'show'])->name('pedagogicheskij-sostav-dokumenty-show');

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



    Route::get('/dashboard/learning-directions', [LearningDirectionController::class, 'index']);
    // Направления подготовки

    Route::get('/dashboard/learning-directions/create', [LearningDirectionController::class, 'create'])->name('learning-directions-create');

    Route::post('/dashboard/learning-directions/store', [LearningDirectionController::class, 'store'])->name('learning-directions-store');

    Route::get('/dashboard/learning-directions/{id}', [LearningDirectionController::class, 'show'])->name('learning-directions-show');

    Route::get('/dashboard/learning-directions/{id}/edit', [LearningDirectionController::class, 'edit'])->name('learning-directions-edit');

    Route::post('/dashboard/learning-directions/{id}/update', [LearningDirectionController::class, 'update'])->name('learning-directions-update');

    Route::get('/dashboard/learning-directions/{id}/destroy', [LearningDirectionController::class, 'destroy'])->name('learning-directions-destroy');

    Route::post('/dashboard/tinyfileupload', [AdminController::class, 'tiny_file_upload']);

});
*/

// ЭИОС
Route::middleware(['auth'])->group(function () {
    
    Route::get('/eios', [EiosController::class, 'eios']);

    Route::get('/eios/bank-studencheskih-rabot', [EiosController::class, 'bank_studencheskih_rabot']);

    Route::get('/eios/metodicheskie-materialy-i-programmy', [EiosController::class, 'metodicheskie_materialy_i_programmy']);

    Route::get('/eios/portfolio', [EiosController::class, 'portfolio']);

    Route::get('/eios/informacionnye-ehlektronnye-obrazovatelnye-resursy', [EiosController::class, 'informacionnye_ehlektronnye_obrazovatelnye_resursy']);

    Route::get('/eios/rezultaty-osvoeniya-obrazovatelnoj-programmy', [EiosController::class, 'rezultaty_osvoeniya_obrazovatelnoj_programmy']);
});



// temp
Route::get('/temp/mainnews-update', [MainController::class, 'mainnews_update']);

Route::get('/temp/afishas-update', [MainController::class, 'afishas_update']);

Route::get('/temp/calendar-update', [MainController::class, 'calendar_update']);

// Перемещение галереи из таблицы mainnews в таблицу mainews_galleries
Route::get('/temp/mainnews-gallery-update', [MainController::class, 'mainnews_gallery_update']);


Route::fallback([AdminController::class, 'dashboard_404']);