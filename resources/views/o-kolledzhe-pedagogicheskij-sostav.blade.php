@section('title', 'Педагогический состав')

@extends('layouts.main')

@section('content')
  <div class="page o-kolledzhe-pedagogicheskij-sostav-page">
    <div class="container">
      <div class="page-title">Педагогический состав</div>

      <div class="teachers-wrapper">
        <div class="page-subtitle">Руководство</div>
        @if(count($teachers) > 0)
          <div class="row">
            @foreach($teachers as $tchr)
              <div class="col-xl-4 col-lg-6">
                <div class="item">
                  <div class="photo">
                    <img src="{{ Storage::url($tchr->image) }}" alt="">
                  </div>
                  <div class="content">
                    <div class="name">
                      <a href="/o-kolledzhe/pedagogicheskij-sostav/{{ $tchr->slug }}">{{ $tchr->title }}</a>
                    </div>
                    <div class="post">{{ $tchr->post }}</div>
                    @if($tchr->phone) 
                      <div class="phone">{{ $tchr->phone }}</div>
                    @endif
                    @if($tchr->email) 
                      <div class="email">{{ $tchr->email }}</div>
                    @endif
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        @endif
      </div>

      <div class="otdeleniya-wrapper">
        <div class="page-subtitle">Отделения</div>
        <div class="item">
          <a href="/o-kolledzhe/otdeleniya/fortepiannoe-otdelenie">Фортепианное отделение</a>
        </div>
        <div class="item">
          <a href="/o-kolledzhe/otdeleniya/instrumenty-narodnogo-orkestra">Инструменты народного оркестра</a>
        </div>
        <div class="item">
          <a href="/o-kolledzhe/otdeleniya/orkestrovye-strunnye-duhovye-i-udarnye-instrumenty">Оркестровые струнные, духовые и ударные инструменты</a>
        </div>
        <div class="item">
          <a href="/o-kolledzhe/otdeleniya/horovoe-dirizhirovanie">Хоровое дирижирование</a>
        </div>
        <div class="item">
          <a href="/o-kolledzhe/otdeleniya/solnoe-i-horovoe-narodnoe-penie">Сольное и хоровое народное пение</a>
        </div>
        <div class="item">
          <a href="/o-kolledzhe/otdeleniya/horeograficheskoe-tvorchestvo">Хореографическое творчество</a>
        </div>
        <div class="item">
          <a href="/o-kolledzhe/otdeleniya/teoriya-muzyki">Теория музыки</a>
        </div>
        <div class="item">
          <a href="/o-kolledzhe/otdeleniya/vokalnoe-iskusstvo">Вокальное искусство</a>
        </div>
        <div class="item">
          <a href="/o-kolledzhe/otdeleniya/muzykalno-teoreticheskie-discipliny">Музыкально-теоретические дисциплины</a>
        </div>
        <div class="item">
          <a href="/o-kolledzhe/otdeleniya/obshchie-gumanitarnye-i-socialno-ehkonomicheskie-discipliny">Общие гуманитарные и социально-экономические дисциплины</a>
        </div>
        <div class="item">
          <a href="/o-kolledzhe/otdeleniya/obshchee-fortepiano">Общее фортепиано</a>
        </div>
        <div class="item">
          <a href="/o-kolledzhe/otdeleniya/muzykalnoe-iskusstvo-ehstrady">Музыкальное искусство эстрады</a>
        </div>
      </div>

      <div class="documents-wrapper">
        <div class="page-subtitle">Документы</div>
        <div class="documents">
          @foreach($documents as $doc)
            @include('document-list-item')
          @endforeach
        </div>
      </div>

    </div>
  </div>
@endsection