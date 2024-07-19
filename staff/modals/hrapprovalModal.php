<!-- Modal for HR Leave Approval -->
<div class="modal fade" id="editLeave<?= $fetch['leave_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editLeaveLabel<?= $fetch['leave_id'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLeaveLabel<?= $fetch['leave_id'] ?>">HR Leave Approval</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- HR Leave Approval Form -->
                <form action="hr_approval_handler.php" method="POST">
                    <div class="form-group">
                        <label for="leaveReason">Leave Reason</label>
                        <textarea class="form-control" id="leaveReason" name="leave_reason" rows="3" readonly><?= $fetch['leave_reason'] ?></textarea>
                    </div>
                    <input type="hidden" name="leave_id" value="<?= $fetch['leave_id'] ?>">
                    <input type="hidden" name="staff_id" value="<?= $staff_id ?>">
                    <div class="form-group">
                        <label for="approvalStatus">Approval Status</label>
                        <select class="form-control" id="approvalStatus" name="approval_status">
                            <option value="Approved">Approved</option>
                            <option value="Rejected">Rejected</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="comments">Comments</label>
                        <textarea class="form-control" id="comments" name="comments" rows="3" placeholder="Enter comments"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submit_approval">Submit Approval</button>
            </div>
            </form>
        </div>
    </div>
</div>
