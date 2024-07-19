<div class="modal fade bd-example-modal-lg mt-5" id="transfer<?=$fetch['check_in_id']?>" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Transfer Visitor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" method="POST" action="php_action/transferVisitor.php">
                    <input type="hidden" name="visitor_id" value="<?= $fetch['visitor_id']?>">
                    <input type="hidden" name="check_in_id" value="<?= $fetch['check_in_id']?>">
                    <input type="hidden" name="time_in" value="<?= $fetch['time_in']?>">
                    <input type="hidden" name="date_in" value="<?= $fetch['date_in']?>">
                    <input type="hidden" name="old_staff_id" value="<?= $fetch['staff_id']?>">
                    <input type="hidden" name="team_id" value="<?= $fetch['team_id']?>">

                          <input type="hidden" name="user_id" id="" value="<?= $user_id?>">
                      <div class="row">
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                            <label for="frist_name">Visitor Name</label>
                            <input id="frist_name" type="text" class="form-control" name="full_name" value="<?= $fetch['full_name']?>" readonly>
                          </div>
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="time_in">Time In</label>
                              <input type="time" class="form-control" name="time_in" value="<?= $fetch['time_in'] ?>" readonly>
                          </div>
                      </div>
                      <div class="row">
                          
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="staff">Host Name</label>
                              <input type="text" class="form-control"  value="<?= $fetch['first_name']?> <?= $fetch['last_name']?>" readonly>
                          </div> 
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="staff">Department</label>
                              <input type="text" class="form-control"  value="<?= $fetch['department_name']?>" readonly>
                          </div> 
                      </div>
                      <div class="row">
                          
                      <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="staffnew">New Host Name</label>
                              <select name="staff_id" class="form-control" required>
                                      <option value="" selected>--SELECT STAFF NAME--</option>
                                          <?php

                                          $result = mysqli_query($conn,"SELECT * FROM tbl_staff WHERE status_id=1");
                                          while($row = mysqli_fetch_array($result)) {
                                          ?>
                                          <option value="<?=$row["staff_id"];?>"><?= $row["first_name"]?> <?= $row["last_name"]?></option>
                                          <?php
                                          }
                                          ?>
                                  </select>
                                  
                          </div>

                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="staff">Purpose</label>
                              <textarea  class="form-control" name="purpose"><?= $fetch['purpose']?></textarea>
                          </div>
                      </div>
                 
                  
                  

                  <div>
                    <button type="submit" name="visitorTransfer" class="btn btn-sm btn-primary"><i class="fas fa-arrow-right mx-2"></i>Transfer Visitor</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>