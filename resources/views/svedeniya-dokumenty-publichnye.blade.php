<?php $page_title = "Публичные"; ?>

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
          <a class="name" href="/img/svedeniya/dokumenty/otchet-o-rezultatah-samoobsledovaniya.pdf" target="_blank">Отчет о результатах самообследования</a>
        </div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/otchet-o-rezultatah-samoobsledovaniya-za-2018-g.pdf" target="_blank">Отчет о результатах самообследования за 2018 г</a>
        </div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/otchet-o-rezultatah-samoobsledovaniya-za-2019-g.pdf" target="_blank">Отчет о результатах самообследования за 2019 г</a>
        </div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/otchet-o-rezultatah-samoobsledovaniya-za-2020-g.pdf" target="_blank">Отчет о результатах самообследования за 2020 г</a>
        </div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/otchet-o-rezultatah-samoobsledovaniya-za-2021-g.pdf" target="_blank">Отчет о результатах самообследования за 2021 г</a>
        </div>
      </div>
    </div>
  </div>
@endsection