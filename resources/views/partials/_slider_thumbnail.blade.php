@section('splide-css')
    <link rel="stylesheet" href="{{ asset('css/splide.min.css') }}">
@endsection

@foreach ($items as $item)


<section id="main-carousel" class="splide IUidSb__SnkW2" aria-label="My Awesome Gallery">
    <div class="app__box__shadow__sm p-11">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($item->pictures as $picture)
                    <li class="splide__slide">
                        <img src="{{ $picture }}" alt="">
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
<ul id="thumbnails" class="thumbnails">
    @foreach ($item->pictures as $picture)
        <li class="thumbnail">
            <img src="{{ $picture }}" alt="">
        </li>
    @endforeach
</ul>
@endforeach
@section('splide-js')
<script src="{{ asset('js/splide.min.js') }}"></script>
<script>
    document.addEventListener( 'DOMContentLoaded', function () {

        var splide = new Splide( '#main-carousel', {
                pagination: false,
                rewind    : true,
            });

            var thumbnails = document.getElementsByClassName( 'thumbnail' );
            var current;

            for ( var i = 0; i < thumbnails.length; i++ ) {
                initThumbnail( thumbnails[ i ], i );
            }

            function initThumbnail( thumbnail, index ) {
                thumbnail.addEventListener( 'click', function () {
                    splide.go( index );
                });
            }

            splide.on( 'mounted move', function () {
            var thumbnail = thumbnails[ splide.index ];

            if ( thumbnail ) {
                if ( current ) {
                    current.classList.remove( 'is-active' );
                }

                thumbnail.classList.add( 'is-active' );
                current = thumbnail;
            }
        });

        splide.mount();
    })


</script>
@endsection
