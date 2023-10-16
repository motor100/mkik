<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">
  <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bvi.css') }}">
  @yield('style')
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <title>
    <?= isset($page_title) ? $page_title : "Миасский государственный колледж искусства и культуры"; ?>
  </title>
</head>
<body>
  <header class="header">
    <div class="top">
      <div class="container">
        <div class="logo-wrapper">
          <div class="logo">
            <a href="{{ route('home') }}">
              <img src="/img/logo.png" alt="">
            </a>
          </div>
          <div class="title-wrapper">
            <div class="subtitle hidden-mobile">Государственное бюджетное профессиональное образовательное учреждение Челябинской области</div>
            <div class="title">Миасский государственный колледж искусства и культуры</div>
            <div class="subtitle hidden-desktop">Государственное бюджетное профессиональное образовательное учреждение Челябинской области</div>
          </div>
          <div class="bvi-text bvi-open hidden-desktop">Версия для слабовидящих</div>
      </div>
        </div>
      </div>
    </div>
    <div class="top-nav-menu hidden-mobile">
      <div class="container">
        <ul class="top-menu">
          <li class="menu-item menu-item-has-children">
            <span class="menu-item__text">О колледже</span>  
            <ul class="sub-menu">
              <li class="sub-menu-item">
                <a href="/o-kolledzhe/istoriya">История</a>
              </li>
              <li class="sub-menu-item">
                <a href="/o-kolledzhe/pedagogicheskij-sostav">Педагогический состав</a>
              </li>
              <li class="sub-menu-item">
                <a href="/o-kolledzhe/kontakty">Контакты</a>
              </li>
            </ul>
          </li>
          <li class="menu-item menu-item-has-children">
            <span class="menu-item__text">Учеба</span>
            <ul class="sub-menu">
              <li class="sub-menu-item">
                <a href="/studentam-raspisanie">Студентам</a>
              </li>
              <li class="sub-menu-item">
                <a href="/prepodavatelyam-makety">Бланки/макеты<br>преподавателям</a>
              </li>
              <li class="sub-menu-item">
                <a href="/prepodavatelyam-metodicheskie-rekomendacii">Метод. рекомендации<br>преподавателям</a>
              </li>
              <li class="sub-menu-item">
                <a href="https://poo.edu-74.ru/security/#/login" target="_blank">Сетевой город</a>
              </li>
              <li class="sub-menu-item">
                <a href="/prepodavatelyam-spiski-studentov">Списки студентов</a>
              </li>
            </ul>
          </li>
          <li class="menu-item menu-item-has-children">
            <span class="menu-item__text">Абитуриенту</span>
            <ul class="sub-menu">
              <li class="sub-menu-item">
                <a href="/abiturientu/napravleniya-podgotovki">Направления подготовки</a>
              </li>
              <li class="sub-menu-item">
                <a href="/abiturientu/podgotovitelnye-kursy">Подготовительные курсы</a>
              </li>
              <li class="sub-menu-item">
                <a href="/abiturientu/dokumenty">Документы</a>
              </li>
              <li class="sub-menu-item">
                <a href="/abiturientu/podat-dokumenty">Подать документы</a>
              </li>
              <li class="sub-menu-item">
                <a href="/abiturientu/rezultaty-vstupitelnyh-ispytanij">Результаты вступительных испытаний</a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="/konkursy" class="menu-item__text">Конкурсы</a>
          </li>
          <li class="menu-item menu-item-has-children">
            <span class="menu-item__text">Студенческая жизнь</span>
            <ul class="sub-menu">
              <li class="sub-menu-item">
                <a href="/studencheskaya-zhizn/gazeta-pizzicato">Газета Pizzicato</a>
              </li>
              <li class="sub-menu-item">
                <a href="/studencheskaya-zhizn/izdaniya">Издания</a>
              </li>
              <li class="sub-menu-item">
                <a href="/studencheskaya-zhizn/video">Видео</a>
              </li>

              <li class="sub-menu-item">
                <a href="/studencheskaya-zhizn/kollektivy">Коллективы</a>
              </li>
              <li class="sub-menu-item">
                <a href="/studencheskaya-zhizn/rossijskoe-dvizhenie-detej-i-molodezhi">Российское движение детей и молодежи</a>
              </li>
              <li class="sub-menu-item">
                <a href="/studencheskaya-zhizn/sportivnyj-klub-temp">Спортивный клуб Темп</a>
              </li>
              <li class="sub-menu-item">
                <a href="/studencheskaya-zhizn/vospitatelnaya-rabota">Воспитательная работа</a>
              </li>
              <li class="sub-menu-item">
                <a href="/studencheskaya-zhizn/volontery">Волонтеры</a>
              </li>
              <li class="sub-menu-item">
                <a href="/studencheskaya-zhizn/media-centr-da-capo">Медиа-центр Da Capo</a>
              </li>

            </ul>
          </li>
          <li class="menu-item menu-item-has-children">
            <span class="menu-item__text">ДШИ</span>
            <ul class="sub-menu">
              <li class="sub-menu-item">
                <a href="/dshi/rukovodstvo-i-pedsostav">Руководство и педсостав</a>
              </li>
              <li class="sub-menu-item">
                <a href="/dshi/postupayushchim">Поступающим</a>
              </li>
              <li class="sub-menu-item">
                <a href="/dshi/platnye-obrazovatelnye-uslugi">Платные образовательные услуги</a>
              </li>
              <li class="sub-menu-item">
                <a href="/dshi/obrazovanie">Образование</a>
              </li>
              <li class="sub-menu-item">
                <a href="/dshi/dokumenty">Документы</a>
              </li>
              <li class="sub-menu-item">
                <a href="/dshi/kontakty">Контакты</a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="/login" class="menu-item__text">ЭИОС Войти</a>
          </li>
        </ul>
      </div>
    </div>
  </header>

  <div class="required-links hidden-mobile">
    <div class="container">
      <div class="links">
        <a href="/centr-sodejstviya-trudoustrojstvu">Центр содействия трудоустройству</a>
        <a href="/svedeniya-ob-obrazovatelnoj-organizacii">Сведения об образовательной организации</a>
        <span class="glasses bvi-open">
          <img src="/img/glasses.svg" class="glasses__image" alt="">
          <span class="glasses__text">Версия для слабовидящих</span>
        </span>
      </div>
    </div>
  </div>

  @yield('content')

  <footer class="footer">
    <div class="top">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-lg-3 order-md-3">
            <div class="contacts">
              <div class="item">
                <div class="icon">
                  <img src="/img/geolocation-icon.svg" alt="">
                </div>
                <div class="text address">456316 г. Миасс,<br>ул. Орловская 11</div>
              </div>
            </div>
            <div class="phones">
              <div class="item">
                <div class="icon">
                  <img src="/img/phone-icon-strong.svg" alt="">
                </div>
                <div class="text">
                  <span class="text-bold">8 (3513) 55-29-17</span>
                </div>
              </div>
            </div>
            <div class="email">
              <div class="item">
                <div class="icon">
                  <img src="/img/letter-icon.svg" alt="">
                </div>
                <div class="text">
                  <span class="text-bold">mkik@yandex.ru</span>
                </div>
              </div>
            </div>
            <div class="info">
              <div class="item">Лицензия<br>№13117 от 01.09.2016г</div>
              <div class="item">Свидетельство<br>№2957 от 01.04.2019г</div>
            </div>
          </div>
          <div class="col-md-4 col-lg-3">
            <ul class="bottom-menu">
              <li class="menu-item menu-item-has-children">
                <span class="menu-item__text">О колледже</span>
                <ul class="sub-menu">
                  <li class="sub-menu-item">
                    <a href="/o-kolledzhe/istoriya">История</a>
                  </li>
                  <li class="sub-menu-item">
                    <a href="/o-kolledzhe/pedagogicheskij-sostav">Педагогический состав</a>
                  </li>
                  <li class="sub-menu-item">
                    <a href="/o-kolledzhe/kontakty">Контакты</a>
                  </li>
                </ul>
              </li>
              <li class="menu-item menu-item-has-children">
                <span class="menu-item__text">Учеба</span>
                <ul class="sub-menu">
                  <li class="sub-menu-item">
                    <a href="/studentam-raspisanie">Студентам</a>
                  </li>
                  <li class="sub-menu-item">
                    <a href="/prepodavatelyam-makety">Бланки/макеты<br>преподавателям</a>
                  </li>
                  <li class="sub-menu-item">
                    <a href="/prepodavatelyam-metodicheskie-rekomendacii">Метод. рекомендации<br>преподавателям</a>
                  </li>
                  <li class="sub-menu-item">
                    <a href="https://poo.edu-74.ru/security/#/login" target="_blank">Сетевой город</a>
                  </li>
                  <li class="sub-menu-item">
                    <a href="/prepodavatelyam-spiski-studentov">Списки студентов</a>
                  </li>
                </ul>
              </li>
              <li class="menu-item menu-item-has-children">
                <span class="menu-item__text">Абитуриенту</span>
                <ul class="sub-menu">
                  <li class="sub-menu-item">
                    <a href="/abiturientu/napravleniya-podgotovki">Направления подготовки</a>
                  </li>
                  <li class="sub-menu-item">
                    <a href="/abiturientu/podgotovitelnye-kursy">Подготовительные курсы</a>
                  </li>
                  <li class="sub-menu-item">
                    <a href="/abiturientu/dokumenty">Документы</a>
                  </li>
                  <li class="sub-menu-item">
                    <a href="/abiturientu/podat-dokumenty">Подать документы</a>
                  </li>
                  <li class="sub-menu-item">
                    <a href="/abiturientu/rezultaty-vstupitelnyh-ispytanij">Результаты вступительных испытаний</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="bottom-menu">
              <li class="menu-item menu-item-has-children">
                <span class="menu-item__text">Студенческая жизнь</span>
                <ul class="sub-menu">
                  <li class="sub-menu-item">
                    <a href="/studencheskaya-zhizn/gazeta-pizzicato">Газета Pizzicato</a>
                  </li>
                  <li class="sub-menu-item">
                    <a href="/studencheskaya-zhizn/izdaniya">Издания</a>
                  </li>
                  <li class="sub-menu-item">
                    <a href="/studencheskaya-zhizn/video">Видео</a>
                  </li>
                  <li class="sub-menu-item">
                    <a href="/studencheskaya-zhizn/kollektivy">Коллективы</a>
                  </li>
                  <li class="sub-menu-item">
                    <a href="/studencheskaya-zhizn/rossijskoe-dvizhenie-detej-i-molodezhi">Российское движение детей и молодежи</a>
                  </li>
                  <li class="sub-menu-item">
                    <a href="/studencheskaya-zhizn/sportivnyj-klub-temp">Спортивный клуб Темп</a>
                  </li>
                  <li class="sub-menu-item">
                    <a href="/studencheskaya-zhizn/vospitatelnaya-rabota">Воспитательная работа</a>
                  </li>
                  <li class="sub-menu-item">
                    <a href="/studencheskaya-zhizn/volontery">Волонтеры</a>
                  </li>
                  <li class="sub-menu-item">
                    <a href="/studencheskaya-zhizn/media-centr-da-capo">Медиа-центр Da Capo</a>
                  </li>
                </ul>
              </li>
              <li class="menu-item menu-item-has-children">
                <span class="menu-item__text">ДШИ</span>
                <ul class="sub-menu">
                  <li class="sub-menu-item">
                    <a href="/dshi/rukovodstvo-i-pedsostav">Руководство и педсостав</a>
                  </li>
                  <li class="sub-menu-item">
                    <a href="/dshi/postupayushchim">Поступающим</a>
                  </li>
                  <li class="sub-menu-item">
                    <a href="/dshi/platnye-obrazovatelnye-uslugi">Платные образовательные услуги</a>
                  </li>
                  <li class="sub-menu-item">
                    <a href="/dshi/obrazovanie">Образование</a>
                  </li>
                  <li class="sub-menu-item">
                    <a href="/dshi/dokumenty">Документы</a>
                  </li>
                  <li class="sub-menu-item">
                    <a href="/dshi/kontakty">Контакты</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="col-md-2 d-none d-lg-block order-last">
            <div class="qr-code hidden-mobile">
              <img src="/img/qr-code.svg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bottom">
      <div class="container">
        <div class="item">
          <a href="/politika-konfidencialnosti">Политика конфиденциальности</a>
        </div>
        <div class="item">2011-<?php echo date("Y"); ?></div>
        <div class="item">
          <a href="https://mybutton.ru" target="_blank">Сайт сделан студией Button</a>
        </div>
      </div>
    </div>
  </footer>

  <div class="burger-menu-wrapper hidden-desktop">
    <div class="burger-menu__text">Открыть меню</div>
  </div>
  <div class="mobile-menu hidden-desktop">
    <ul class="menu">
      <li class="menu-item menu-item-has-children">
        <span class="menu-item__text">О колледже</span>
        <ul class="sub-menu">
          <li class="sub-menu-item">
            <a href="/o-kolledzhe/istoriya">История</a>
          </li>
          <li class="sub-menu-item">
            <a href="/o-kolledzhe/pedagogicheskij-sostav">Педагогический состав</a>
          </li>
          <li class="sub-menu-item">
            <a href="/o-kolledzhe/kontakty">Контакты</a>
          </li>
        </ul>
      </li>
      <li class="menu-item menu-item-has-children">
        <span class="menu-item__text">Учеба</span>
        <ul class="sub-menu">
          <li class="sub-menu-item">
            <a href="/studentam-raspisanie">Студентам</a>
          </li>
          <li class="sub-menu-item">
            <a href="/prepodavatelyam-makety">Бланки/макеты<br>преподавателям</a>
          </li>
          <li class="sub-menu-item">
            <a href="/prepodavatelyam-metodicheskie-rekomendacii">Метод. рекомендации<br>преподавателям</a>
          </li>
          <li class="sub-menu-item">
            <a href="https://poo.edu-74.ru/security/#/login" target="_blank">Сетевой город</a>
          </li>
          <li class="sub-menu-item">
            <a href="/prepodavatelyam-spiski-studentov">Списки студентов</a>
          </li>
        </ul>
      </li>
      <li class="menu-item menu-item-has-children">
        <span class="menu-item__text">Абитуриенту</span>
        <ul class="sub-menu">
          <li class="sub-menu-item">
            <a href="/abiturientu/napravleniya-podgotovki">Направления подготовки</a>
          </li>
          <li class="sub-menu-item">
            <a href="/abiturientu/podgotovitelnye-kursy">Подготовительные курсы</a>
          </li>
          <li class="sub-menu-item">
            <a href="/abiturientu/dokumenty">Документы</a>
          </li>
          <li class="sub-menu-item">
            <a href="/abiturientu/podat-dokumenty">Подать документы</a>
          </li>
          <li class="sub-menu-item">
            <a href="/abiturientu/rezultaty-vstupitelnyh-ispytanij">Результаты вступительных испытаний</a>
          </li>
        </ul>
      </li>
      <li class="menu-item">
        <a href="/konkursy" class="menu-item__text">Конкурсы</a>
      </li>
      <li class="menu-item menu-item-has-children">
        <span class="menu-item__text">Студенческая жизнь</span>
        <ul class="sub-menu">
          <li class="sub-menu-item">
            <a href="/studencheskaya-zhizn/gazeta-pizzicato">Газета Pizzicato</a>
          </li>
          <li class="sub-menu-item">
            <a href="/studencheskaya-zhizn/izdaniya">Издания</a>
          </li>
          <li class="sub-menu-item">
            <a href="/studencheskaya-zhizn/video">Видео</a>
          </li>
          <li class="sub-menu-item">
            <a href="/studencheskaya-zhizn/kollektivy">Коллективы</a>
          </li>
          <li class="sub-menu-item">
            <a href="/studencheskaya-zhizn/rossijskoe-dvizhenie-detej-i-molodezhi">Российское движение детей и молодежи</a>
          </li>
          <li class="sub-menu-item">
            <a href="/studencheskaya-zhizn/sportivnyj-klub-temp">Спортивный клуб Темп</a>
          </li>
          <li class="sub-menu-item">
            <a href="/studencheskaya-zhizn/vospitatelnaya-rabota">Воспитательная работа</a>
          </li>
          <li class="sub-menu-item">
            <a href="/studencheskaya-zhizn/volontery">Волонтеры</a>
          </li>
          <li class="sub-menu-item">
            <a href="/studencheskaya-zhizn/media-centr-da-capo">Медиа-центр Da Capo</a>
          </li>
        </ul>
      </li>
      <li class="menu-item menu-item-has-children">
        <span class="menu-item__text">ДШИ</span>
        <ul class="sub-menu">
          <li class="sub-menu-item">
            <a href="/dshi/rukovodstvo-i-pedsostav">Руководство и педсостав</a>
          </li>
          <li class="sub-menu-item">
            <a href="/dshi/postupayushchim">Поступающим</a>
          </li>
          <li class="sub-menu-item">
            <a href="/dshi/platnye-obrazovatelnye-uslugi">Платные образовательные услуги</a>
          </li>
          <li class="sub-menu-item">
            <a href="/dshi/obrazovanie">Образование</a>
          </li>
          <li class="sub-menu-item">
            <a href="/dshi/dokumenty">Документы</a>
          </li>
          <li class="sub-menu-item">
            <a href="/dshi/kontakty">Контакты</a>
          </li>
        </ul>
      </li>
      <li class="menu-item eios">
        <a href="/login" class="menu-item__text">ЭИОС Войти</a>
      </li>
    </ul>
    <div class="mobile-links">
      <div class="item">
        <a href="/centr-sodejstviya-trudoustrojstvu" class="item-link">Центр содействия трудоустройству</a>
      </div>
      <div class="item">
        <a href="/svedeniya-ob-obrazovatelnoj-organizacii" class="item-link">Сведения об образовательной организации</a>
      </div>
    </div>
  </div>

  @if(Auth::check())
    @if (Auth::user()->isAdmin())
      <div class="top-line-is-login">
        <div class="container-fluid">
          <div class="text-wrapper">
            <div class="top-line__text dashboard">
              <a href="/dashboard">Панель управления</a>
            </div>
            <div class="top-line__text logout">
              <a href="{{ route('logout') }}">Выйти</a>
            </div>
          </div>
        </div>
      </div>
    @endif
  @endif

  @yield('script')
  <script src="{{ asset('js/bvi.min.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  
</body>
</html>
