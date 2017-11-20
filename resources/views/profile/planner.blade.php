@extends('wrapper')

@section('title')
    Goals planner
@endsection

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-3">
                <?=$head?>
            </div>
            <div class="col-9">
                <?=$planner?>
            </div>
        </div>
    </div>

@endsection