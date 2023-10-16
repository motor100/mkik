<?php $page_title = "Учебные планы 2015"; ?>

@extends('layouts.page_layout')

@section('content')
  <div class="page svedeniya-pdf-list svedeniya-dokumenty-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title"><?php echo $page_title; ?></div>
      </div>
      <div class="documents">
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/up-fortepiano-2015.pdf" target="_blank">УП "Фортепиано"</a>
        </div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/up-orkestrovye-strunnye-instrumenty-2015.pdf" target="_blank">УП "Оркестровые струнные инструменты"</a>
        </div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/up-orkestrovye-duhovye-i-udarnye-instrumenty-2015.pdf" target="_blank">УП "Оркестровые духовые и ударные инструменты"</a>
        </div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/up-instrumenty-narodnogo-orkestra-2015.pdf" target="_blank">УП "Инструменты народного оркестра"</a>
        </div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/up-horovoe-dirizhirovanie-2015.pdf" target="_blank">УП "Хоровое дирижирование"</a>
        </div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/up-horovoe-narodnoe-penie-2015.pdf" target="_blank">УП "Хоровое народное пение"</a>
        </div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/up-horeograficheskoe-tvorchestvo-2015.pdf" target="_blank">УП "Хореографическое творчество"</a>
        </div>
      </div>
    </div>
  </div>
@endsection