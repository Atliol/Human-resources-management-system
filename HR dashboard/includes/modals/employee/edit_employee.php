<div id="edit_employee<?php echo htmlentities($row->id); ?>" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Employee</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="post">
								<input type="hidden" value="<?php echo htmlentities($row->id); ?>" name="editid">
								<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label">First Name <span class="text-danger">*</span></label>
												<input name="firstname" value="<?php echo htmlentities($row->FirstName);?>" required class="form-control" type="text">
												
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label">Last Name</label>
												<input name="lastname" name="lastname"  value="<?php echo htmlentities($row->LastName);?>" required class="form-control" type="text">
												
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label">Username <span class="text-danger">*</span></label>
												<input name="username" value="<?php echo htmlentities($row->UserName);?>" required class="form-control" type="text">
												
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label">Email <span class="text-danger">*</span></label>
												<input name="email" name="email"  value="<?php echo htmlentities($row->Email);?>" required class="form-control" type="email">
												
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label">Password</label>
												<input class="form-control" value="<?php echo htmlentities($row->Password);?>"  required name="password" type="password">
												
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label">Confirm Password</label>
												<input class="form-control" value="<?php echo htmlentities($row->Password);?>" required name="confirm_pass" type="password">
											</div>
										</div>
										<div class="col-sm-6">  
											<div class="form-group">
												<label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
												<input name="employee_id" readonly type="text"  value="<?php echo htmlentities($row->Employee_Id);?> " class="form-control">
												
											</div>
										</div>
										
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label">Phone </label>
												<input name="phone" value="<?php echo htmlentities($row->Phone);?>" required class="form-control" type="text">
												
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
												<label>Department <span class="text-danger">*</span></label>
												<select required name="department" class="select">
													<option>Select Department</option>
													<?php 
											$sql2 = "SELECT * from departments";
											$query2 = $dbh -> prepare($sql2);
											$query2->execute();
											$result2=$query2->fetchAll(PDO::FETCH_OBJ);
											foreach($result2 as $row)
											{          
												?>  
											<option value="<?php echo htmlentities($row->Department);?>">
											<?php echo htmlentities($row->Department);?></option>
											<?php } ?> 
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Designation <span class="text-danger">*</span></label>
												<select required name="designation" class="select">
													<option>Select Designation</option>
													<?php 
											$sql2 = "SELECT * from designations";
											$query2 = $dbh -> prepare($sql2);
											$query2->execute();
											$result2=$query2->fetchAll(PDO::FETCH_OBJ);
											foreach($result2 as $row)
											{          
												?>  
											<option value="<?php echo htmlentities($row->Designation);?>">
											<?php echo htmlentities($row->Designation);?></option>
											<?php } ?> 
												</select>
											</div>
										</div>
										
										
									
									   <div style="margin-left: 280px;" class="submit-section">
										<button  type="submit" name="edit_employee" class="btn btn-primary submit-btn">Submit</button>
									</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>