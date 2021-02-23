<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png" />
	<title>Student Enrollment Tracker</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/paper-bootstrap-wizard"/>

    <meta name="keywords" content="wizard, bootstrap wizard, creative tim, long forms, 3 step wizard, sign up wizard, beautiful wizard, long forms wizard, wizard with validation, paper design, paper wizard bootstrap, bootstrap paper wizard">
    <meta name="description" content="Paper Bootstrap Wizard is a fully responsive wizard that is inspired by our famous Paper Kit  and comes with 3 useful examples and 5 colors.">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Paper Bootstrap Wizard by Creative Tim">
    <meta itemprop="description" content="Paper Bootstrap Wizard is a fully responsive wizard that is inspired by our famous Paper Kit  and comes with 3 useful examples and 5 colors.">
    <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/49/opt_pbw_thumbnail.jpg">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Paper Bootstrap Wizard by Creative Tim">
    <meta name="twitter:description" content="Paper Bootstrap Wizard is a fully responsive wizard that is inspired by our famous Paper Kit  and comes with 3 useful examples and 5 colors.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/49/opt_pbw_thumbnail.jpg">

    <!-- Open Graph data -->
    <meta property="og:title" content="Paper Bootstrap Wizard by Creative Tim | Free Boostrap Wizard" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://demos.creative-tim.com/paper-bootstrap-wizard/wizard-list-place.html" />
    <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/49/opt_pbw_thumbnail.jpg" />
    <meta property="og:description" content="Paper Bootstrap Wizard is a fully responsive wizard that is inspired by our famous Paper Kit  and comes with 3 useful examples and 5 colors." />
    <meta property="og:site_name" content="Creative Tim" />

	<!-- CSS Files -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/css/paper-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet" />

	<!-- Fonts and Icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	<link href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css" rel="stylesheet">

	<style>
		.success-check{
			position: absolute !important;
			top: -20% !important;
			left: 60% !important;
			color: yellow !important;
			border-radius: 50%;
			width: 30px;
			height: 30px;
			background: yellowgreen;
			z-index: 100;
		}
		.checklist-numbering {
			position: absolute !important;
			top: -15% !important;
			left: 50%;
			margin-left: -12px;
			color: yellow !important;
			border-radius: 50%;
			width: 31px;
			height: 30px;
			background: #666;
			z-index: 100;
		}
		.checklist-numbering p{
			position: absolute !important;
			top: 0px !important;
			left: 9px !important;
			font-size: 20px !important;
			color: white;
		}
		.success-check i{
			position: absolute !important;
			top: 5px !important;
			left: 0px !important;
			font-size: 20px !important;
		}
		.modal-backdrop.in {
			opacity: .9;
			filter: alpha(opacity=50);
		}
		.done_student_number{
			/* position:relative; */
			padding-top: 100px;
		}
		.no-padding-left{
			padding-left: 0;
		}
		.display_none{
			display: none;
		}
		#done_student_number_errmsg{
			color: red !important;
		}
	</style>
	
	</head>

	<body>

	<!-- End Google Tag Manager (noscript) -->
	<div class="image-container set-full-height" style="background-image: url('<?php echo base_url(); ?>assets/img/webbanner.jpg'); position:fixed; width:100vw">
	</div>
	<div class="set-full-height mainpage">

	    <!--   Creative Tim Branding   -->
	    <a href="https://creative-tim.com">
	         <div class="logo-container">
	            <div class="logo" style="border:0px; border-radius:0%; width:300px">
	                <img src="<?php echo base_url(); ?>assets/img/Logo_white.png" width="300px" height="auto">
	            </div>
	           
	        </div>
	    </a>

	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="red" id="wizardProfile">
							<!-- <form id="trackerform" action="<?php echo base_url(); ?>index.php/Status/getData" method="get"> -->
							<form id="trackerform" action="index.php/Status/getData" method="get">
		                		<!--        You can switch " data-color="orange" "  with one of the next bright colors: "blue", "green", "orange", "red", "azure"          -->
		                    	<div class="wizard-header text-center">
		                        	<h3 class="wizard-title" style="color:green; font-weight:bold">Enrollment Tracker</h3>
									<hr>
									<h4 class="wizard-title">
										<span style="font-weight:bold;" id="StudentInfo" 
										data-name="<?php echo $this->session->userdata('Name'); ?>" 
										data-ref="<?php echo $this->session->userdata('Reference'); ?>"
										data-sy="<?php echo $this->session->userdata('School_Year'); ?>"
										data-sem="<?php echo $this->session->userdata('Semester'); ?>"
										>Student:</span> 
										<u><?php echo $this->session->userdata('Name'); ?></u>
									</h4>
									<h4 class="wizard-title">
										<span style="font-weight:bold;">School Year:</span> 
										<?php echo $this->session->userdata('School_Year'); ?>
									</h4>
									<h4 class="wizard-title">
										<span style="font-weight:bold;">Semester:</span> 
										<?php echo $this->session->userdata('Semester'); ?>
									</h4>
									<hr>
									<p class="category">Shows your current enrollment status and also the next step you need to do</p> 
									<br>
									<p class="category">A Check (&#10003;) with appear if the step is already done</p> 
		                    	</div>

								<div class="wizard-navigation">
									<div class="progress-with-circle">
									     <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="4" style="width: 21%;"></div>
									</div>
									<ul>
			                            <li id="examination_tab" data-percentage="">
											<a href="#Examination" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-book"></i>
													<div class="success-check">
														<i class="ti-check"></i>
													</div>
												</div>
												<!-- Examination -->
												<!-- BELL-BELL 2.18.21 -->
												Encode of Information
												<!--  -->
											</a>
										</li>
			                            <li id="advising_tab">
											<a href="#Advising" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-write"></i>
													<div class="success-check">
														<i class="ti-check"></i>
													</div>
												</div>
												Advising
											</a>
										</li>
			                            <li id="payment_tab">
											<a href="#Payment" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-credit-card"></i>
													<div class="success-check">
														<i class="ti-check"></i>
													</div>
												</div>
												Payment
											</a>
										</li>
										<li id="done_tab">
											<a href="#DONE" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-check"></i>
												</div>
												DONE
											</a>
										</li>
			                        </ul>

								</div>
		                        <div class="tab-content">
		                            <div class="tab-pane content_tab" id="Examination">
		                            	<div class="row">
											<h5 class="info-text">Entrance Examination</h5>
											
											<div class="row">
												<div class="col-sm-8 col-sm-offset-2">
													<div class="col-sm-4">
														<div class="choice" data-toggle="wizard-checkbox">
															<input type="checkbox" name="jobb" value="Design">
															<div class="card card-checkboxes card-hover-effect" style="color:#666">
																<div class="checklist-numbering">
																	<p>1</p>
																</div>
																<i class="ti-angle-double-right"></i>
																<p>Proceed to DSAS Office</p>
															</div>
														</div>
													</div>
													<div class="col-sm-4">
														<div class="choice" data-toggle="wizard-checkbox">
															<input type="checkbox" name="jobb" value="Code">
															<div class="card card-checkboxes card-hover-effect" style="color:#666">
																<div class="checklist-numbering">
																	<p>2</p>
																</div>
																<i class="ti-pencil-alt"></i>
																<!-- BELL-BELL 2.18.21 -->
																<!-- <p>Take the Entrance Exam</p> -->
																<p style="font-size:15px">Fill in the Application Form</p>
																<!--  -->
															</div>
														</div>
													</div>
													<div class="col-sm-4">
														<div class="choice" data-toggle="wizard-checkbox">
															<input type="checkbox" name="jobb" value="Develop">
															<div class="card card-checkboxes card-hover-effect" style="color:#666">
																<div class="checklist-numbering">
																	<p>3</p>
																</div>
																<i class="ti-thumb-up"></i>
																<p>Proceed to the next step! </p>
															</div>
														</div>
													</div>

													<div class="col-sm-12">
														<h5 style="margin:0px" class="info-text"> OR </h5>
													</div>

													<div class="col-sm-4">
														<div class="choice" data-toggle="wizard-checkbox">
															<input type="checkbox" name="jobb" value="Design">
															<!-- <a target="_blank" href="https://docs.google.com/forms/u/2/d/e/1FAIpQLSeO1z7i8lMpFu39RD7Py7ICeevicjtWYko6sedmZJdDodsPkw/viewform?fbclid=IwAR0-0BEcJcdqV4jCImoB085yhs-CpyQpw6QqklCD74Jg0YLWditKA0lLrGU"> -->
																<div class="card card-checkboxes card-hover-effect" style="color:#666">
																	<div class="checklist-numbering">
																		<p>1</p>
																	</div>
																	<i class="ti-world"></i>
																	<!-- BELL-BELL 2.18.21 -->
																	<!-- <p style="font-size:15px">Take the Online Exam (Click to open)</p> -->
																	<p style="font-size:15px">Fill in the Online Application Form</p>
																</div>
															<!-- </a> -->
														</div>
													</div>
													<div class="col-sm-4">
														<div class="choice" data-toggle="wizard-checkbox">
															<input type="checkbox" name="jobb" value="Code">
															<div class="card card-checkboxes card-hover-effect" style="color:#666">
																<div class="checklist-numbering">
																	<p>2</p>
																</div>																
																<i class="ti-email"></i>
																<!-- BELL-BELL 2.18.21 -->
																<!-- <p>Wait for email confirmation</p> -->
																<p>Proceed to Enrollment Tracker</p>
																<!--  -->
															</div>
														</div>
													</div>
													<div class="col-sm-4">
														<div class="choice" data-toggle="wizard-checkbox">
															<input type="checkbox" name="jobb" value="Develop">
															<div class="card card-checkboxes card-hover-effect" style="color:#666">
																<div class="checklist-numbering">
																	<p>3</p>
																</div>
																<i class="ti-thumb-up"></i>
																<p>Proceed to the next step! </p>
															</div>
														</div>
													</div>

												</div>
											</div>

										</div>
		                            </div>
		                            <div class="tab-pane content_tab" id="Advising">
		                                <h5 class="info-text"> Advising / Assessment </h5>
		                                <div class="row">
		                                    <div class="col-sm-8 col-sm-offset-2">
		                                        <div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-checkbox">
		                                                <input type="checkbox" name="jobb" value="Design">
		                                                <div class="card card-checkboxes card-hover-effect" style="color:#666">
															<div class="checklist-numbering">
																<p>1</p>
															</div>
		                                                    <i class="ti-angle-double-right"></i>
															<p>Proceed to an Adviser of your chosen program</p>
		                                                </div>
		                                            </div>
		                                        </div>
		                                        <div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-checkbox">
		                                                <input type="checkbox" name="jobb" value="Code">
		                                                <div class="card card-checkboxes card-hover-effect" style="color:#666">
															<div class="checklist-numbering">
																<p>2</p>
															</div>
															<i class="ti-write"></i>
															<p>Choose and verify the subjects you want to take</p>
		                                                </div>
		                                            </div>
		                                        </div>
		                                        <div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-checkbox">
		                                                <input type="checkbox" name="jobb" value="Develop">
		                                                <div class="card card-checkboxes card-hover-effect" style="color:#666">
															<div class="checklist-numbering">
																<p>3</p>
															</div>
															<i class="ti-receipt"></i>
															<p>Get a print of your temporary Register form</p>
		                                                </div>
		                                            </div>
		                                        </div>
												<!-- BELL-BELL 2.18.21
												<div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-checkbox">
		                                                <input type="checkbox" name="jobb" value="Develop">
		                                                <div class="card card-checkboxes card-hover-effect" style="color:#666">
															<div class="checklist-numbering">
																<p>4</p>
															</div>
															<i class="ti-stamp"></i>
															<p style="font-size:12px">Go to the Accounting office to verify the assessment</p>
		                                                </div>
		                                            </div>
		                                        </div>
												-->
												<div class="col-sm-4">
												</div>
												<div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-checkbox">
		                                                <input type="checkbox" name="jobb" value="Develop">
		                                                <div class="card card-checkboxes card-hover-effect" style="color:#666">
															<div class="checklist-numbering">
																<!-- BELL-BELL 2.18.21 -->
																<!-- <p>5</p> -->
																<p>4</p>
																<!--  -->
															</div>
															<i class="ti-thumb-up"></i>
															<p>Proceed to the next step! </p>
		                                                </div>
		                                            </div>
		                                        </div>
												<div class="col-sm-4">
												</div>
												<div class="col-sm-12">
													<h5 class="info-text"> Note: Skip step 4 if you are a new student.</h5>
		                                        </div>
												
		                                    </div>
		                                </div>
		                            </div>
		                            <div class="tab-pane content_tab" id="Payment">
										<h5 class="info-text"> Payment </h5>
										<!-- <h3 class="info-text">
											<a href="https://www.aub.com.ph/">
												SDCA Online Payment
											</a>
										</h3> -->
										<div class="row">
											<div class="col-sm-12">
												<h3 style="text-align: center;">
													<a href="https://stdominiccollege.edu.ph/SDCAPayment/" target="_blank">
														SDCA Online Payment
													</a>
												</h3>
											</div>
											<div class="col-sm-8 col-sm-offset-2">
												<div class="col-sm-4">
													<div class="choice" data-toggle="wizard-checkbox">
														<input type="checkbox" name="jobb" value="Design">
														<div class="card card-checkboxes card-hover-effect" style="color:#666">
															<i class="ti-angle-double-right"></i>
															<p>Proceed to the Cashier for payment</p>
														</div>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="choice" data-toggle="wizard-checkbox">
														<input type="checkbox" name="jobb" value="Code">
														<div class="card card-checkboxes card-hover-effect" style="color:#666">
															<i class="ti-credit-card"></i>
															<p>If paid through alternative payment methods, provide proof of payment to the cashier</p>
														</div>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="choice" data-toggle="wizard-checkbox">
														<input type="checkbox" name="jobb" value="Design">
														<div class="card card-checkboxes card-hover-effect" style="color:#666">
															<i class="ti-angle-double-right"></i>
															<p>Proceed to the Cashier for payment</p>
														</div>
													</div>
												</div>
												
											</div>
										</div>
		                            </div>
									<div class="tab-pane" id="DONE">
										<div class="done_welcome display_none" id="done_welcome">
											<h2 class="info-text">  Welcome, Dominican! </h2>
											<h3 class="info-text">  You are now enrolled to St. Dominic College of Asia! </h3>
											<h4 class="info-text">  Click the link below to register for your Digital Citizenship Accounts </h4>
											<h3 class="info-text">  
												<a href="https://docs.google.com/forms/d/1ZJ_40HBCcciCFu9Yzx7OoZeezQnfLdifR9w4Q1h9zPs/edit" target="_blank">
													STUDENT DIGITAL CITIZENSHIP FORM
												</a>  
											</h3>
											<h3 class="info-text">  
												<a href="https://tinyurl.com/idapplicationform" target="_blank">
													ID APPLICATION FORM
												</a>  
											</h3>
											
										</div>
										
										<div class="done_student_number" id="done_student_number">
											<div class="col-md-2">
											</div>
											<div class="col-md-8">
												<label for="done_student_number">Enter Student Number</label>
												<div class="col-md-10 no-padding-left">
													<input type="text" class="form-control" id="done_student_number_text">
													&nbsp;<span id="done_student_number_errmsg"></span>
												</div>
												<div class="col-md-2 no-padding-left">
													<a class="btn btn-info" id="done_student_number_submit">Submit</a>
												</div>
											</div>
											<div class="col-md-2">
											</div>
										</div>
		                            </div>
		                        </div>
		                        <div class="wizard-footer">
									<hr>
		                            <div class="pull-right">
		                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd' name='next' value='Next' />
		                                <input type='button' class='btn btn-finish btn-fill btn-warning btn-wd' name='finish' value='Finish' />
		                            </div>

		                            <div class="pull-left">
		                                <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
							</form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    	</div><!-- end row -->
		</div> <!--  big container -->

	    <div class="footer">
	    </div>

		<!-- Small modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">Small modal</button>

		<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="top: 30%; background-color:transparent">
			<div class="modal-dialog modal-sm">
				<div class="modal-content" style="background-color:transparent; border:0px; box-shadow:none">
					<div class="row">
						<div class="col-sm-12">
							<img src="<?php echo base_url(); ?>assets/img/load.gif" width="100%" height="auto">
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

</body>

	<!--   Core JS Files   -->
	<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="<?php echo base_url(); ?>assets/js/demo.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/paper-bootstrap-wizard.js" type="text/javascript"></script>

	<!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
	<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js" type="text/javascript"></script>

	<!--  Tracker JS	-->	
	<!-- <script src="<?php echo base_url(); ?>assets/js/tracker.js" type="text/javascript"></script> -->
	<script src="assets/js/tracker.js" type="text/javascript"></script>
	<script src="assets/js/ajax_student_number.js" type="text/javascript"></script>
</html>
