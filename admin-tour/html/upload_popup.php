<!-- Modal HTML -->
<div id="myModal" class="modal fade" style="z-index: 999999;">
	<div class="modal-dialog modal-dialog-centered ">
		<div class="modal-content">
			<div class="modal-header">

				<h4 class="modal-title">Add User Member</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<div class="file-loading">
					<input id="input-repl-2" name="input-repl-2" type="file" accept="image/*" multiple>
				</div>
				<script>
				$("#input-repl-2").fileinput({
					uploadUrl: "/file-upload-batch/2",
					autoReplace: true,
					maxFileCount: 5,
					allowedFileExtensions: ["jpg", "png", "gif"]
				});
				</script>
			</div>
		</div>
	</div>
</div>     

