<?php use App\Statuses; $status = Statuses::where('status.id', $goal->status_id)->get()?>

<section class="wishy-planner col-12">
        <div class="wishy-planner col-12 mr-auto bg-light wishy-shadow-box-blue wishy-rounded">
            <div class="row">
                <div class="col-4 mt-3">
                    <img class="w-100" src="http://images.buddytv.com/btv_2_505514777_0_1200_10000_-1_/749729-got-307-01-53.jpg" alt="Me fighting with a bear">
                </div>
                <div class="col-8 mt-3">
                    <h2>{{ $goal->name }}</h2>
                    <p>{{ $goal->description }}</p>
                    <hr>
                    <div class="row">
                        <div class="col-5 text-center">
                            <h2 class="wishy-bold">{{ $goal->nr_encouragements }}</h2>
                            <p class="wishy-bold text-uppercase text-secondary">encouragements</p>
                        </div>
                        <div class="col-2 text-center wishy-profile-bx">
                            <h2 class="wishy-publicity"><?= ($goal->is_public == 1) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-times" aria-hidden="true"></i>' ?></h2>
                            <p class="wishy-bold text-uppercase text-secondary">public</p>
                        </div>
                        <div class="col-5 text-center">
                            <h3 class="wishy-bold wishy-minimargin">@foreach($status as $state) {{ $state['tag'] }} @endforeach</h3>
                            <p class="wishy-bold text-uppercase text-secondary">Status</p>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-6">
                    <div class="row d-flex justify-content-around">
                        <div class="col-10 mx-auto">
                            <button id="checkbox" class="btn btn-block wishy-btn"><i class="fa fa-check-square-o" aria-hidden="true"></i> Add checklist</button>
                        </div>
                    </div>
                    <div id="checklists" class="row mt-2">
                        <div class="col-10 bg-dark mx-auto rounded">
                            <div class="row">
                                <div class="col-8">
                                    <input type="text" data-goal="{{ $goal->id }}"class="form-control w-100 my-2" placeholder="Enter title">
                                </div>
                                <div class="col-4">
                                    <button id="createChecklist" class="btn wishy-btn my-2">Create</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div id="calendar">
                    </div>
                </div>
            </div>
        </div>
</section>



<script>
    // CHECKLISTS
    $('#checkbox').click(function() {
        $('#checklists').slideToggle();
    });

    $('#createChecklist').click(function() {
        $.ajax({
            "url" : "/api/checklist/new",
            "type" : "post",
            "data" : {
                "goal_id" : $('#checklists input').data('goal'),
                "title" : $('#checklists input').val()
            }
        }).done(function(data) {
            // code to run when success
        })
    });

    // FULL CALENDAR
    $(document).ready(function() {
        $('#checklists').hide();
        var d = new Date();
        var n = d.getMonth();
        var month = n + 1;

        $('#calendar').fullCalendar({
            header: {
                left: '',
                center: 'title prev,next',
                right: ''
            },
            defaultDate: '2017-' + month + '-01',
            navLinks: false, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                {
                    title: 'Event nr-1',
                    start: '2017-11-01'
                },
                {
                    title: 'TEsting event asdasfasfasfasfas',
                    start: '2017-11-10'
                },
                {
                    title: 'asfasfasfasfa at asfasfasfa sf',
                    start: '2017-11-25'
                },
                {
                    title: 'sfa at fas fasfasfasfasf',
                    start: '2017-12-01'
                }
            ]
        });

    });

</script>
