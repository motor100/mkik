@section('title', 'Студентам')

@extends('layouts.main')

@section('content')
  <div class="page studentam-raspisanie-page">
    <div class="container">
      <div class="page-title">Студентам</div>
      <div class="page-subtitle">Расписание</div>

      <div class="course-frame">
        <div class="item">
          <span class="course-number">1</span>
          <span class="course-text"> курс</span>
          <div class="arrow">
            <div class="circle">
              <div class="corner"></div>
            </div>
          </div>
          @if($sdl_att[0]->shedule)
            <a href="{{ Storage::url($sdl_att[0]->shedule) }}" class="full" target="_blank"></a>
          @else
            <a href="#" class="full"></a>
          @endif
        </div>
        <div class="item">
          <span class="course-number">2</span>
          <span class="course-text"> курс</span>
          <div class="arrow">
            <div class="circle">
              <div class="corner"></div>
            </div>
          </div>
          @if($sdl_att[1]->shedule)
            <a href="{{ Storage::url($sdl_att[1]->shedule) }}" class="full" target="_blank"></a>
          @else
            <a href="#" class="full"></a>
          @endif
        </div>
        <div class="item">
          <span class="course-number">3</span>
          <span class="course-text"> курс</span>
          <div class="arrow">
            <div class="circle">
              <div class="corner"></div>
            </div>
          </div>
          @if($sdl_att[2]->shedule)
            <a href="{{ Storage::url($sdl_att[2]->shedule) }}" class="full" target="_blank"></a>
          @else
            <a href="#" class="full"></a>
          @endif
        </div>
        <div class="item">
          <span class="course-number">4</span>
          <span class="course-text"> курс</span>
          <div class="arrow">
            <div class="circle">
              <div class="corner"></div>
            </div>
          </div>
          @if($sdl_att[3]->shedule)
            <a href="{{ Storage::url($sdl_att[3]->shedule) }}" class="full" target="_blank"></a>
          @else
            <a href="#" class="full"></a>
          @endif
        </div>
      </div>

      <div class="attestation-form-links">
        <div class="list-item">
          <a class="name" href="/studentam-attestation-form/1">Форма аттестации</a>
        </div>
        <div class="list-item">
          <a class="name" href="/studentam-attestation-form/2">Форма аттестации</a>
        </div>
        <div class="list-item">
          <a class="name" href="/studentam-attestation-form/3">Форма аттестации</a>
        </div>
        <div class="list-item">
          <a class="name" href="/studentam-attestation-form/4">Форма аттестации</a>
        </div>
      </div>

      <div class="documents-wrapper">
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-md-11">
            <div class="documents">
              <div class="item">
                <div class="title">ГИА</div>
                @foreach($gia as $g)
                  <div class="list-item">
                    <img class="icon" src="/img/pdf-icon.svg" alt="">
                    <a class="name" href="{{ Storage::url($g->file) }}" target="_blank">{{ $g->title }}</a>
                  </div>
                @endforeach
              </div>
              <div class="item">
                <div class="title">График учебного процесса</div>
                @foreach($gup as $g)
                  <div class="list-item">
                    <img class="icon" src="/img/pdf-icon.svg" alt="">
                    <a class="name" href="{{ Storage::url($g->file) }}" target="_blank">{{ $g->title }}</a>
                  </div>
                @endforeach
              </div>
              <div class="item">
                <div class="title">Заявления</div>
                @foreach($zvl as $g)
                  <div class="list-item">
                    <img class="icon" src="/img/pdf-icon.svg" alt="">
                    <a class="name" href="{{ Storage::url($g->file) }}" target="_blank">{{ $g->title }}</a>
                  </div>
                @endforeach
              </div>
              <div class="item">
                <div class="title">Методические рекомендации</div>
                @foreach($mrd as $g)
                  <div class="list-item">
                    <img class="icon" src="/img/pdf-icon.svg" alt="">
                    <a class="name" href="{{ Storage::url($g->file) }}" target="_blank">{{ $g->title }}</a>
                  </div>
                @endforeach
              </div>
              <div class="item">
                <div class="title">Положения</div>
                @foreach($plz as $g)
                  <div class="list-item">
                    <img class="icon" src="/img/pdf-icon.svg" alt="">
                    <a class="name" href="{{ Storage::url($g->file) }}" target="_blank">{{ $g->title }}</a>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
          
        </div>
        
      </div>

    </div>
  </div>
@endsection