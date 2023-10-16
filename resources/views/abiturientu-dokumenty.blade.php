@section('title', 'Документы')

@extends('layouts.main')

@section('style')
@endsection

@section('content')
  <div class="page abiturientu-dokumenty-page dokumenty-page">
    <div class="container">
      <div class="page-title">Документы</div>
      <div class="documents">
        @foreach($documents as $doc)
          <div class="list-item">
            @switch( $doc->filetype )
              @case("pdf")
                <img class="icon" src="/img/pdf-icon.svg" alt="">
                <a class="name" href="{{ $doc->file }}" target="_blank">{{ $doc->title }}</a>
                @break
              @case("doc")
                <img class="icon" src="/img/word-icon.svg" alt="">
                <a class="name" href="{{ $doc->file }}" download>{{ $doc->title }}</a>
                @break
              @case("xls")
                <img class="icon" src="/img/excel-icon.svg" alt="">
                <a class="name" href="{{ $doc->file }}" download>{{ $doc->title }}</a>
                @break
            @endswitch
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection

@section('script')
@endsection