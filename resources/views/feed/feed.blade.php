@extends('wrapper')

@section('title')
    Feed
@endsection

@section('content')
    <div class="container mt-3">
        <div class="row">
            <section class="wishy-profile col-3">
                <?=$friends?>
            </section>
            <div id="goals" class="col-6">
                <?=$posts?>
            </div>
            <?=$events?>
        </div>
    </div>
    <?=$newPassView?>
@endsection
