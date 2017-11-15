<section class="col-3">
    <div class="wishy-profile wishy-friends-list col-12 mr-auto bg-light wishy-shadow-box-blue wishy-rounded mt-4">
        <div class="wishy-profile-friends pt-2">
            <h4 class="wishy-bold text-uppercase text-center">my friends</h4>
        </div>
        <div class="col-12 wishy-friends-search">
            <form action="" method="get">
                {{ csrf_field() }}
                <div class="form-group">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input id="search" type="text" class="form-control" name="search" placeholder="SEARCH...">
                </div>
            </form>
        </div>
        <div class="list">
            <div class="row mb-2">
                <div class="col-4 d-flex justify-content-around">
                    <img class="" src="/img/ludo.jpg" alt="Random profile picture">
                </div>
                <div class="col-8">
                    <p class="wishy-bold"><i class="fa fa-circle online" aria-hidden="true"></i> Ludo Holbik</p>
                </div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-4 d-flex justify-content-around">
                    <img class="" src="/img/jan.jpg" alt="Random profile picture">
                </div>
                <div class="col-8">
                    <p class="wishy-bold"><i class="fa fa-circle online" aria-hidden="true"></i> Jan Poprocsi</p>
                </div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-4 d-flex justify-content-around">
                    <img class="" src="/img/elena.jpg" alt="Random profile picture">
                </div>
                <div class="col-8">
                    <p class="wishy-bold"><i class="fa fa-circle offline" aria-hidden="true"></i> Elena Porras</p>
                </div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-4 d-flex justify-content-around">
                    <img class="" src="/img/ludo.jpg" alt="Random profile picture">
                </div>
                <div class="col-8">
                    <p class="wishy-bold"><i class="fa fa-circle online" aria-hidden="true"></i> Ludo Holbik</p>
                </div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-4 d-flex justify-content-around">
                    <img class="" src="/img/jan.jpg" alt="Random profile picture">
                </div>
                <div class="col-8">
                    <p class="wishy-bold"><i class="fa fa-circle online" aria-hidden="true"></i> Jan Poprocsi</p>
                </div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-4 d-flex justify-content-around">
                    <img class="" src="/img/elena.jpg" alt="Random profile picture">
                </div>
                <div class="col-8">
                    <p class="wishy-bold"><i class="fa fa-circle offline" aria-hidden="true"></i> Elena Porras</p>
                </div>
            </div>
            <hr>
        </div>

    </div>
</section>