<?php $page_title = $single_izdaniye->title; ?>

@extends('layouts.main')

@section('content')
  <div class="page single-izdaniye-page single-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title"><?php echo $page_title; ?></div>
        <span class="history-back" onclick="window.history.back()">&lt;&lt;&nbsp;Назад</span>
      </div>
      
      <div class="single">
        <div class="izdaniye-wrapper">
          <div class="row">
            <div class="col-md-2">
              <div class="image">
                <img src="{{ $single_izdaniye->image }}" alt="">
              </div>
              <div class="order-text">Заказать:</div>
              <div class="phone">+7 (3513) 55-50-33</div>
              <div class="email">mkik@yandex.ru</div>
            </div>
            <div class="col-md-10">
              <div class="content">
                @if($single_izdaniye->author)
                  <div class="author-wrapper text-wrapper">
                    <div class="text-bold">Автор:</div>
                    <div class="author">{{ $single_izdaniye->author }}</div>
                  </div>
                @endif
                @if($single_izdaniye->category)
                  <div class="category-wrapper text-wrapper">
                    <div class="text-bold">Категория:</div>
                    <div class="category">{{ $single_izdaniye->category }}</div>
                  </div>
                @endif
                @if($single_izdaniye->publishing)
                  <div class="publishing-wrapper text-wrapper">
                    <div class="text-bold">Издательство:</div>
                    <div class="publishing">{{ $single_izdaniye->publishing }}</div>
                  </div>
                @endif
                @if($single_izdaniye->year)
                  <div class="year-wrapper text-wrapper">
                    <div class="text-bold">Год:</div>
                    <div class="year">{{ $single_izdaniye->year }}</div>
                  </div>
                @endif
                @if($single_izdaniye->price)
                  <div class="price-wrapper text-wrapper">
                    <div class="text-bold">Цена:</div>
                    <div class="price">{{ $single_izdaniye->price }}р.</div>
                  </div>
                @endif
                <div class="text-wrapper">
                  <div class="text-bold">Описание:</div>
                  <div class="text">{!! $single_izdaniye->text !!}</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection