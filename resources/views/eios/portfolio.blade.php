<?php $page_title = "Портфолио"; ?>

@extends('layouts.main')

@section('style')
  <link rel="stylesheet" href="{{ asset('/css/eios.css') }}">
@endsection

@section('content')
<div class="page eios-table-page portfolio-page">
  <div class="container">
    <div class="page-title"><?php echo $page_title; ?></div>

    @if(count($portfolios) > 0)
      <div class="column-title">
        <div class="column title">Название<br>документа</div>
        <div class="column text">Описание<br>документа</div>
        <div class="column course">Группа<br>обучения</div>
        <div class="column file">Файлы для<br>скачивания</div>
      </div>
      <div class="table-wrapper">
        @foreach($portfolios as $prt)
          <div class="item">
            <div class="column title">{{ $prt->title }}</div>
            <div class="column text">{{ $prt->text }}</div>
            <div class="column course">
              @if($prt->course)
                {{ $prt->course }}
              @else
                Не указано
              @endif
            </div>
            <div class="column file">
              <a href="{{ $prt->file }}" target="_blank">{{ $prt->title }}</a>
            </div>
          </div>
        @endforeach
      </div>
    @endif

  </div>
</div>
@endsection