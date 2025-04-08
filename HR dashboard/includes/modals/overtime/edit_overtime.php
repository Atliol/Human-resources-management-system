<div id="edit_overtime<?php echo htmlentities($row->id); ?>" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Overtime</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
							<form method="POST">
							<input type="hidden" value="<?php echo htmlentities($row->id); ?>" name="editid">
									
									<div class="form-group">
										<label>Overtime Date <span class="text-danger">*</span></label>
										<input name="ov_date" value="<?php echo htmlentities($row->OverTime_Date); ?>" required class="form-control " type="date">
									</div>
									<div class="form-group">
										<label>Overtime Type <span class="text-danger">*</span></label>
										<input name="ov_type" value="<?php echo htmlentities($row->Type); ?>" required class="form-control " type="text">
									</div>

									<div class="form-group">
										<label>Overtime Hours <span class="text-danger">*</span></label>
										<input name="ov_hours" value="<?php echo htmlentities($row->Hours); ?>" required class="form-control" type="time">
									</div>
									<div class="form-group">
										<label>Description <span class="text-danger">*</span></label>
										<textarea name="description" value="<?php echo htmlentities($row->Description); ?>" required rows="4" class="form-control"></textarea>
									</div>
									<div class="submit-section">
										<button name="edit_overtime" type="submit" class="btn btn-primary submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>