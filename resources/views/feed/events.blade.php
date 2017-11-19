<section class="col-3">
    <div class="wishy-profile wishy-friends-list col-12 mr-auto bg-light wishy-shadow-box-blue wishy-rounded mt-4">
        <div class="wishy-profile-friends pt-2">
            <h4 class="wishy-bold text-uppercase text-center">upcoming events</h4>
        </div>
        <div class="list">
            @foreach ($events_list as $event)
                <?php 
                    $date = substr($event['date'], 5);
                ?>
                <div class="row mb-2">
                    <div class="calendar col-4 d-flex justify-content-around">
                        <img class="" src="/img/calendar.png" alt="calendar" style="border:none; border-radius:0px;">
                        <span style="margin-left:-4em; margin-top: 1em;">{{$date}}</span>
                    </div>
                    <div class="col-8">
                        <p class="wishy-bold"> {{$event['name']}}</p>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
</section>