<div id="edit_department<?php echo htmlentities($row->id); ?>" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Department</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
							
								<form method="post">
								<input type="hidden" value="<?php echo htmlentities($row->id); ?>" name="editid">
									<div class="form-group">
										<label>Department Name <span class="text-danger">*</span></label>
										<input class="form-control" name="depname" value="<?php echo htmlentities($row->Department);?>" type="text">
									</div>
									<div class="submit-section">
										<button name="editdep" class="btn btn-primary submit-btn">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>