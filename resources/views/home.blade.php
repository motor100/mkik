@extends('layouts.page_layout')

@section('style')
  <link rel="stylesheet" href="{{ asset('/css/swiper-bundle.min.css') }}">
@endsection

@section('content')
  <div class="home-page">

    <div class="required-widget">
      <div class="container">
        <script src='https://pos.gosuslugi.ru/bin/script.min.js'></script> 
        <style>
        #js-show-iframe-wrapper{position:relative;display:flex;align-items:center;justify-content:center;width:100%;min-width:293px;max-width:100%;background:linear-gradient(138.4deg,#38bafe 26.49%,#2d73bc 79.45%);color:#fff;cursor:pointer}#js-show-iframe-wrapper .pos-banner-fluid *{box-sizing:border-box}#js-show-iframe-wrapper .pos-banner-fluid .pos-banner-btn_2{display:block;width:240px;min-height:56px;font-size:18px;line-height:24px;cursor:pointer;background:#0d4cd3;color:#fff;border:none;border-radius:8px;outline:0}#js-show-iframe-wrapper .pos-banner-fluid .pos-banner-btn_2:hover{background:#1d5deb}#js-show-iframe-wrapper .pos-banner-fluid .pos-banner-btn_2:focus{background:#2a63ad}#js-show-iframe-wrapper .pos-banner-fluid .pos-banner-btn_2:active{background:#2a63ad}@-webkit-keyframes fadeInFromNone{0%{display:none;opacity:0}1%{display:block;opacity:0}100%{display:block;opacity:1}}@keyframes fadeInFromNone{0%{display:none;opacity:0}1%{display:block;opacity:0}100%{display:block;opacity:1}}@font-face{font-family:LatoWebLight;src:url(https://pos.gosuslugi.ru/bin/fonts/Lato/fonts/Lato-Light.woff2) format("woff2"),url(https://pos.gosuslugi.ru/bin/fonts/Lato/fonts/Lato-Light.woff) format("woff"),url(https://pos.gosuslugi.ru/bin/fonts/Lato/fonts/Lato-Light.ttf) format("truetype");font-style:normal;font-weight:400}@font-face{font-family:LatoWeb;src:url(https://pos.gosuslugi.ru/bin/fonts/Lato/fonts/Lato-Regular.woff2) format("woff2"),url(https://pos.gosuslugi.ru/bin/fonts/Lato/fonts/Lato-Regular.woff) format("woff"),url(https://pos.gosuslugi.ru/bin/fonts/Lato/fonts/Lato-Regular.ttf) format("truetype");font-style:normal;font-weight:400}@font-face{font-family:LatoWebBold;src:url(https://pos.gosuslugi.ru/bin/fonts/Lato/fonts/Lato-Bold.woff2) format("woff2"),url(https://pos.gosuslugi.ru/bin/fonts/Lato/fonts/Lato-Bold.woff) format("woff"),url(https://pos.gosuslugi.ru/bin/fonts/Lato/fonts/Lato-Bold.ttf) format("truetype");font-style:normal;font-weight:400}@font-face{font-family:RobotoWebLight;src:url(https://pos.gosuslugi.ru/bin/fonts/Roboto/Roboto-Light.woff2) format("woff2"),url(https://pos.gosuslugi.ru/bin/fonts/Roboto/Roboto-Light.woff) format("woff"),url(https://pos.gosuslugi.ru/bin/fonts/Roboto/Roboto-Light.ttf) format("truetype");font-style:normal;font-weight:400}@font-face{font-family:RobotoWebRegular;src:url(https://pos.gosuslugi.ru/bin/fonts/Roboto/Roboto-Regular.woff2) format("woff2"),url(https://pos.gosuslugi.ru/bin/fonts/Roboto/Roboto-Regular.woff) format("woff"),url(https://pos.gosuslugi.ru/bin/fonts/Roboto/Roboto-Regular.ttf) format("truetype");font-style:normal;font-weight:400}@font-face{font-family:RobotoWebBold;src:url(https://pos.gosuslugi.ru/bin/fonts/Roboto/Roboto-Bold.woff2) format("woff2"),url(https://pos.gosuslugi.ru/bin/fonts/Roboto/Roboto-Bold.woff) format("woff"),url(https://pos.gosuslugi.ru/bin/fonts/Roboto/Roboto-Bold.ttf) format("truetype");font-style:normal;font-weight:400}@font-face{font-family:ScadaWebRegular;src:url(https://pos.gosuslugi.ru/bin/fonts/Scada/Scada-Regular.woff2) format("woff2"),url(https://pos.gosuslugi.ru/bin/fonts/Scada/Scada-Regular.woff) format("woff"),url(https://pos.gosuslugi.ru/bin/fonts/Scada/Scada-Regular.ttf) format("truetype");font-style:normal;font-weight:400}@font-face{font-family:ScadaWebBold;src:url(https://pos.gosuslugi.ru/bin/fonts/Scada/Scada-Bold.woff2) format("woff2"),url(https://pos.gosuslugi.ru/bin/fonts/Scada/Scada-Bold.woff) format("woff"),url(https://pos.gosuslugi.ru/bin/fonts/Scada/Scada-Bold.ttf) format("truetype");font-style:normal;font-weight:400}@font-face{font-family:Geometria;src:url(https://pos.gosuslugi.ru/bin/fonts/Geometria/Geometria.eot);src:url(https://pos.gosuslugi.ru/bin/fonts/Geometria/Geometria.eot?#iefix) format("embedded-opentype"),url(https://pos.gosuslugi.ru/bin/fonts/Geometria/Geometria.woff) format("woff"),url(https://pos.gosuslugi.ru/bin/fonts/Geometria/Geometria.ttf) format("truetype");font-weight:400;font-style:normal}@font-face{font-family:Geometria-ExtraBold;src:url(https://pos.gosuslugi.ru/bin/fonts/Geometria/Geometria-ExtraBold.eot);src:url(https://pos.gosuslugi.ru/bin/fonts/Geometria/Geometria-ExtraBold.eot?#iefix) format("embedded-opentype"),url(https://pos.gosuslugi.ru/bin/fonts/Geometria/Geometria-ExtraBold.woff) format("woff"),url(https://pos.gosuslugi.ru/bin/fonts/Geometria/Geometria-ExtraBold.ttf) format("truetype");font-weight:900;font-style:normal}
        </style>
        <style>
        #js-show-iframe-wrapper{background:var(--pos-banner-fluid-41__background)}#js-show-iframe-wrapper .pos-banner-fluid .pos-banner-btn_2{width:100%;min-height:52px;background:#fff;color:#0d4cd3;font-size:16px;font-family:LatoWeb,sans-serif;font-weight:400;padding:0;line-height:1.2;border:2px solid #0d4cd3}#js-show-iframe-wrapper .pos-banner-fluid .pos-banner-btn_2:active,#js-show-iframe-wrapper .pos-banner-fluid .pos-banner-btn_2:focus,#js-show-iframe-wrapper .pos-banner-fluid .pos-banner-btn_2:hover{background:#e4ecfd}#js-show-iframe-wrapper .bf-41{position:relative;display:grid;grid-template-columns:var(--pos-banner-fluid-41__grid-template-columns);grid-template-rows:var(--pos-banner-fluid-41__grid-template-rows);width:100%;max-width:var(--pos-banner-fluid-41__max-width);box-sizing:border-box;grid-auto-flow:row dense}#js-show-iframe-wrapper .bf-41__decor{background:var(--pos-banner-fluid-41__bg-url) var(--pos-banner-fluid-41__bg-url-position) no-repeat;background-size:cover;position:relative;background-color:#fff}#js-show-iframe-wrapper .bf-41__content{display:flex;flex-direction:column;padding:var(--pos-banner-fluid-41__content-padding);grid-row:var(--pos-banner-fluid-41__content-grid-row);justify-content:center}#js-show-iframe-wrapper .bf-41__description{display:flex;flex-direction:column;margin:var(--pos-banner-fluid-41__description-margin)}#js-show-iframe-wrapper .bf-41__text{margin:var(--pos-banner-fluid-41__text-margin);font-size:var(--pos-banner-fluid-41__text-font-size);line-height:1.4;font-family:LatoWeb,sans-serif;font-weight:700;color:#0b1f33}#js-show-iframe-wrapper .bf-41__text_small{font-size:var(--pos-banner-fluid-41__text-small-font-size);font-weight:400;margin:0}#js-show-iframe-wrapper .bf-41__bottom-wrap{display:flex;flex-direction:row;align-items:center}#js-show-iframe-wrapper .bf-41__logo-wrap{position:absolute;top:var(--pos-banner-fluid-41__logo-wrap-top);left:0;padding:var(--pos-banner-fluid-41__logo-wrap-padding);background:#fff;border-radius:0 0 8px 0}#js-show-iframe-wrapper .bf-41__logo{width:var(--pos-banner-fluid-41__logo-width);margin-left:1px}#js-show-iframe-wrapper .bf-41__slogan{font-family:LatoWeb,sans-serif;font-weight:700;font-size:var(--pos-banner-fluid-41__slogan-font-size);line-height:1.2;color:#005ca9}#js-show-iframe-wrapper .bf-41__btn-wrap{width:100%;max-width:var(--pos-banner-fluid-41__button-wrap-max-width)}
        </style>
        <div id='js-show-iframe-wrapper'>
          <div class='pos-banner-fluid bf-41'>
        
            <div class='bf-41__decor'>
              <div class='bf-41__logo-wrap'>
                <img
                  class='bf-41__logo'
                  src='https://pos.gosuslugi.ru/bin/banner-fluid/gosuslugi-logo-blue.svg'
                  alt='Госуслуги'
                />
                <div class='bf-41__slogan'>Решаем вместе</div >
              </div >
            </div >
            <div class='bf-41__content'>
              <div class='bf-41__description'>
                  <span class='bf-41__text'>
                    Сложности с получением «Пушкинской карты» или приобретением билетов? Знаете, как улучшить работу учреждений культуры?
                  </span >
                <span class='bf-41__text bf-41__text_small'>
                    Напишите&nbsp;— решим!
                  </span >
              </div >
        
              <div class='bf-41__bottom-wrap'>
                <div class='bf-41__btn-wrap'>
                  <!-- pos-banner-btn_2 не удалять; другие классы не добавлять -->
                  <button
                    class='pos-banner-btn_2'
                    type='button'
                  >Написать
                  </button >
                </div >
              </div>
            </div >
          </div >
        </div >
        <script>
          (function(){
            "use strict";function ownKeys(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);if(t)r=r.filter(function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable});n.push.apply(n,r)}return n}function _objectSpread(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};if(t%2)ownKeys(Object(n),true).forEach(function(t){_defineProperty(e,t,n[t])});else if(Object.getOwnPropertyDescriptors)Object.defineProperties(e,Object.getOwnPropertyDescriptors(n));else ownKeys(Object(n)).forEach(function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))})}return e}function _defineProperty(e,t,n){if(t in e)Object.defineProperty(e,t,{value:n,enumerable:true,configurable:true,writable:true});else e[t]=n;return e}var POS_PREFIX_41="--pos-banner-fluid-41__",posOptionsInitialBanner41={background:"#ffffff","grid-template-columns":"100%","grid-template-rows":"264px auto","max-width":"100%","text-font-size":"18px","text-small-font-size":"16px","text-margin":"0 0 12px 0","description-margin":"0 0 24px 0","button-wrap-max-width":"100%","bg-url":"url('https://pos.gosuslugi.ru/bin/banner-fluid/41/banner-fluid-bg-41.svg')","bg-url-position":"center bottom","content-padding":"20px 24px 23px","content-grid-row":"0","logo-wrap-padding":"16px 12px 12px","logo-width":"65px","logo-wrap-top":"0","slogan-font-size":"12px"},setStyles=function(e,t){var n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:POS_PREFIX_41;Object.keys(e).forEach(function(r){t.style.setProperty(n+r,e[r])})},removeStyles=function(e,t){var n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:POS_PREFIX_41;Object.keys(e).forEach(function(e){t.style.removeProperty(n+e)})};function changePosBannerOnResize(){var e=document.documentElement,t=_objectSpread({},posOptionsInitialBanner41),n=document.getElementById("js-show-iframe-wrapper"),r=n?n.offsetWidth:document.body.offsetWidth;if(r>340)t["button-wrap-max-width"]="118px";if(r>360)t["bg-url"]="url('https://pos.gosuslugi.ru/bin/banner-fluid/41/banner-fluid-bg-41-2.svg')",t["content-padding"]="20px 24px",t["description-margin"]="0 0 20px 0";if(r>568)t["bg-url"]="url('https://pos.gosuslugi.ru/bin/banner-fluid/41/banner-fluid-bg-41.svg')",t["bg-url-position"]="calc(100% + 39px) bottom",t["grid-template-columns"]="1fr 292px",t["grid-template-rows"]="100%",t["content-grid-row"]="1",t["content-padding"]="50px 24px",t["description-margin"]="0 0 24px 0",t["button-wrap-max-width"]="100%";if(r>640)t["button-wrap-max-width"]="118px";if(r>783)t["grid-template-columns"]="1fr 390px",t["bg-url-position"]="center bottom",t["text-small-font-size"]="18px",t["content-padding"]="30px 24px";if(r>820)t["grid-template-columns"]="1fr 420px",t["bg-url-position"]="center calc(100% + 12px)";if(r>1020)t["bg-url-position"]="center calc(100% + 37px)";if(r>1098)t["bg-url"]="url('https://pos.gosuslugi.ru/bin/banner-fluid/41/banner-fluid-bg-41-2.svg')",t["grid-template-columns"]="1fr 557px",t["text-font-size"]="20px",t["content-padding"]="52px 50px",t["logo-width"]="78px",t["slogan-font-size"]="15px",t["logo-wrap-padding"]="20px 16px 16px";if(r>1422)t["max-width"]="1422px",t["grid-template-columns"]="1fr 720px",t["content-padding"]="26px 50px",t["text-font-size"]="24px";setStyles(t,e)}changePosBannerOnResize(),window.addEventListener("resize",changePosBannerOnResize),window.onunload=function(){var e=document.documentElement,t=_objectSpread({},posOptionsInitialBanner41);window.removeEventListener("resize",changePosBannerOnResize),removeStyles(t,e)};
          })()
        </script>
        <script>Widget("https://pos.gosuslugi.ru/form", 332879)</script>
      </div>
    </div>

    <div class="main-section">
      <div class="container">
        <div class="section-title-wrapper hidden-mobile">
          <span class="section-title">Новости</span>
          <a href="/news-archive" class="news-archive-btn">Архив</a>
        </div>
        <div class="row">
          <div class="col-md-12 col-lg-9">
            @if(count($news) > 0)
              <div class="main-slider-wrapper">
                <div class="main-slider swiper-container">
                  <div class="image-slider__wrapper swiper-wrapper">
                    @foreach($news as $nws)
                      <div class="image-slider__slide swiper-slide">
                        <div class="image-slider__image">
                          <img src="{{ Storage::url($nws->image) }}" alt="">
                        </div>
                        <div class="image-slider__bg">
                          <div class="image-slider__title">{{ $nws->title }}</div>
                          <div class="image-slider__excerpt">{{ $nws->excerpt }}</div>
                          <a class="full" href="/news/{{ $nws->slug }}"></a>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
                <div class="main-swiper-navigation">
                  <div class="container navigation-container">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                  </div>
                </div>
                <div class="swiper-pagination hidden-mobile"></div>
              </div>
            @endif
          </div>
          
          <div class="col-md-3 d-none d-lg-block">
            <div class="aside">
              <div class="aside-title">Контакты</div>
              <div class="contacts">
                <div class="item">
                  <div class="icon">
                    <img src="/img/geolocation-icon.svg" alt="">
                  </div>
                  <div class="text address">456316 г. Миасс,<br>ул. Орловская 11</div>
                </div>
              </div>
              <div class="text director">
                <div class="item">
                  <div class="text director-name">Директор: <span class="text-bold">Сквирская Мария Владимировна</span></div>
                </div>
              </div>
              <div class="phones">
                <div class="item">
                  <div class="icon">
                    <img src="/img/phone-icon-strong.svg" alt="">
                  </div>
                  <div class="text">Директор<br><span class="text-bold">8 (3513) 55-50-33</span></div>
                </div>                 
                <div class="item">
                  <div class="icon">
                    <img src="/img/phone-icon-light.svg" alt="">
                  </div>
                  <div class="text">Зам.директора<br><span class="text-bold">8 (3513) 55-10-29</span></div>
                </div>
                <div class="item">
                  <div class="icon">
                    <img src="/img/phone-icon-light.svg" alt="">
                  </div>
                  <div class="text">Учебная часть<br><span class="text-bold">8 (3513) 55-29-34</span></div>
                </div>
                <div class="item">
                  <div class="icon">
                    <img src="/img/phone-icon-light.svg" alt="">
                  </div>
                  <div class="text">Секретарь<br><span class="text-bold">8 (3513) 55-50-33</span></div>
                </div>
                <div class="item">
                  <div class="icon">
                    <img src="/img/phone-icon-light.svg" alt="">
                  </div>
                  <div class="text">Вахта<br><span class="text-bold">8 (3513) 55-29-17</span></div>
                </div>
                <div class="item">
                  <div class="icon">
                    <img src="/img/phone-icon-light.svg" alt="">
                  </div>
                  <div class="text">Приемная комиссия<br><span class="text-bold">8 (3513) 55-29-34</span></div>
                </div>
              </div>
              <div class="email">
                <div class="item">
                  <div class="icon">
                    <img src="/img/letter-icon.svg" alt="">
                  </div>
                  <div class="text">Почта<br><span class="text-bold">mkik@yandex.ru</span></div>
                </div>
              </div>
              <div class="social">
                <div class="qr-code">
                  <img src="/img/qr-code.svg" alt="">
                </div>
                <div class="social-icon">
                  <div class="img vk">
                    <a href="https://vk.com/mgkik" target="_blank">
                      <img src="/img/vk-icon.svg" alt="">
                    </a>                    
                  </div>
                  <div class="img">
                    <a href="https://wa.me/79514778645" target="_blank">
                      <img src="/img/whatsapp-icon.svg" alt="">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="afisha-section">
      <div class="container">
        <div class="section-title-wrapper">
          <div class="section-title">Анонсы/Афиши</div>
          @if(count($afisha) > 0)
            <a href="/afisha-archive" class="afisha-archive-btn">Архив</a>
          @endif
        </div>
        @if(count($afisha) > 0)
          <div class="afisha-wrapper four-items">
            <div class="row">
              @php
                $i = 0;
              @endphp
              @foreach($afisha as $fsh)
                @if($i == 3)
                  <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 d-lg-none d-xl-block d-xxl-block">
                @else
                  <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                @endif
                  <div class="item">
                    <div class="image">
                      <img src="{{ Storage::url($fsh->image) }}" alt="">
                    </div>
                    <div class="horizontal-line"></div>
                    <div class="date">{{ $fsh->date }}</div>
                    <div class="title">{{ $fsh->short_title }}</div>
                    <div class="arrow">
                      <div class="circle">
                        <div class="corner"></div>
                      </div>
                    </div>
                    <a href="/afisha/{{ $fsh->slug }}" class="full"></a>
                  </div>
                </div>
                @php
                  $i++;
                @endphp
              @endforeach
            </div>
          </div>
        @endif
      </div>
    </div>

    <div class="kalendar-studenta-section">
      <div class="container">
        <div class="section-title-wrapper">
          <div class="section-title">Календарь студента</div>
          @if(count($kalendar_studenta) > 0)
            <a href="/kalendar-studenta-archive" class="afisha-archive-btn">Архив</a>
          @endif
        </div>
        @if(count($kalendar_studenta) > 0)
          <div class="kalendar-studenta-wrapper four-items">
            <div class="row">
              @php
                $i = 0;
              @endphp
              @foreach($kalendar_studenta as $kldr)
                @if($i == 3)
                  <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 d-lg-none d-xl-block d-xxl-block">
                @else
                  <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                @endif
                  <div class="item">
                    <div class="image">
                      <img src="{{ Storage::url($kldr->image) }}" alt="">
                    </div>
                    <div class="horizontal-line"></div>
                    <div class="date">{{ $kldr->date }}</div>
                    <div class="title">{{ $kldr->title }}</div>
                    <div class="arrow">
                      <div class="circle">
                        <div class="corner"></div>
                      </div>
                    </div>
                    <a href="/kalendar-studenta/{{ $kldr->slug }}" class="full"></a>
                  </div>
                </div>
                @php
                  $i++;
                @endphp
              @endforeach
            </div>
          </div>
        @endif
      </div>
    </div>

    <div class="partners-section">
      <div class="container">
        <div class="section-title">Наши партнеры</div>
        <div class="partners">
          <div class="partners-logo">
            <div class="item">
              <a href="https://www.culture.ru/" target="_blank">
                <img src="/storage/uploads/banners/kultura-rf.jpg" alt="">
              </a>
            </div>
            <div class="item">
              <a href="http://gallerytalents.ru/" target="_blank">
                <img src="/storage/uploads/banners/galereya-talantov.jpg" alt="">
              </a>
            </div>
            <div class="item">
              <a href="https://culture.gov.ru/about/national-project/about-project/" target="_blank">
                <img src="/storage/uploads/banners/nac-proekt-kultura.jpg" alt="">
              </a>
            </div>
            <div class="item">
              <a href="https://culture.gov.ru/" target="_blank">
                <img src="/storage/uploads/banners/min-kult-rf.jpg" alt="">
              </a>
            </div>
            <div class="item">
              <a href="https://minobr74.ru/" target="_blank">
                <img src="/storage/uploads/banners/min-obr-i-nauki-chel-obl.jpg" alt="">
              </a>
            </div>
            <div class="item">
              <a href="http://www.culture-chel.ru/" target="_blank">
                <img src="/storage/uploads/banners/min-kult-chel-obl.jpg" alt="">
              </a>
            </div>
            <div class="item">
              <a href="https://www.cultureural.ru/" target="_blank">
                <img src="/storage/uploads/banners/inf-portal-kult-i-issk-yuzhnogo-urala.jpg" alt="">
              </a>
            </div>          
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection

@section('script')
  <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
@endsection