
		<link href="./assets/css/themify-icons.css" rel="stylesheet">
<div class="modal fade StudentSelector tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content" style="padding:10%">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group" style="line-height:3">
						<label>Reference Number:</label>
						<div class="row">
							<form action="" method="get">
								<div class="col-md-9">
									<input name="rn" type="text" class="form-control" placeholder="Student's Reference Number">
								</div>
								<div class="col-md-3">
									<button type="submit" class="btn btn-info" style="border-radius: 0px; float:right; height:40px">Select</button>
								</div>
								<?php if($this->session->flashdata('InputMessage')): ?>
									<div class="col-md-12">
										<h4><?php echo $this->session->flashdata('InputMessage'); ?></h4>
									</div>
								<?php endIf; ?>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>

	$(document).ready(function(){
		$('.StudentSelector').modal({
			backdrop: 'static',
			keyboard: false
		});
		$('.StudentSelector').modal('show');

	});

</script>
