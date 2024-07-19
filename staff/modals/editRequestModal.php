<div class="modal fade bd-example-modal-lg mt-5" id="editRequest<?=$fetch['request_id']?>" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Staff Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" method="POST" action="php_action/editRequest.php">
                          <input type="hidden" name="request_id" value="<?= $fetch['request_id']?>">
                      <div class="row">
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                            <label for="frist_name">Staff Name</label>
                            <input id="frist_name" type="text" class="form-control" name="first_name" value="<?=$fetch['first_name']?> <?=$fetch['last_name']?>"readonly>
                          </div>
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="request">Request</label>
                              <textarea class="form-control" name="description" readonly><?=$fetch["description"]?></textarea>
                          </div>
                      </div>

                      <div class="row">
                            <?php 
                            $ceo = mysqli_query($conn, "SELECT * FROM tbl_staff WHERE app_role=3");
                            if ($ceo->num_rows === 1) {
                                $ceoData = $ceo->fetch_assoc();
                                $ceoId=$ceoData['staff_id'];
                                $ceoName = $ceoData['first_name'] . ' ' . $ceoData['last_name'];
                            } else {
                                // Handle the case where no department head is found (e.g., set $ceoName to a default value or display a message)
                                $ceoName = 'No CEO Found';
                            }
                            ?>
                            <div class="form-group col-sm-12 col-md-8 col-lg-6">
                                <label for="id">ceo</label>
                                <input type="text" class="form-control" name="ceo" value="<?= $ceoName ?>" readonly>
                            </div>
                            <input type="hidden" name="ceoId" value="<?= $ceoId?>">

                            <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="remarks">Remarks</label>
                              <textarea class="form-control" name="remarks"></textarea>
                          </div>
                      </div>
                  <div>
                    <button type="submit" name="approveRequest" class="btn btn-sm btn-primary"><i class="fas fa-save mx-2"></i> Approve Request</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
        
        
        <!-- decline request modal -->
        
        <div class="modal fade bd-example-modal-lg mt-5" id="declineRequest<?=$fetch['request_id']?>" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Decline Staff Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" method="POST" action="php_action/editRequest.php">
                          <input type="hidden" name="request_id" value="<?= $fetch['request_id']?>">
                      
                      
                      <div class="row container">
                          <p>Are you sure you want to decline request: <span class="text-danger"><?= $fetch['description'] ?></span> from : <b class="text-danger"><?= $fetch['first_name']?> <?= $fetch['last_name']?></b></p>
                      </div>

                      <div class="row">
                          <div class="form-group col-sm-12 col-md-8 col-lg-6">
                              <label for="remarks">Remarks</label>
                              <textarea class="form-control" name="remarks"></textarea>
                          </div>
                      </div>


                  <div>
                    <button type="submit" name="declineRequest" class="btn btn-sm btn-danger"><i class="fas fa-save mx-2"></i> Decline Request</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>