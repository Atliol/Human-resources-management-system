<div class="modal custom-modal fade" id="edit_holiday<?php echo htmlentities($row->id); ?>" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Holiday</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
							<form  method="POST">
								<input type="hidden" value="<?php echo htmlentities($row->id); ?>" name="editid">
                                <div class="form-group">
									<label>Department Name <span class="text-danger">*</span></label>
											<select name="depname" class="form-control select">
												<option>Web Development</option>
												<option>IT Department</option>
												<option>IS Department</option>
												<option>Cheaning Department</option>
												<option>Software Department</option>
											</select>
										
									</div>

								<div class="form-group">
                                <label>Holiday Name <span class="text-danger">*</span></label>
                                <input name="holiday" class="form-control" value="<?php echo htmlentities($row->Holiday_Name); ?>" required type="text">
                            </div>
                            <div class="form-group">
                                <label>Holiday Date <span class="text-danger">*</span></label>
                                <input class="form-control" name="date" value="<?php echo htmlentities($row->Holiday_Date); ?>" required type="date">
                            </div>
                            <div class="form-group">
                                <label>End Date<span class="text-danger">*</span></label>
                                <input class="form-control" name="enddate" value="<?php echo htmlentities($row->EndDate); ?>" required type="date">
                            </div>
                          
                            <div class="submit-section">
                                <button name="edit_holiday" type="submit" class="btn btn-primary submit-btn">Save Change</button>
                            </div>
								</form>
							</div>
						</div>
					</div>
				</div>