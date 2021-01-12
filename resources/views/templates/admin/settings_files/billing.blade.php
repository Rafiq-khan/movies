<h2>Billing</h2>
								<h6>Configure billing and subscription settings.</h6>

						<div class="card-body">
								<ul class="nav nav-pills nav-pills-bordered nav-pills-toolbar nav-justified">
									
									<li class="nav-item"><a href="#billing_general_pill" class="nav-link rounded-left-round active" data-toggle="tab">General</a></li>

									<li class="nav-item"><a href="#billing_automation_pill" class="nav-link rounded-right-round" data-toggle="tab">Invoices</a></li>

									
									
								</ul>

								<div class="tab-content">
									<div class="tab-pane fade show active" id="billing_general_pill">
										
										


	                                 <div class="form-group col-md-12">
                                <label class="col-md-12" >Enable Billing</label>
                                <label class="switch">
                                  <input type="checkbox" name="enable_billing" checked>
                                  <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                                 <small class="col-md-12" >Enable or disable all billing functionality across the site.</small>
                                </div>


									</div>

									<div class="tab-pane fade" id="billing_automation_pill">
										
										 <div class="form-group col-md-12">
											<label>
												Invoice Address


											</label>

											<textarea name="invoices_address" class="form-control"></textarea>
											<small>Address to show under "from" section of user invoice. Supports HTML. Optional.</small>
		                                    
		                                </div>



		                                 <div class="form-group col-md-12">
											<label>
												Invoice Note


											</label>

											<textarea name="invoice_notes" class="form-control"></textarea>
											<small>Default notes to show under "notes" section of user invoice. Optional.</small>
		                                    
		                                </div>

									</div>



									
								</div>
							</div>