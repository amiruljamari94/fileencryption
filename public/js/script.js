$(function() {

	$('.tambahData').on('click', function(){

		$('#formModalLable').html('Tambah Data Mahasiswa');
		$('.modal-footer button[type=submit]').html('Tambah Data');

	});

	$('.tampilModalUbah').on('click', function () {
		//console.log('ok');
		$('#formModalLable').html('Ubah Data Mahasiswa');
		$('.modal-footer button[type=submit]').html('Ubah Data');

		const id = $(this).data('id');
		//console.log(id);

		$.ajax({
			url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
			data: {id : id},
			method: 'post',
			dataType: 'json',
			success: function(data){
				$('#nama').val(data.nama);
				$('#nrp').val(data.nrp);
				$('#email').val(data.email);
				$('#jurusan').val(data.jurusan);
				

			}

		});
	});

});