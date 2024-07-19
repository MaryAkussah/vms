<div class="modal fade bd-example-modal-lg mt-5" id="editAttendance<?=$fetch['attendance_id']?>" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Manage Attendance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" method="POST" action="php_action/updateAttendance.php">
                          <input type="hidden" name="staff_id" id="" value="<?= $staff_id?>">
                          <input type="hidden" name="attendance_id" value="<?=$fetch['attendance_id']?>">
                      <div class="row">
                        <div class="form-group col-sm-12 col-md-8 col-lg-6">
                          <label for="frist_name">Staff Name</label>
                          <input id="frist_name" type="text" class="form-control" name="first_name" value="<?= $fetch['first_name']?>" readonly>
                        </div>
                        <div class="form-group col-sm-12 col-md-8 col-lg-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="staff_email" value="<?= $fetch['staff_email'] ?>" readonly>     
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-sm-12 col-md-8 col-lg-6">
                          <label for="time_in">Time In</label>
                          <input id="time_in" type="time" class="form-control" name="time_in" value="<?= $fetch['time_in']?>" readonly>
                        </div>
                        <div class="form-group col-sm-12 col-md-8 col-lg-6">
                            <label for="time_out">Time Out</label>
                            <input type="time" class="form-control" name="time_out" value="<?php echo date('H:i:s');?>" readonly>     
                        </div>
                      </div>
                 
                  
                  

                  <div>
                    <button type="submit" name="updateAttendance" class="btn btn-sm btn-primary"><i class="fas fa-save mx-2"></i> Update Attendance</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>