<!-- Example of how you can populate the modal form fields with fetched data -->
<div class="modal fade" id="editLeave<?= $fetch['assessment_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editLeaveModal" aria-hidden="true">
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
                <form action="php_action/assessmentApproval.php" method="post">
                    <input type="hidden" name="assessment_id" value="<?= $fetch['assessment_id'] ?>">
                    <div class="form-group">
                        <label for="first_name"> Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $fetch['first_name'] ?><?= $fetch['last_name'] ?>" readonly>
                    </div>
                    <!-- <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="" readonly>
                    </div> -->
                    <div class="form-group">
                        <label for="projectTitle">Project Title </label>
                        <input type="text" class="form-control" id="projectTitle" name="project_title" value="<?= $fetch['project_title'] ?>" readonly>
                    </div>
                    <!-- Add more form fields as needed -->
                    <!-- For example: -->
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <input type="text" class="form-control" id="remarks" name="remarks" value="<?=$fetch['remarks']  ?>" readonly>
                    </div>


                    <div class="form-group">
                        <label for="endDate">Date</label>
                        <input type="text" class="form-control" id="Date" name="date" value="<?= date('d-m-Y', strtotime($fetch['date'])) ?>" readonly>
                    </div>

                    <div class="form-group">
                    <label for="state">State</label>
                        <select class="form-control"  name="state">
                            <option value="Approved by HOD">Approved by HOD </option>
                            <option value="Decline">Decline </option>

                        </select>
                    </div>


                    <div class="form-group">
                        <label for="endDate">Comments  </label>
                        <input type="text" class="form-control" id="assessment_comment" name="assessment_comment" value="<?= $fetch['assessment_comment'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="progress">Progress  </label>
                        <input type="text" class="form-control" id="progress" name="progress" value="<?= $fetch['progress'] ?>" readonly>
                    </div>
                    <!-- Add more form fields for other fetched data -->
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
