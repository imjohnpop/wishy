{{ dd($goal) }}
<section class="wishy-planner col-9">
        <div class="wishy-planner col-12 mr-auto bg-light wishy-shadow-box-blue wishy-rounded">
            <div class="row">
                <div class="col-4 mt-3">
                    <img class="w-100" src="http://images.buddytv.com/btv_2_505514777_0_1200_10000_-1_/749729-got-307-01-53.jpg" alt="Me fighting with a bear">
                </div>
                <div class="col-8 mt-3">
                    <h2>{{ $goal->name }}</h2>
                    <p>{{ $goal->description }}</p>
                    <div class="row">
                        <div class="col-3">
                            <h2 class="wishy-bold">{{ $goal->nr_encouragements }}</h2>
                            <p class="wishy-bold text-uppercase text-secondary">encouragements</p>
                        </div>
                        <div class="col-3">
                            <h2 class="wishy-bold"><?= ($goal->is_public == 1) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-times" aria-hidden="true"></i>' ?></h2>
                            <p class="wishy-bold text-uppercase text-secondary">public</p>
                        </div>
                        <div class="col-3">
                            <h2 class="wishy-bold">53</h2>
                            <p class="wishy-bold text-uppercase text-secondary">friends</p>
                        </div>
                        <div class="col-3">
                            <h2 class="wishy-bold">53</h2>
                            <p class="wishy-bold text-uppercase text-secondary">friends</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

