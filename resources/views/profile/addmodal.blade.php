

<!-- Wishes Add Modal -->
<!-- ---------------------- -->
<div class="modal fade" id="addwishModal" tabindex="-1" role="dialog" aria-labelledby="addwishLabel" aria-hidden="true">
    <div class="modal-dialog bg-navy wishy-rounded" role="document">
        <div class="modal-content bg-navy wishy-rounded">
            <div class="modal-header wishy-rounded-top bg-navy text-white">
                <h5 class="modal-title" id="addwishLabel">Add Wish</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-navy text-white">
                <form class="mb-2" method="post" action="{{action('WishController@store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Wish Title</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Enter title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input name="description" type="text" class="form-control" id="description" placeholder="Enter description">
                    </div>
                    <div class="form-group">
                        <label for="is_public">Make it public? </label>
                        <input name="is_public" type="checkbox" class="form-control" id="is_public" checked>
                    </div>
                    <div class="form-group">
                        <label for="wish_picture">Wish Picture</label>
                        <div class="col">
                            <input name="wish_picture" type="file" class="form-control" id="wish_picture">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-gold">Submit</button>
                </form>
            </div>
            <div class="modal-footer wishy-rounded-bottom bg-navy text-white">
                <button type="button" class="btn btn-gold" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Goals Add Modal -->
<!-- ---------------------- -->
<div class="modal fade" id="addGoalModal" tabindex="-1" role="dialog" aria-labelledby="addwishLabel" aria-hidden="true">
    <div class="modal-dialog bg-navy wishy-rounded" role="document">
        <div class="modal-content bg-navy wishy-rounded">
            <div class="modal-header wishy-rounded-top bg-navy text-white">
                <h5 class="modal-title" id="addwishLabel">Add Goal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-navy text-white">
                <form class="mb-2" method="post" action="{{action('GoalsController@new')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Goal name</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" placeholder="Enter description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="is_public">Make it public? </label>
                        <input name="is_public" type="checkbox" class="form-control" id="is_public" checked>
                    </div>
                    <div class="form-group">
                        <label for="wish_picture">Goal Picture</label>
                        <div class="col">
                            <input name="goal_picture" type="file" class="form-control" id="goal_picture">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-gold">Submit</button>
                </form>
            </div>
            <div class="modal-footer wishy-rounded-bottom bg-navy text-white">
                <button type="button" class="btn btn-gold" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>