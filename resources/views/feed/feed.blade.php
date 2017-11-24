@extends('wrapper')

@section('title')
    Feed
@endsection

@section('content')
    <div class="container mt-3">
        <div class="row">
            <section id="head" class="wishy-profile col-3">
                <?= $headView ?>
                <?=$friends?>
            </section>
            <section id="goals" class="col-6 mx-auto">
                <?=$posts?>
            </section>
            <section id="events" class="sticky-top">
                <?=$events?>
            </section>
        </div>
    </div>
    <?=$newPassView?>
@endsection
