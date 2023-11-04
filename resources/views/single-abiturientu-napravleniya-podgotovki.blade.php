@section('title', $single_napravlenie->title)

@extends('layouts.main')

@section('style')
  <link rel="stylesheet" href="{{ asset('css/photoswipe.css') }}">
  <link rel="stylesheet" href="{{ asset('css/default-skin/default-skin.css') }}">
@endsection

@section('content')
  <div class="page single-abiturientu-napravleniya-podgotovki single-page">
    <div class="single-news-content">
      <div class="container">
        <div class="page-title-wrapper">
          <div class="page-title">{{ $single_napravlenie->title }}</div>
          <span class="history-back" onclick="window.history.back()">&lt;&lt;&nbsp;Назад</span>
        </div>
        @if($single_napravlenie->gallery)
          <div class="gallery">
            @foreach($single_napravlenie->gallery as $glr)
              <figure class="figure gallery-item">
                <a href="{{ Storage::url($glr->image) }}" data-size="800x600">
                  <img src="{{ Storage::url($glr->image) }}" alt="">
                </a>
              </figure>
            @endforeach
          </div>
        @endif
        @if($single_napravlenie->chairman)
          <div class="chairman-wrapper text-wrapper">
            <div class="title">Председатель:</div>
            <div class="chairman">{{ $single_napravlenie->chairman }}</div>
          </div>
        @endif
        @if($single_napravlenie->teachers)
          <div class="teachers-wrapper text-wrapper">
            <div class="title">Преподаватели:</div>
            <div class="teachers">{{ $single_napravlenie->teachers }}</div>
          </div>
        @endif
        @if($single_napravlenie->diploma)
          <div class="diploma-wrapper text-wrapper">
            <div class="title">Диплом:</div>
            <div class="diploma">{{ $single_napravlenie->diploma }}</div>
          </div>
        @endif
        <div class="text">
          <div class="single-text">{!! $single_napravlenie->text !!}</div>
          <div class="clear-both"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- pswp -->
  <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
      <div class="pswp__container">
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
      </div>
      <div class="pswp__ui pswp__ui--hidden">
        <div class="pswp__top-bar">
          <div class="pswp__counter"></div>
          <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
          <button class="pswp__button pswp__button--share" title="Share"></button>
          <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
          <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
          <div class="pswp__preloader">
            <div class="pswp__preloader__icn">
              <div class="pswp__preloader__cut">
                <div class="pswp__preloader__donut"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
          <div class="pswp__share-tooltip"></div> 
        </div>
        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
        <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
        <div class="pswp__caption">
          <div class="pswp__caption__center"></div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="{{ asset('js/photoswipe.min.js') }}"></script>
  <script src="{{ asset('js/photoswipe-ui-default.min.js') }}"></script>
  <script src="{{ asset('js/pswp.js') }}"></script>
@endsection