<div class="modal custom-modal fade" id="add_holiday" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Vacation</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="POST">
								
									
									<div class="form-group">
										<label>Department Name <span class="text-danger">*</span></label>
										<select require name="depname" class="form-control select">
											<option>Select Department  Name</option>
											<?php 
											$sql2 = "SELECT * from departments";
											$query2 = $dbh -> prepare($sql2);
											$query2->execute();
											$result2=$query2->fetchAll(PDO::FETCH_OBJ);
											foreach($result2 as $row)
											{          
												?>  
											<option value="<?php echo htmlentities($row->Department	); ?>">
											<?php echo htmlentities($row->Department); ?></option>
											<?php } ?> 
										</select>
									</div>


									
									<div class="form-group">
										<label>Holiday Name <span class="text-danger">*</span></label>
										<input name="holiday" class="form-control" required type="text">
									</div>
									<div class="form-group">
										<label>Holiday Date <span class="text-danger">*</span></label>
										<input class="form-control" name="date" required type="date">
									</div>
									<div class="form-group">
										<label>End Date <span class="text-danger">*</span></label>
										<input class="form-control" name="enddate" required type="date">
									</div>
									
									<div class="submit-section">
										<button name="add_holiday" type="submit" class="btn btn-primary submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>