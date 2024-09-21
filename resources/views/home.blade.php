@extends('layouts.app')

@section('content')
    <div class="d-flex">
        @foreach ($cities->lazy()->split(5) as $chunk)
            <ul class="list-unstyled">
                @foreach ($chunk as $city)
                    <li>
                        <a href="{{ $city->slug }}">{{ $city->name }}</a>
                    </li>
                @endforeach
            </ul>
        @endforeach
    </div>
@endsection
