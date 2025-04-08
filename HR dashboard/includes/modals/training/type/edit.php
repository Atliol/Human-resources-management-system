<div id="edit_type<?php echo htmlentities($row->id);?>" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Trainer Type</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="post">
								<input type="text" value="<?php echo htmlentities($row->id); ?>" name="editid">
									<div class="form-group">
										<label>Trainer Type <span class="text-danger">*</span></label>
										<input name="trainertype" class="form-control" type="text" value="<?php echo htmlentities($row->Trainer_Type); ?>">
									</div>
									
									
									<div class="submit-section">
										<button name="edit_trainertype" class="btn btn-primary submit-btn">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>