@section('title', 'Издания')

@extends('layouts.main')

@section('content')
  <div class="page izdaniya-page">
    <div class="container">
      <div class="page-title">Издания</div>
      @foreach($izdaniya as $zdn)
        <div class="konkursy-wrapper">
          <div class="item">
            <div class="image">
              <img src="{{ $zdn->image }}" alt="">
              <a href="/studencheskaya-zhizn/izdaniya/{{ $zdn->slug }}" class="btn">смотреть</a>
            </div>
            <div class="content">
              <div class="title-wrapper text-wrapper">
                <div class="text">Название:</div>
                <div class="izdanie-title">{{ $zdn->title }}</div>
              </div>
              @if($zdn->author)
                <div class="author-wrapper text-wrapper">
                  <div class="text">Автор:</div>
                  <div class="author">{{ $zdn->author }}</div>
                </div>
              @endif
              @if($zdn->category)
                <div class="category-wrapper text-wrapper">
                  <div class="text">Категория:</div>
                  <div class="category">{{ $zdn->category }}</div>
                </div>
              @endif
              @if($zdn->excerpt)
                <div class="excerpt-wrapper text-wrapper">
                  <div class="text">Аннотация:</div>
                  <div class="excerpt">{{ html_entity_decode($zdn->excerpt) }}</div>
                </div>
              @endif
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection