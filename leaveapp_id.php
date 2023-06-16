<?php
require('top1.inc.php');
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>employee leave_application</strong></div>
                        <div class="card-body card-block">
                           <form action="" method="GET">
									<div class="row">
										<div class="col-md-8">
											<input type="text" name="id" value="<?php if(isset($_GET['id'])){echo $_GET['id'];} ?>" class="form-control">
										</div>
										<div class="col-md-4">
											<button type="submit" class="btn btn-primary">Search</button>
										</div>
									</div>
                            </form>
							<div class="row">
								<div class="col-md-12">
									<hr>
									<?php 
											

											if(isset($_GET['id']))
											{
												$stud_id = $_GET['id'];

												$query = "SELECT * FROM `leave` WHERE id='$stud_id' ";
												$query_run = mysqli_query($con, $query);

												if(mysqli_num_rows($query_run) > 0)
												{
													foreach($query_run as $row)
													{
														?>
														<div class="form-group mb-3">
															<label for="">employee_id </label>
															<input type="int" value="<?= $row['employee_id']; ?>" class="form-control">
														</div>
														<div class="form-group mb-3">
															<label for="">leave_id </label>
															<input type="int" value="<?= $row['leave_id']; ?>" class="form-control">
														</div>
														<div class="form-group mb-3">
															<label for="">leave_from</label>
															<input type="date" value="<?= $row['leave_from']; ?>" class="form-control">
														</div>
														<div class="form-group mb-3">
															<label for="">leave_to</label>
															<input type="date" value="<?= $row['leave_to']; ?>" class="form-control">
														</div>
														<div class="form-group mb-3">
															<label for="">leave_description</label>
															<input type="text" value="<?= $row['leave_description']; ?>" class="form-control">
														</div>
														<div class="form-group mb-3">
															<label for="">leave_status</label>
															<input type="int" value="<?= $row['leave_status']; ?>" class="form-control">
														</div>
																										
														<?php
													}
												}
												else
												{
													echo "No Record Found";
												}
											}
										   
										?>

									</div>
								</div>

							   
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
                  
<?php
require('footer1.inc.php');
?>