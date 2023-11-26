@section('title', $teachers_category->title)

@extends('layouts.main')

@section('content')
  <div class="page prepodavateli-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title">{{ $teachers_category->title }}</div>
        <span class="history-back" onclick="window.history.back()">&lt;&lt;&nbsp;Назад</span>
      </div>
      <div class="teachers-wrapper">
        @if(count($prepodavateli) > 0)
          <div class="row">
            @foreach($prepodavateli as $tchr)
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
                    @if( $tchr->phone ) 
                      <div class="phone">{{ $tchr->phone }}</div>
                    @endif
                    @if( $tchr->email ) 
                      <div class="email">{{ $tchr->email }}</div>
                    @endif
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection