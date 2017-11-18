@extends('wrapper')

@section('title')
    Profile
@endsection

@section('content')
    <div class="container mt-3">
        <div class="row">
            <?=$headView?>
            <div class="col-6">
                <?=$wishgoalnavView?>
                <?=$wishesView?>
                <?=$goalsView?>
            </div>
            <div class="col-3">
                <?=$postsView?>
            </div>
        </div>
    </div>
    <?=$addmodalView?>
    <?=$profiledetailView?>
@endsection
