<?php $page_title = "Направления подготовки"; ?>

@extends('layouts.main')

@section('content')
  <div class="page napravleniya-podgotovki-page">
    <div class="container">
      <div class="page-title"><?php echo $page_title; ?></div>
      <div class="napravleniya-podgotovki-wrapper">
        <div class="row">
          <div class="col-md-4">
            <div class="item">
              <div class="image">
                <a href="/abiturientu/napravleniya-podgotovki/teoriya-muzyki">
                  <img src="/img/teoriya-muzyki.png" alt="">
                </a>
              </div>
              <a href="/abiturientu/napravleniya-podgotovki/teoriya-muzyki" class="title">Теория<br>музыки</a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="item">
              <div class="image">
                <a href="/abiturientu/napravleniya-podgotovki/vokalnoe-iskusstvo">
                  <img src="/img/vokalnoe-iskusstvo.png" alt="">
                </a>
              </div>
              <a href="/abiturientu/napravleniya-podgotovki/vokalnoe-iskusstvo" class="title">Вокальное<br>искусство</a>
              <div class="vertikal-line hidden-mobile"></div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="item">
              <div class="image">
                <a href="/abiturientu/napravleniya-podgotovki/orkestrovye-duhovye-i-udarnye-instrumenty">
                  <img src="/img/orkestrovye-duhovye-i-udarnye-instrumenty.png" alt="">
                </a>
              </div>
              <a href="/abiturientu/napravleniya-podgotovki/orkestrovye-duhovye-i-udarnye-instrumenty" class="title">Оркестровые духовые и<br>ударные инструменты</a>
              <div class="vertikal-line hidden-mobile"></div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="item">
              <div class="image">
                <a href="/abiturientu/napravleniya-podgotovki/instrumenty-narodnogo-orkestra">
                  <img src="/img/instrumenty-narodnogo-orkestra.png" alt="">
                </a>
              </div>
              <a href="/abiturientu/napravleniya-podgotovki/instrumenty-narodnogo-orkestra" class="title">Инструменты<br>народного оркестра</a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="item">
              <div class="image">
                <a href="/abiturientu/napravleniya-podgotovki/fortepiano">
                  <img src="/img/fortepiano.png" alt="">
                </a>
              </div>
              <a href="/abiturientu/napravleniya-podgotovki/fortepiano" class="title">Фортепиано</a>
              <div class="vertikal-line hidden-mobile"></div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="item">
              <div class="image">
                <a href="/abiturientu/napravleniya-podgotovki/orkestrovye-strunnye-instrumenty">
                  <img src="/img/orkestrovye-strunnye-instrumenty.png" alt="">
                </a>
              </div>
              <a href="/abiturientu/napravleniya-podgotovki/orkestrovye-strunnye-instrumenty" class="title">Оркестровые струнные<br>инструменты</a>
              <div class="vertikal-line hidden-mobile"></div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="item">
              <div class="image">
                <a href="/abiturientu/napravleniya-podgotovki/horeograficheskoe-tvorchestvo">
                  <img src="/img/horeograficheskoe-tvorchestvo.png" alt="">
                </a>
              </div>
              <a href="/abiturientu/napravleniya-podgotovki/horeograficheskoe-tvorchestvo" class="title">Хореографическое<br>творчество</a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="item">
              <div class="image">
                <a href="/abiturientu/napravleniya-podgotovki/horovoe-dirizhirovanie">
                  <img src="/img/horovoe-dirizhirovanie.png" alt="">
                </a>
              </div>
              <a href="/abiturientu/napravleniya-podgotovki/horovoe-dirizhirovanie" class="title">Хоровое<br>дирижирование</a>
              <div class="vertikal-line hidden-mobile"></div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="item">
              <div class="image">
                <a href="/abiturientu/napravleniya-podgotovki/solnoe-i-horovoe-narodnoe-penie">
                  <img src="/img/solnoe-i-horovoe-narodnoe-penie.png" alt="">
                </a>
              </div>
              <a href="/abiturientu/napravleniya-podgotovki/solnoe-i-horovoe-narodnoe-penie" class="title">Сольное и хоровое<br>народное пение</a>
              <div class="vertikal-line hidden-mobile"></div>
            </div>
          </div>
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <div class="item">
              <div class="image">
                <a href="/abiturientu/napravleniya-podgotovki/muzykalnoe-iskusstvo-ehstrady">
                  <img src="/img/muzykalnoe-iskusstvo-ehstrady.png" alt="">
                </a>
              </div>
              <a href="/abiturientu/napravleniya-podgotovki/muzykalnoe-iskusstvo-ehstrady" class="title">Музыкальное<br>искусство эстрады</a>
            </div>
          </div>         
          <div class="col-md-4"></div>
        </div>
      </div>
      <a href="/abiturientu/podat-dokumenty" class="podat-dokumenty-btn">Подать документы</a>
    </div>
  </div>
@endsection