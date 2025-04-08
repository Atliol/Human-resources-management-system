<div id="edit_designation<?php echo htmlentities($row->id); ?>" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Role</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="post">
								<input type="hidden" value="<?php echo htmlentities($row->id); ?>" name="editid">
									<div class="form-group">
										<label>Role Name <span class="text-danger">*</span></label>
										<input name="name" class="form-control" value="<?php echo htmlentities($row->Designation); ?>" type="text">
									</div>
									<div class="form-group">
										<label>Department <span class="text-danger">*</span></label>
										<select required name="department" class="select">
											<option><?php echo htmlentities($row->Department);?></option>
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
									<div class="submit-section">
										<button name="saverole" class="btn btn-primary submit-btn">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>