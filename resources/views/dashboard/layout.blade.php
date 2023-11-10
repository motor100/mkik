<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Панель управления | @yield('title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">
  <link rel="stylesheet" href="{{ asset('/admin/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/admin/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/admin/css/overlayscrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/admin/css/air-datepicker.css') }}">
  @vite(['resources/sass/dashboard.scss'])
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="header main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/dashboard" class="nav-link">Главная</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/reviews">
            <i class="far fa-comments"></i>
            <span id="reviews-counter" class="badge badge-danger navbar-badge"></span>
          </a>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/anteroom-commission">
            <i class="far fa-bell"></i>
            @if($abit_count > 0)
              <span id="abit-counter" class="badge badge-warning navbar-badge">{{ $abit_count }}</span>
            @endif            
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
            <div class="image">
              <img src="/admin/img/user-icon.jpg" class="img-circle elevation-2" alt="">
            </div>
            <span class="user-name">{{ Auth::user()->name }}</span>
          </a>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <div class="logo">
        <a href="{{ route('home') }}" class="brand-link">
          <img src="/admin/img/logo.jpg" alt="" class="logo-img brand-image img-circle elevation-3">
          <span class="brand-name brand-text font-weight-light">МГКИиК</span>
        </a>
      </div>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item menu-item">
              <a href="/dashboard/news" class="nav-link">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>Новости
                </p>
              </a>
            </li>

            <li class="nav-item menu-item">
              <a href="/dashboard/afisha" class="nav-link">
                <i class="nav-icon fas fa-music"></i>
                <p>Афиша
                </p>
              </a>
            </li>

            <li class="nav-item menu-item">
              <a href="/dashboard/kalendar-studenta" class="nav-link">
                <i class="nav-icon fas fa-calendar"></i>
                <p>Календарь студента
                </p>
              </a>
            </li>

            <li class="nav-item menu-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book-open"></i>
                <p>
                  Учеба
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/dashboard/studentam-raspisanie" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Студентам Расписание</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/studentam-attestation-form" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Студентам Форма аттестации</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/studentam-gia" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Студентам ГИА</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/studentam-grafik-uchebnogo-processa" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Студентам График учебного процесса</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/studentam-zayavleniya" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Студентам Заявления</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/studentam-metodicheskie-rekomendacii" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Студентам Методические рекомендации</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/studentam-polozheniya" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Студентам Положения</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/prepodavatelyam-makety" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Преподавателям Макеты</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/prepodavatelyam-metodicheskie-rekomendacii" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Преподавателям Методические рекомендации</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/prepodavatelyam-spiski-studentov" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Преподавателям Списки студентов</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item menu-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-child"></i>
                <p>
                  Абитуриенту
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/dashboard/abiturientu-napravleniya-podgotovki" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Направления подготовки</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/abiturientu-podgotovitelnye-kursy" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Подготовительные курсы</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/abiturientu-dokumenty" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Документы</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/abiturientu-rezultaty-vstupitelnyh-ispytanij" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Результаты вступительных испытаний</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item menu-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-star"></i>
                <p>
                  Конкурсы
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/dashboard/konkursy" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Добавить конкурс</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/konkursy-dokumenty" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Документы</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item menu-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-paint-brush"></i>
                <p>
                  Студенческая жизнь
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/dashboard/studencheskaya-zhizn-gazeta-pizzicato" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Газета Pizzicato</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/studencheskaya-zhizn-izdaniya" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Издания</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/studencheskaya-zhizn-video" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Видео</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/studencheskaya-zhizn-kollektivy" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Коллективы</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/studencheskaya-zhizn-rossijskoe-dvizhenie-detej-i-molodezhi" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Российское движение детей и молодежи</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/studencheskaya-zhizn-sportivnyj-klub-temp" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Спортивный клуб Темп</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/studencheskaya-zhizn-vospitatelnaya-rabota" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Воспитательная работа</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/studencheskaya-zhizn-volontery" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Волонтеры</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/studencheskaya-zhizn-media-centr-da-capo" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Медиа-центр Da Capo</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item menu-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-school"></i>
                <p>
                  ДШИ
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/dashboard/dshi-rukovodstvo-i-pedsostav" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Руководство и педсостав</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/dshi-postupayushchim" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Поступающим</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/dshi-platnye-obrazovatelnye-uslugi" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Платные услуги</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/dshi-obrazovanie" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Образование</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/dshi-dokumenty" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Документы</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/dshi-kontakty" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Контакты</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item menu-item">
              <a href="/dashboard/prepodavateli" class="nav-link">
                <i class="nav-icon fas fa-user-friends"></i>
                <p>Преподаватели
                </p>
              </a>
            </li>

            <li class="nav-item menu-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-globe"></i>
                <p>
                  ЭИОС
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/dashboard/eios-bank-studencheskih-rabot" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Банк студенческих работ</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/eios-portfolio" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Портфолио</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/eios-informacionnye-ehlektronnye-obrazovatelnye-resursy" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Образовательные ресурсы</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/eios-rezultaty-osvoeniya-obrazovatelnoj-programmy" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Результаты освоения программы</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/eios-metodicheskie-materialy-i-programmy" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Методические материалы и программы</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item menu-item">
              <a href="/dashboard/anteroom-commission" class="nav-link">
                <i class="nav-icon fas fa-chart-line"></i>
                <p>Приемная комиссия
                </p>
              </a>
            </li>

            <li class="nav-item menu-item">
              <a href="/dashboard/centr-sodejstviya-trudoustrojstvu" class="nav-link">
                <i class="nav-icon fas fa-info-circle"></i>
                <p>Центр содействия трудоустройству
                </p>
              </a>
            </li>

            <li class="nav-item menu-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-info-circle"></i>
                <p>
                  Сведения об образовательной организации
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/osnovnye-svedeniya" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Основные сведения</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/struktura-i-organy-upravleniya-obrazovatelnoi-organizaciei" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Структура и органы управления образовательной организацией</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/dokumenty" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Документы</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Образование</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie-informaciya" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Образование Информация</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie-annotacii-k-programmam-ppssz" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Образование Аннотации к программам ППССЗ</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie-uchebnye-plany" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Образование Учебные планы</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/kalendarnye-uchebnye-grafiki" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Образование Календарные учебные графики</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/formy-promezhutochnoj-attestacii" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Образование Формы промежуточной аттестации</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/programmy-podgotovki-specialistov-srednego-zvena" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Образование Программы подготовки специалистов среднего звена</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/obrazovanie-rabochie-programmy-i-fond-ocenochnyh-sredstv" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Образование Рабочие программы и фонд оценочных средств</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/obrazovatelnye-standarty-i-trebovaniya" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Образовательные стандарты</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/materialno-texniceskoe-obespecenie-i-osnashhennost-obrazovatelnogo-processa" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Материально-техническое обеспечение и оснащенность образовательного процесса</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/stipendii-i-inye-vidy-materialnoi-podderzki" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Стипендии и иные виды материальной поддержки</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/pedagogicheskij-sostav-dokumenty" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Педагогический состав документы</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/platnye-obrazovatelnye-uslugi" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Платные образовательные услуги</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/finansovo-xozyaistvennaya-deyatelnost" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Финансово-хозяйственная деятельность</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/vakantnye-mesta-dlya-priema-perevoda" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Вакантные места для приема (перевода)</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/dostupnaya-sreda" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Доступная среда</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/mezdunarodnoe-sotrudnicestvo" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Международное сотрудничество</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/razdel-dlya-invalidov-i-lic-s-ovz" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Раздел для инвалидов и лиц с ОВЗ</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/metodicheskie-razrabotki-obespechivayushchie-uchebnyj-process" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Методические разработки, обеспечивающие учебный процесс</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/protivodejstvie-korrupcii" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Противодействие коррупции</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item menu-item">
              <a href="/dashboard/feedbacks" class="nav-link">
                <i class="nav-icon fas fa-comments"></i>
                <p>Обращения
                </p>
              </a>
            </li>

            <li class="nav-item menu-item">
              <a href="/dashboard/learning-directions" class="nav-link">
                <i class="nav-icon fa fa-arrow-right"></i>
                <p>Направления подготовки
                </p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <div class="content-header mb-2">
        <div class="container-fluid">
          <h1 class="m-0">@yield('title')</h1>
        </div>
      </div>

      @yield('dashboardcontent')

    </div>

    <!-- footer -->
    <footer class="footer">
      
    </footer>

    <aside class="control-sidebar control-sidebar-dark"></aside>
  </div>

  @yield('script')
  <script src="{{ asset('/admin/js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('/admin/js/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('/admin/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/admin/js/summernote-bs4.min.js') }}"></script>
  <script src="{{ asset('/admin/js/jquery.overlayScrollbars.min.js') }}"></script>
  <script src="{{ asset('/admin/js/adminlte.js') }}"></script>
  <script src="{{ asset('/admin/js/demo.js') }}"></script>
  <script src="{{ asset('/admin/js/air-datepicker.js') }}"></script>
  @vite(['resources/js/dashboard.js'])
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
</body>
</html>