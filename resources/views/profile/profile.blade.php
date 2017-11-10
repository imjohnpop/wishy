@extends('wrapper')

@section('title')
    Profile
@endsection

@section('content')
    <div class="container mt-3">
        <div class="row">
            <?=$head?>
            <div class="col-6">
                <?=$wishgoalnav?>
                <?=$wishes?>
                <?=$goals?>
            </div>
            <div class="col-3">
                <?=$posts?>
            </div>
        </div>
    </div>

@endsection
