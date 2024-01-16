<div class="modal fade text-left modal-borderless" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="updatePassword" method="POST" class="form">
                <div class="form-group">
                  <label for="helperText">Password</label>
                  <input type="password" id="password" name="password" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label for="helperText">Confirm Password</label>
                  <input type="password" id="confirm" name="confirm" class="form-control" value="">
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal" id="passwordModalCancel" onclick="hidePasswordModal()">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Cancel</span>
                </button>
                <button type="button" class="btn btn-danger ml-1" data-bs-dismiss="modal" id="passwordModalAccept" onclick="updatePassword()">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Accept</span>
                </button>
            </div>
        </div>
    </div>
</div>

