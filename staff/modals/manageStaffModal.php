<div class="modal fade bd-example-modal-lg mt-5" id="manageStaff<?=$fetch['staff_id']?>" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Manage Staff</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form class="needs-validation" method="POST" action="php_action/manageStaff.php" novalidate="">
                      <div class="card-body">
                      <div class="row">
                        <input type="hidden" name="staff_id" value="<?= $fetch['staff_id']?>">
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                          <label for="frist_name">First Name</label>
                          <input id="frist_name" type="text" class="form-control" name="first_name" value="<?= $fetch['first_name']?>" >
                          <div class="invalid-feedback">Staff First Name is required</div>
                          </div>
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="last_name">Last Name</label>
                              <input type="text" class="form-control" name="last_name" value="<?= $fetch['last_name']?>" >
                              <div class="invalid-feedback">Staff Last Name is required</div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" name="staff_email" value="<?= $fetch['staff_email']?>">
                              <div class="invalid-feedback">Please enter your email address</div>
                          </div>

                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="phone">Phone</label>
                              <input type="number" class="form-control" name="staff_phone" value="<?= $fetch['staff_phone']?>">
                              <div class="invalid-feedback">Please enter your phone number</div>
                          </div> 
                      </div>

                      <div class="row">
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="staff">Department</label>
                              <select name="department_id" class="form-control" required>
                                      <option value="<?= $fetch['department_id']?>" selected ><?= $fetch['department_name']?></option>
                                          <?php
                                              $staff_department=$fetch['department_id'];
                                          $result = mysqli_query($conn,"SELECT * FROM department WHERE department_id!='$staff_department'");
                                          while($row = mysqli_fetch_array($result)) {
                                          ?>
                                          <option value="<?=$row["department_id"];?>"><?= $row["department_name"];?></option>
                                          <?php
                                          }
                                          ?>
                                  </select>
                              <div class="invalid-feedback">Please enter the staff department</div>
                          </div>
                          
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="staff">Position / Role</label>
                              <select name="staff_role_id" class="form-control" required>
                                      <option value="<?= $fetch['staff_role_id']?>" selected><?= $fetch['staff_role_name']?></option>
                                          <?php
                                            $staff_role=$fetch['staff_role_id'];

                                          $result = mysqli_query($conn,"SELECT * FROM staff_role WHERE staff_role_id!='$staff_role'");
                                          while($row = mysqli_fetch_array($result)) {
                                          ?>
                                          <option value="<?=$row["staff_role_id"];?>"><?= $row["staff_role_name"];?> </option>
                                          <?php
                                          }
                                          ?>
                                  </select>
                              <div class="invalid-feedback">Please enter the staff role</div>
                          </div>
                      </div>
                      </div>
                      <div class="card-footer text-right">
                      <button type="submit" name="updateStaff" class="btn btn-primary"><i class="fas fa-plus mx-2"></i>Update Staff Details</button>
                      </div>
                  </form>
              </div>
            </div>
          </div>
        </div>