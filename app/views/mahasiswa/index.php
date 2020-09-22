<div class="container mt-2">

	<div class="row" >
		<div class="col-lg-6">
			<?php Flasher::flash(); ?>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<button type="button" class="btn btn-primary mb-1 tambahData" data-toggle="modal" data-target="#formModal">
			  Add Mahasiswa
			</button>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<form action="<?php echo BASEURL; ?>/mahasiswa/search" method="POST">

				<div class="input-group mb-3">
				  <input type="text" class="form-control" placeholder="Cari Mahasiswa"  name="keyword" id="keyword">
					  <div class="input-group-append">
					    <button class="btn btn-primary" type="submit" id="buttonCari">Search</button>
					  </div>
				</div>

			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-6">
			<h3>Daftar Mahasiswa</h3>
			<ul class="list-group">
				<?php foreach($data['mhs'] as $mhs) : ?>
			  <li class="list-group-item"><?php echo $mhs['nama']; ?>
			  	

			  	<a href="<?php echo BASEURL; ?>/mahasiswa/delete/<?php echo $mhs['id']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('yakin?')">Delete</a>

			  	<a href="<?php echo BASEURL; ?>/mahasiswa/update/<?php echo $mhs['id']; ?>" class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?php echo $mhs['id']; ?>">Update</a>

			  	<a href="<?php echo BASEURL; ?>/mahasiswa/detail/<?php echo $mhs['id']; ?>" class="badge badge-primary float-right ">Detail</a>

			  </li>
			  <?php endforeach ?>
			 
			</ul>

			

			<!-- <ul>
				<li><?php echo $mhs['nama']; ?></li>
				<li><?php echo $mhs['nrp']; ?></li>
				<li><?php echo $mhs['email']; ?></li>
				<li><?php echo $mhs['jurusan']; ?></li>
			</ul> -->

			
			
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLable">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo BASEURL; ?>/mahasiswa/tambah" method="POST">


		    <div class="form-group">
			    <label for="nama">Nama</label>
			    <input type="text" class="form-control" id="nama" name="nama">
		  	</div>

		  	 <div class="form-group">
			    <label for="nrp">Nrp</label>
			    <input type="number" class="form-control" id="nrp" name="nrp">
		  	</div>

		  	 <div class="form-group">
			    <label for="email">Email</label>
			    <input type="email" class="form-control" id="email" name="email">
		  	</div>

		  	 <div class="form-group">
			    <label for="jurusan">Jurusan</label>
			    <select class="form-control" id="jurusan" name="jurusan">
			      <option value="Information Technology">information Technology</option>
			      <option value="Computer Science">Computer Science</option>
			      <option value="Information Security">Information Security</option>
			      <option value="Cyber Sccurity">Cyber Security</option>
			    </select>
			 </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>