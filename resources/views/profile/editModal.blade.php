<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog bg-navy wishy-rounded" role="document">
        <div class="modal-content bg-navy wishy-rounded">
            <div class="modal-header wishy-rounded-top bg-navy text-white">
                <h5 class="modal-title" id="changeNameLabel">What do you want to edit?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-navy text-white d-flex justify-content-between">
                <div class="btn-group">
                    <a href="#" class="btn wishy-btn picturemodal text-white" data-dismiss="modal" data-toggle="modal" data-target="#changePictureModal" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <span class="btn bg-gold">Profile Picture</span>
                    <form action="" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="category" value="delete">
                        <button class="btn wishy-btn text-white" type="submit" title="Delete"><i class="fa fa-minus" aria-hidden="true"></i></button>
                    </form>
                </div>
                <a href="#" class="btn wishy-btn namemodal text-white" data-dismiss="modal" data-toggle="modal" data-target="#changeNameModal"><i class="fa fa-pencil mr-1" aria-hidden="true"></i>Name</a>
                <a href="#" class="btn wishy-btn detailmodal text-white" data-dismiss="modal" data-toggle="modal" data-target="#addProfileInfoModal"><i class="fa fa-pencil mr-1" aria-hidden="true"></i>Details</a>
            </div>
            <div class="modal-footer wishy-rounded-bottom bg-navy text-white">
                <button type="button" class="btn btn-gold" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>