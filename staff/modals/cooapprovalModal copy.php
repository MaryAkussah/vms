<div class="modal fade bd-example-modal-lg mt-5" id="editLeave<?=$fetch['leave_id']?>" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Approve Department Staff Leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" method="POST" action="php_action/leaveApproval.php">
                          <input type="hidden" name="supervisor_id" id="" value="<?= $staff_id?>">
                          
                          <input type="hidden" name="leave_id" value="<?=$fetch['leave_id']?>">
                      <div class="row">
                        <div class="form-group col-sm-12 col-md-8 col-lg-6">
                          <label for="frist_name">Staff Name</label>
                          <input id="frist_name" type="text" class="form-control" name="" value="<?= $fetch['first_name']?> <?= $fetch['last_name']?>" readonly>
                        </div>
                        <div class="form-group col-sm-12 col-md-8 col-lg-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="" value="<?= $fetch['staff_email'] ?>" readonly>     
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-sm-12 col-md-8 col-lg-6">
                          <label for="start_date">Start Date</label>
                          <input id="start_date" type="text" class="form-control" name="start_date" value="<?= date('d-m-Y', strtotime($fetch['start_date'])) ?>" readonly>
                        </div>
                        <div class="form-group col-sm-12 col-md-8 col-lg-6">
                            <label for="end_date">End Date</label>
                            <input type="text" class="form-control" name="end_date" value="<?=date('d-m-Y', strtotime($fetch['end_date']))?>" readonly>     
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-sm-12 col-md-8 col-lg-6">
                          <label for="start_date">COO</label>
                          <select name="staff_id" id="" class="form-control">
                              <?php

                                $result = mysqli_query($conn,"SELECT * FROM tbl_staff WHERE staff_id=4");
                                while($row = mysqli_fetch_array($result)) {
                              ?>
                                <option value="<?=$row["staff_id"];?>"><?= $row["first_name"];?> <?= $row["last_name"]?></option>
                              <?php
                                }
                              ?>
                          </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-8 col-lg-6">
                          <label for="start_date">Remarks</label>
                          <textarea class="form-control" name="remarks"></textarea>
                        </div>
                      </div>
                  <div>
                    <button type="submit" name="approveLeave" class="btn btn-sm btn-primary"><i class="fas fa-save mx-2"></i> Approve & Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        
        
        
        
        
        
        <div class="modal fade bd-example-modal-lg mt-5" id="declineLeave<?=$fetch['leave_id']?>" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Decline Department Staff Leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" method="POST" action="php_action/updateAttendance.php">
                          <input type="hidden" name="supervisor_id" id="" value="<?= $staff_id?>">
                          
                          <input type="hidden" name="leave_id" value="<?=$fetch['leave_id']?>">
                      <p> Are you sure you want to decline leave from <span class="badge badge-success"> <?= $fetch['last_name']?> <?= $fetch['first_name']?> </span> ??</p>
                  <div>
                    <button type="submit" name="declineLeave" class="btn btn-sm btn-danger"><i class="fas fa-trash mx-2"></i> Decline</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>