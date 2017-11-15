@extends('wrapper')

@section('title')
    Feed
@endsection

@section('content')
    <div class="container mt-3">
        <div class="row">
            <?=$friends?>
            <?=$posts?>
            <?=$events?>
        </div>
    </div>

@endsection