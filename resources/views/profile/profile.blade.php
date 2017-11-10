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
            </div>
        </div>
    </div>

@endsection
