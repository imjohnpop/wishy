<div class="modal fade" id="changePictureModal" tabindex="-1" role="dialog" aria-labelledby="changePictureLabel" aria-hidden="true">
    <div class="modal-dialog bg-navy wishy-rounded" role="document">
        <div class="modal-content bg-navy wishy-rounded">
            <div class="modal-header wishy-rounded-top bg-navy text-white">
                <h5 class="modal-title" id="changePictureLabel">Change your profile picture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-navy text-white">
                <form class="mb-2" method="post" action="" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="category" value="picture">
                    <div class="form-group">
                        <label for="profile_picture" class="control-label">Profile Picture:</label>
                        <input id="profile_picture" type="file" class="form-control" name="profile_picture">
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