<section id="wishgoal-nav">

    <div class="wishgoal-nav col-12 wishy-rounded wishy-shadow-box-blue ml-0 row py-1">
        <div class="col-6 text-center">
            <a href="#" class="show-wishes-btn">Wishes</a>
            @if (!isset($friend))
            <a href="#" class="wish-plus" data-toggle="modal" data-target="#addwishModal"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
            @endif
        </div>
        <div class="col-6 text-center">
            <a href="#" class="show-goals-btn">Goals</a>
            @if (!isset($friend))
            <a href="#" class="wish-plus" data-toggle="modal" data-target="#addwishModal"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
            @endif
        </div>
    </div>

</section>