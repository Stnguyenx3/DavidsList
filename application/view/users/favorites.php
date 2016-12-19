<div class="container main">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10" id="favorites">
			
			<div id="confirmation-modal" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Confirmation</h4>
						</div>
						<div class="modal-body">
							<p>Are you sure you want to delete this listing?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary confirmation-btn" data-dismiss="modal">No</button>
							<button type="button" class="btn btn-primary confirmation-btn" data-dismiss="modal" id="delete-confirmed">Yes</button>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<div class="col-md-1"></div>
	</div>
</div>

<script type="text/javascript" src="<?php echo URL; ?>js/user_favorites.js"></script>

<script>
	//Highlight the current pages' navbar link.
	$("#nav-link-2").css("color", "#6de3b0");
</script>