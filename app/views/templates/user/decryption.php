<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
				<div class="card-header">
					<h3 class="text-center font-weight-light my-4">Decryption</h3>
				</div>
				<div class="card-body">
				<form enctype="multipart/form-data" method="POST" action="<?php echo URL ?>decryption/processFile">

					<div class="custom-file">
						<input type="file" id="myfile" name="file" class="form-control">
						<label class="custom-file-label" for="myfile">Choose file</label>
					</div>

					<div class="input-group mt-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Key</span>
						</div>
						<input type="text" class="form-control" name="password">
					</div>

					<div><button type="submit" name="action" value="d" class="btn btn-primary mt-3">Decrypt</button></div>
					
				</form>
				</div>
			</div>
		</div>
	</div>
 </div>


