<?php use App\Statuses; $status = Statuses::where('status.id', $goal->status_id)->get()?>

<section class="wishy-planner col-12">
        <div class="wishy-planner col-12 mr-auto bg-light wishy-shadow-box-blue wishy-rounded">
            <div class="row">
                <div class="col-4 mt-3">
                    <img class="w-100" src="http://images.buddytv.com/btv_2_505514777_0_1200_10000_-1_/749729-got-307-01-53.jpg" alt="Me fighting with a bear">
                    <div id="options" class="row mt-5">
                        <div class="col-4">
                            <button id="finishButton" class="btn wishy-btn" data-id="{{ $goal->id }}"><i class="fa fa-flag-checkered" aria-hidden="true"></i></button>
                        </div>
                        <div class="col-4">
                            <button id="editButton" class="btn wishy-btn green" data-id="{{ $goal->id }}"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                        </div>
                        <div class="col-4">
                            <div class="dropdown">
                                <form action="{{ action('GoalsController@destroy', ['id' => $goal->id]) }}" method="post">
                                    {{ csrf_field() }}
                                    <button id="deleteButton" class="btn wishy-btn red" data-id="{{ $goal->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    <div class="dropdown-menu">
                                        <h4 class="text-center">Are you sure?</h4>
                                        <button type="submit" class="dropdown-item btn btn-block bg-danger text-center text-uppercase">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-8 mt-3">
                    <form action="{{ action('GoalsController@update', ['id' => $goal->id]) }}" method="post">
                        {{ csrf_field() }}
                        <h2 class="editing">{{ $goal->name }}</h2>
                        <h2 class="editing hidden"><input class="form-control" type="text" name="name" value="{{ $goal->name }}"></h2>
                        <p class="editing">{{ $goal->description }}</p>
                        <textarea class="form-control editing hidden" name="description" rows="4" type="text">{{ $goal->description }}</textarea>
                        <hr>
                        <div class="row">
                            <div class="col-5 text-center">
                                <h2 class="wishy-bold">{{ $goal->nr_encouragements }}</h2>
                                <p class="wishy-bold text-uppercase text-secondary">encouragements</p>
                            </div>
                            <div class="col-2 text-center wishy-profile-bx">
                                <h2 class="wishy-publicity editing"><?= ($goal->is_public == 1) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-times" aria-hidden="true"></i>' ?></h2>
                                <h2 class="editing hidden"><input class="form-control" type="checkbox" name="is_public" <?= ($goal->is_public == 1) ? 'checked' : '' ?>></h2>
                                <p class="wishy-bold text-uppercase text-secondary">public</p>
                            </div>
                            <div class="col-5 text-center">
                                <h3 id="statusString" class="wishy-bold wishy-minimargin">@foreach($status as $state) {{ $state['tag'] }} @endforeach</h3>
                                <p class="wishy-bold text-uppercase text-secondary">Status</p>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-around mt-2">
                            <button class="editing hidden btn wishy-btn" role="submit">Save changes</button>
                        </div>
                    </form>
                    <hr>
                </div>
            </div>
            <hr>
            <div id="checklists" data-goal="{{ $goal->id }}">

            </div>

        </div>
</section>


<script src="/js/vendor.bundle.js"></script>
<script src="/js/checklist.bundle.js"></script>

<script>
    // CHECKLISTS
    $('#checkbox').click(function() {
        $('#checklistInput').slideToggle();
    });

    $(document).ready(function() {
        $('#checklistInput').hide();
    });

    $('#editButton').click(function() {
        $('.editing').toggleClass('hidden');
    });

    $('#finishButton').click(function() {
        var id = $('#checklists').data('goal');
        $.ajax({
            type: 'post',
            url: '/api/goal/complete/' + id,
            data: {
            }
        }).done((data) => {
            $('#statusString').text('Achieved');
        });
    })

    $('.optionsBtn').click(function() {
        var id = $(this).data('id');

        if($('.optionsBtn').data('id') == id) {
            $(this).toggleClass('hidden');
        }
    })



</script>
