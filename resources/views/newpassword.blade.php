<div class="modal fade" id="newPassModal" tabindex="-1" role="dialog" aria-labelledby="newPassLabel" aria-hidden="true">
    <div class="modal-dialog bg-navy wishy-rounded" role="document">
        <div class="modal-content bg-navy wishy-rounded">
            <div class="modal-header wishy-rounded-top bg-navy text-white">
                <h5 class="modal-title" id="newPassLabel">Password Change</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-navy text-white">
                <form id="passwordChange" class="mb-2" method="post" action="" data-id={{ Illuminate\Support\Facades\Auth::user()->id }}>
                    {{csrf_field()}}
                    <div id="current">
                        <div class="form-group">
                            <label for="currentPassword">Current Password</label>
                            <input name="currentPassword" type="password" class="form-control" id="currentPassword" placeholder="Enter current password">
                        </div>
                        <button id="currentPasswordSubmit" type="button" class="btn btn-gold">Submit</button><div></div>
                    </div>
                    <div id="newPass">
                        <div class="form-group">
                            <label for="new">New Password</label>
                            <input name="new" type="text" class="form-control" id="new" placeholder="Enter new">
                        </div>
                        <div class="form-group">
                            <label for="confirm">Password Confirmation</label>
                            <input name="confirm" type="text" class="form-control" id="confirm" placeholder="Confirm password">
                        </div>
                        <button id="PasswordChangeSubmit" type="submit" class="btn btn-gold">Submit</button>
                    </div>
                    <div id="message"></div>
                </form>
            </div>
            <div class="modal-footer wishy-rounded-bottom bg-navy text-white">
                <button type="button" class="btn btn-gold" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>