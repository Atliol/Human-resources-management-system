<div class="modal custom-modal fade" id="accept_holiday<?php echo htmlentities($row->id); ?>" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">ခွင့်ရက်အတည်ပြုခြင်း</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
							<form  method="POST">
								<input type="hidden" value="<?php echo htmlentities($row->id); ?>" name="editid">
                                <div class="form-group">
									<label>Accepted OR Rejected ?<span class="text-danger"></span></label>
											<select name="state" class="form-control select">
												<option>Accepted</option>
												<option>Rejected</option>
												
											</select>
										
									</div>
								
                            <div class="submit-section">
                                <button name="accept_holiday" type="submit" class="btn btn-primary submit-btn">Save Change</button>
                            </div>
								</form>
							</div>
						</div>
					</div>
				</div>