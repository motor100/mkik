@section('title', 'Календарь студента')

@extends('layouts.main')

@section('content')
  <div class="page kalendar-studenta-archive-page archive-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title">Календарь студента</div>
        <span class="history-back" onclick="window.history.back()">&lt;&lt;&nbsp;Назад</span>
      </div>
      <div class="years">
        @foreach($years_array as $year)
          <div class="item">
            <a href="/kalendar-studenta-archive-{{ $year }}">{{ $year }}</a>
          </div>
        @endforeach
      </div>
      <div class="horizontal-line"></div>
      <div class="archive-wrapper">
        <div class="row">
          @foreach($eight_ks as $gks)
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
              <div class="item">
                <div class="image">
                  <img src="{{ Storage::url($gks->image) }}" alt="">
                </div>
                <div class="brown-line"></div>
                <div class="date">{{ $gks->date }}</div>
                <div class="title">{!! $gks->title !!}</div>
                <div class="arrow">
                  <div class="circle">
                    <div class="corner"></div>
                  </div>
                </div>
                <a href="/kalendar-studenta/{{ $gks->slug }}" class="full"></a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection