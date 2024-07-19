<div class="modal fade bd-example-modal-lg mt-5" id="manageVisitor<?=$fetch['visitor_id']?>" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Manage Visitor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" method="POST" action="php_action/updateVisitor.php">
                    <input type="hidden" name="visitor_id" value="<?= $fetch['visitor_id']?>">

                    <div class="card-header">Basic Info</div>
                          <input type="hidden" name="user_id" id="" value="<?= $user_id?>">
                      <div class="row">
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                            <label for="frist_name">Visitor Name</label>
                            <input id="frist_name" type="text" class="form-control" name="full_name" value="<?= $fetch['full_name']?>" required="">
                            <div class="invalid-feedback">Please enter the visitor's name</div>
                          </div>
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" name="visitor_email" value="<?= $fetch['visitor_email'] ?>" required="">
                              <div class="invalid-feedback">Please enter your email address</div>
                          </div>
                      </div>
                      <div class="row">
                          
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="phone">Phone</label>
                              <input type="number" class="form-control" name="visitor_phone" value="<?= $fetch['visitor_phone']?>" required="">
                              <div class="invalid-feedback">Please enter your phone number</div>
                          </div> 
                          
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="visitor_type">Visitor Status</label>
                              <select name="status_id" class="form-control" required>
                                      <option value="<?= $fetch['status_id']?>" selected><?= $fetch['status_name']?></option>
                                          <?php
                                          $visitorstatus=$fetch['status_id'];

                                          $result = mysqli_query($conn,"SELECT * FROM status WHERE status_id!=$visitorstatus");
                                          while($row = mysqli_fetch_array($result)) {
                                          ?>
                                          <option value="<?=$row["status_id"];?>"><?= $row["status_name"];?></option>
                                          <?php
                                          }
                                          ?>
                                  </select>
                              <div class="invalid-feedback">Please enter your email address</div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="id">Address / Organization</label>
                              <input  type="text" class="form-control" name="organization" value="<?= $fetch['organization']?>" required="">
                              <div class="invalid-feedback">Please enter visitors address or o rganization</div>
                          </div> 
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="id">Ghana Card / Voters ID</label>
                              <input id="id" type="text" class="form-control" name="identification" value="<?= $fetch['identification']?>">
                          </div> 
                      </div>
                 
                  
                  

                  <div>
                    <button type="submit" name="visitorUpdate" class="btn btn-sm btn-primary"><i class="fas fa-save mx-2"></i> Update Visitor</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>