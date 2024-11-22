<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div class="p-4">
        <div class="row">
        <div class="col-md-6 mb-4">
	<div class="card">
		<div class="card-body">
	
			<div class="form-group">
				<label>Nama Produk</label>
				<input class="form-control" type="text" name="nama_produk" id="nama_produk_id">
			</div>

			<div class="form-group">
				<label>Jenis Produk</label>
				<select class="form-control" name="jenis_produk" id="jenis_produk_id">
					<option value="1">Makanan</option>
					<option value="2">Minuman</option>
				</select>
			</div>

			<div class="form-group">
				<label>Stok Produk</label>
				<input class="form-control" type="number" name="stok_produk" id="stok_produk_id">
			</div>

			<div class="form-group">
				<button class="btn btn-primary" id="button_simpan_id" onclick="save_clicked()">Simpan</button>

				<button class="btn btn-warning" id="button_update_id" style="display: none;" onclick="update_clicked()">Update</button>
				<button class="btn btn-secondary" id="button_cancel_id" style="display: none;" onclick="cancel_clicked()">Batal</button>
			</div>

		</div>
	</div>
</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</html>