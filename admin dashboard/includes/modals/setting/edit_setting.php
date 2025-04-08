<div id="edit_setting<?php echo htmlentities($row->id); ?>" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-md" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Asset</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="row" >
										<div class="col-sm-6">
											<div class="form-group">
												<label>Company Name <span class="text-danger">*</span></label>
												<input name="Cname" class="form-control" type="text" value="<?php echo htmlentities($row->CompanyName); ?>">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Contact Person</label>
												<input name="Cperson" class="form-control " value="<?php echo htmlentities($row->contact); ?>" type="text">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Address</label>
												<input name="Caddress" class="form-control " value="<?php echo htmlentities($row->Address); ?>" type="text">
											</div>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Country</label>
												<select name="Country" class="form-control select">
													<option><?php echo htmlentities($row->Country); ?></option>
													<option>United Kingdom</option>
												</select>
											</div>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>City</label>
												<input name="city" class="form-control" value="<?php echo htmlentities($row->City); ?>" type="text">
											</div>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>State/Province</label>
												<select name="state" class="form-control select">
													<option><?php echo htmlentities($row->State); ?></option>
													<option></option>
													<option>Alabama</option>
												</select>
											</div>
										</div>
										
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Email</label>
												<input name="email" class="form-control" value="<?php echo htmlentities($row->Email); ?>" type="email">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Phone Number</label>
												<input name="phone" class="form-control" value="<?php echo htmlentities($row->phone); ?>" type="text">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Mobile Number</label>
												<input name="phone" class="form-control" value="<?php echo htmlentities($row->phone); ?>" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Fax</label>
												<input name="fax" class="form-control" value="<?php echo htmlentities($row->Fax); ?>" type="text">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Website Url</label>
												<input name="website" class="form-control" value="<?php echo htmlentities($row->website); ?>" type="text">
											</div>
										</div>
									</div>
									<div class="submit-section">
										<button name="settingsave" class="btn btn-primary submit-btn">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>