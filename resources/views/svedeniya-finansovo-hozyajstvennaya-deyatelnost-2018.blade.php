<?php $page_title = "Финансово-хозяйственная деятельность 2018"; ?>

@extends('layouts.main')

@section('content')
  <div class="page svedeniya-list svedeniya-pdf-list svedeniya-dokumenty-page svedeniya-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title"><?php echo $page_title; ?></div>
      </div>
      <div class="documents">
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/fhd-plan-finansovo-hozyajstvennoj-deyatelnosti-na-2018-god.pdf" target="_blank">План финансово-хозяйственной деятельности на 2018 год</a>
        </div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/fhd-gosudarstvennoe-zadanie-na-2018-god.pdf" target="_blank">Государственное задание на 2018 год</a>
        </div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/fhd-kontrolnye-cifry-priema-na-2018-god.pdf" target="_blank">Контрольные цифры приема на 2018 год</a>
        </div>
      </div>
    </div>
  </div>
@endsection