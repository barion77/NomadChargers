@extends('layouts.default')

@section('content')

    <main class="section">
        <div class="container">
            <div class="list">
                @foreach($favourites as $favourite)
                    <div class="list__item">
                        <div class="title {{ $favourite->charger->busy ? 'inactive' : '' }}">
                            <h2 style="font-weight: 500;">{{ $favourite->charger->name }}</h2>
                            <i style="cursor: pointer" id="to-favourite" data-charger_id="{{ $favourite->charger->id }}" class="far fa-heart {{ auth()->user()->favourites()->where('charger_id', $favourite->charger->id)->exists() ? 'fill-heart' : '' }} icon"></i>
                        </div>
                        <p class="item__address">{{ $favourite->charger->address }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

@endsection

@section('scripts')

    <script>

        $('#to-favourite').click(function () {

            $(this).find('.list__item').remove();
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
