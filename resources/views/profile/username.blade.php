<div class="modal fade" id="changeNameModal" tabindex="-1" role="dialog" aria-labelledby="changeNameLabel" aria-hidden="true">
    <div class="modal-dialog bg-navy wishy-rounded" role="document">
        <div class="modal-content bg-navy wishy-rounded">
            <div class="modal-header wishy-rounded-top bg-navy text-white">
                <h5 class="modal-title" id="changeNameLabel">Change your name</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-navy text-white">
                <form class="mb-2 form-horizontal" method="post" action="">
                    {{csrf_field()}}
                    <input type="hidden" name="category" value="username">
                    <div class="form-group">
                        <label for="name" class="col control-label"><i class="fa fa-user"
                                                                       aria-hidden="true"></i></label>
                        <div class="col">
                            <input id="name" type="text" class="form-control" name="name" placeholder="FIRSTNAME" required value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="surname" class="col control-label"><i class="fa fa-user"
                                                                       aria-hidden="true"></i></label>
                        <div class="col">
                            <input id="surname" type="text" class="form-control" name="surname" placeholder="SURNAME" required value="{{ $user->surname }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-gold">Submit</button>
                </form>
            </div>
            <div class="modal-footer wishy-rounded-bottom bg-navy text-white">
                <button type="button" class="btn btn-gold" data-dismiss="modal" data-toggle="modal" data-target="#editModal">Back</button>
                <button type="button" class="btn btn-gold" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>