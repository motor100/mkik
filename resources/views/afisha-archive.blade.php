<?php $page_title = "Афиша"; ?>

@extends('layouts.page_layout')

@section('content')
  <div class="page afisha-archive-page archive-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title"><?php echo $page_title; ?></div>
        <span class="history-back" onclick="window.history.back()">&lt;&lt;&nbsp;Назад</span>
      </div>
      <div class="years">
        @foreach($years_array as $year)
          <div class="item">
            <a href="/afisha-archive-{{ $year }}">{{ $year }}</a>
          </div>
        @endforeach
      </div>
      <div class="horizontal-line"></div>
      <div class="archive-wrapper">
        <div class="row">
          @foreach($twelve_afisha as $fsh)
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
              <div class="item">
                <div class="image">
                  <img src="{{ $fsh->image }}" alt="">
                </div>
                <div class="brown-line"></div>
                <div class="date">{{ $fsh->date }}</div>
                <div class="title">{!! $fsh->short_title !!}</div>
                <div class="arrow">
                  <div class="circle">
                    <div class="corner"></div>
                  </div>
                </div>
                <a href="/afisha/{{ $fsh->slug }}" class="full"></a>
              </div>
            </div>
          @endforeach
        </div>
      </div>      
    </div>
  </div>
@endsection