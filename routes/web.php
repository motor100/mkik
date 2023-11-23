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

// Учеба Преподавателям макеты
Route::get('/ucheba-prepodavatelyam-makety', [MainController::class, 'ucheba_prepodavatelyam_makety']);

Route::get('/prepodavatelyam-metodicheskie-rekomendacii', [MainController::class, 'prepodavatelyam_metodicheskie_rekomendacii']);
// преподавателям методические рекомендации

// Учеба Издания
Route::get('/ucheba/izdaniya', [MainController::class, 'ucheba_izdaniya']);

// Учеба Издания карточка
Route::get('/ucheba/izdaniya/{slug}', [MainController::class, 'ucheba_izdaniya_inner']);

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

// ДШИ Образование
Route::get('/dshi/obrazovanie', [MainController::class, 'dshi_obrazovanie']);

Route::get('/dshi/dokumenty/{subcat}', [MainController::class, 'dshi_dokumenty_inner']);

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


// Сведения Документы
Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/dokumenty', [MainController::class, 'svedeniya_dokumenty']);

Route::get('/svedeniya-ob-obrazovatelnoj-organizacii/dokumenty/{subcat}', [MainController::class, 'svedeniya_dokumenty_inner']);


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

Route::get('/pravila-na-obrabotku-personalnyh-dannyh', [MainController::class, 'pravila_na_obrabotku_personalnyh_dannyh']);

require __DIR__.'/auth.php';

// ЭИОС
Route::middleware(['auth'])->group(function () {
    
    Route::get('/eios', [EiosController::class, 'eios']);

    Route::get('/eios/bank-studencheskih-rabot', [EiosController::class, 'bank_studencheskih_rabot']);

    Route::get('/eios/metodicheskie-materialy-i-programmy', [EiosController::class, 'metodicheskie_materialy_i_programmy']);

    Route::get('/eios/portfolio', [EiosController::class, 'portfolio']);

    Route::get('/eios/informacionnye-ehlektronnye-obrazovatelnye-resursy', [EiosController::class, 'informacionnye_ehlektronnye_obrazovatelnye_resursy']);

    Route::get('/eios/rezultaty-osvoeniya-obrazovatelnoj-programmy', [EiosController::class, 'rezultaty_osvoeniya_obrazovatelnoj_programmy']);
});

Route::fallback([AdminController::class, 'dashboard_404']);