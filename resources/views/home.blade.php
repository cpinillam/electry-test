@extends('layout.app')

@section('content')

    <div class="main-container">

        <div class="row  d-flex justify-content-around">
            <div class="cat-header block clear rounded-pill">
                <h2 class="titular"><strong>Cats Facts</strong></h2>
                <div class="title-counter">
                    <p class="subtitle-counter">Total facts<br><span class="number-counter"> {{ $countFacts }}</span></p>
                    <img src="svg/cat-header.svg">
                </div>
            </div>
        </div>


        <div class="infinite-scroll">
            @foreach ($paginateFactsCat as $singleCatFact)
                <div class="facts block">
                    <div class="type-fact"><span></span><div class="icon-type rounded-pill">{{ $singleCatFact['type'] }}</div> </div>
                    <p><span>{{ $singleCatFact['fName'] }} {{ $singleCatFact['lName'] }} </span> <br>
                        <span class="quotation">"</span> {{ $singleCatFact['text'] }} <span class="quotation">"</span> </p>
                    <div class="votes rounded-pill"><img src="svg/hand.svg">{{ $singleCatFact['upvotes'] }}</div>
                </div>
            @endforeach
            <div class="col-12 ">{{$paginateFactsCat->links()}}</div>
        </div>


    </div>


@endsection
