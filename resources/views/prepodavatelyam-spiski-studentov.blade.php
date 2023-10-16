<?php $page_title = "Списки студентов"; ?>

@extends('layouts.main')

@section('style')
@endsection

@section('content')
  <div class="page spiski-studentov-page">
    <div class="container">
      <div class="page-title"><?php echo $page_title; ?></div>
      <div class="select-course">
        <div class="item course-active">
          <span class="number">1</span> курс
        </div>
        <div class="item">
          <span class="number">2</span> курс
        </div>
        <div class="item">
          <span class="number">3</span> курс
        </div>
        <div class="item">
          <span class="number">4</span> курс
        </div>
      </div>
      <div class="text text-active">
        {!! $content[0]->text !!}
      </div>
      <div class="text">
        {!! $content[1]->text !!}
      </div>
      <div class="text">
        {!! $content[2]->text !!}
      </div>
      <div class="text">
        {!! $content[3]->text !!}
      </div>
    </div>
  </div>
@endsection

@section('script')
@endsection