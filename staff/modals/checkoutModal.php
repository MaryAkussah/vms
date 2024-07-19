<div class="modal fade mt-5" id="checkout<?=$fetch['check_in_id']?>" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Visitor Check Out</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" method="POST" action="php_action/checkout.php">
                    <input type="hidden" name="check_in_id" value="<?= $fetch['check_in_id']?>">
                    <input type="hidden" name="visitor_id" value="<?= $fetch['visitor_id']?>">
                    <input type="hidden" name="staff_id" value="<?= $fetch['staff_id']?>">

                  <div class="form-group">
                    <div class="form-group col-12">
                        <label for="frist_name">Visitor Name</label>
                        <input type="text" class="form-control" name="full_name" value="<?= $fetch['full_name']?>" readonly>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="form-group col-12">
                        <label for="frist_name">Purpose of Visit</label>
                        <textarea class="form-control" name="purpose" value="<?= $fetch['purpose']?>" readonly><?= $fetch['purpose']?></textarea>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="form-group col-12">
                        <label for="frist_name">Staff Name</label>
                        <input type="text" class="form-control"  value="<?= $fetch['first_name']?> <?= $fetch['last_name']?>" readonly>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="form-group col-12">
                        <label for="frist_name">Check Out Time</label>
                        <input type="time" class="form-control" name="time_out" >
                    </div>
                  </div>

                  <div>
                    <button type="submit" name="visitorCheckout" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left mx-2"></i> Check Out</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>