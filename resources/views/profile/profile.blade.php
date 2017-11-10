@extends('wrapper')

@section('title')
    Profile
@endsection

@section('content')
    <div class="container mt-3">
        <div class="row">
            <?=$head?>
            <div class="col-5">
                <?=$wishgoalnav?>
                <?=$wishes?>
            </div>
        </div>
    </div>

@endsection
