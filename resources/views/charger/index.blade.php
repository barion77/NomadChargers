@extends('layouts.default')

@section('content')

    <main class="section">
        <div class="container">
            <div class="list">
                @foreach($chargers as $charger)
                    <div class="list__item">
                        <div class="title {{ $charger->busy ? 'inactive' : '' }}">
                            <h2 style="font-weight: 500;">{{ $charger->name }}</h2>
                            @if (auth()->check())
                                <i style="cursor: pointer" id="to-favourite" data-charger_id="{{ $charger->id }}" class="far fa-heart {{ auth()->user()->favourites()->where('charger_id', $charger->id)->exists() ? 'fill-heart' : '' }} icon"></i>
                            @else
                                <a href="{{ route('login') }}"><i class="far fa-heart icon"></i></a>
                            @endif
                        </div>
                        <p class="item__address">{{ $charger->address }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

@endsection

@section('scripts')

    <script>

        $('#to-favourite').click(function () {

            $(this).toggleClass('fill-heart')
            let charger_id = $(this).data('charger_id');

            $.ajax({
                url: '{{ route('favourite.add') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    charger_id: charger_id,
                },
                success: function (response) {
                    console.log(response.message);
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });

        });

    </script>

@endsection
