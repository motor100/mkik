<?php $page_title = "Финансово-хозяйственная деятельность 2015"; ?>

@extends('layouts.page_layout')

@section('content')
  <div class="page svedeniya-list svedeniya-pdf-list svedeniya-dokumenty-page svedeniya-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title"><?php echo $page_title; ?></div>
      </div>
      <div class="documents">
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/fhd-plan-finansovo-hozyajstvennoj-deyatelnosti-na-2015-god.pdf" target="_blank">План финансово-хозяйственной деятельности на 2015 год</a>
        </div>
      </div>
    </div>
  </div>
@endsection