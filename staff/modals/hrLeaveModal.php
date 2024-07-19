<!-- Example of how you can populate the modal form fields with fetched data -->
<div class="modal fade" id="editLeave<?= $fetch['leave_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editLeaveModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLeaveModal">Edit Leave Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form fields populated with fetched data -->
                <form action="php_action/leaveApproval.php" method="post">
                    <input type="hidden" name="leave_id" value="<?= $fetch['leave_id'] ?>">
                    <div class="form-group">
                        <label for="first_name"> Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $fetch['first_name'] ?><?= $fetch['last_name'] ?>" readonly>
                    </div>
                    <!-- <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="" readonly>
                    </div> -->
                    <div class="form-group">
                        <label for="leaveReason">Leave Reason</label>
                        <input type="text" class="form-control" id="leaveReason" name="leave_reason" value="<?= $fetch['leave_reason'] ?>" readonly>
                    </div>
                    <!-- Add more form fields as needed -->
                    <!-- For example: -->
                    <div class="form-group">
                        <label for="startDate">Start Date</label>
                        <input type="text" class="form-control" id="startDate" name="start_date" value="<?= date('d-m-Y', strtotime($fetch['start_date'])) ?>" readonly>
                    </div>


                    <div class="form-group">
                        <label for="endDate">End Date</label>
                        <input type="text" class="form-control" id="endDate" name="end_date" value="<?= date('d-m-Y', strtotime($fetch['end_date'])) ?>" readonly>
                    </div>

                    <div class="form-group">
                    <label for="state">State</label>
                        <select class="form-control"  name="state">
                            <option value="Approved by HR">Approved by HR </option>
                            <option value="Declined by HR">Declined by HR </option>

                        </select>
                    </div>


                    
                    <div class="form-group">
                        <label for="endDate">Comments  </label>
                        <input type="text" class="form-control" id="leave_comment" name="leave_comment" value="<?= $fetch['leave_comment'] ?>">
                    </div>
                    <!-- Add more form fields for other fetched data -->
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
