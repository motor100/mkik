<?php $page_title = "Банк студенческих работ"; ?>

@extends('layouts.page_layout')

@section('style')
  <link rel="stylesheet" href="{{ asset('/css/eios.css') }}">
@endsection

@section('content')
<div class="page eios-table-page bank-studencheskih-rabot-page">
  <div class="container">
    <div class="page-title"><?php echo $page_title; ?></div>

    @if(count($works) > 0)
      <div class="column-title">
        <div class="column title">Название<br>документа</div>
        <div class="column text">Описание<br>документа</div>
        <div class="column course">Группа<br>обучения</div>
        <div class="column file">Файлы для<br>скачивания</div>
      </div>
      <div class="table-wrapper">
        @foreach($works as $wrk)
          <div class="item">
            <div class="column title mr10">{{ $wrk->title }}</div>
            <div class="column text mr10">{!! $wrk->text !!}</div>
            <div class="column course mr10">
              @if($wrk->course)
                <span>{{ $wrk->course }}</span>
              @else
                <span>Не указано</span>
              @endif
            </div>
            <div class="column file">
              <a href="{{ $wrk->pdf }}" target="_blank">{{ $wrk->title }}</a>
            </div>
          </div>
        @endforeach
      </div>
    @endif

  </div>
</div>
@endsection