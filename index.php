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

<!-- div table -->
<div class="col-md-6">
	<div class="card">
		<div class="card-body">

			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Nama Produk</th>
							<th>Jenis Produk</th>
							<th>Stok Produk</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="tbody_id">
						
					</tbody>
				</table>
			</div>
			
		</div>
	</div>
</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    console.log("Test")
    // load data
function load_data(){
	// set value in var data
	var data = {
		status: "Load"
	}

	// ajax request
	$.ajax({
		url: "crud.php",
		type: "post",
		data: data,
		success(response){
			var resp = JSON.parse(response)
			// console.log(resp);

			// set data pada table
			if (resp.length == 0) {
				$("#tbody_id").html(`
					<tr>
						<td colspan='4' class='text-center'>Data tidak tersedia</td>
					</tr>
				`);

			}else{

				var tbody_html = "";
				$.each(resp, function(key, val){
					var jenis_produk = "";
					if (val[2] == "1") {
						jenis_produk = "Makanan";
					}else if(val[2] == "2"){
						jenis_produk = "Minuman";
					}else{
						jenis_produk = "Tidak diketahui";
					}

					tbody_html += `
						<tr>
							<td>` + val[1] + `</td>
							<td>` + jenis_produk + `</td>
							<td>` + val[3] + `</td>
							<td>
								<button class="btn btn-warning" onclick="edit_data('` + val[0] + `')">Edit</button>
								<button class="btn btn-danger" onclick="delete_clicked('` + val[0] + `')">Delete</button>
							</td>
						</tr>
					`
				});
				$("#tbody_id").html(tbody_html);

			}
		}
	});
}

// trigger load data
load_data();

// button simpan
function save_clicked() {
	// get value
	var nama_produk = $("#nama_produk_id").val();
	var jenis_produk = $("#jenis_produk_id").val();
	var stok_produk = $("#stok_produk_id").val();

	var data = {
		nama_produk: nama_produk,
		jenis_produk: jenis_produk,
		stok_produk: stok_produk,
		status: "Simpan"
	}

	$.ajax({
		url: "crud.php",
		type: "post",
		data: data,
		success(response){
			var resp = JSON.parse(response)
			// console.log(resp);

			alert(resp);

			load_data();
			cancel_clicked();
		}
	});
}

// button edit
var global_id = "";
function edit_data(id) {
	global_id = id;

	var data = {
		id: id,
		status: "Edit"
	}

	$.ajax({
		url: "crud.php",
		type: "post",
		data: data,
		success(response){
			var resp = JSON.parse(response)
			// console.log(resp);

			if (resp != null) {
				// set value
				var produk = resp[0];
				$("#nama_produk_id").val(produk[1]);
				$("#jenis_produk_id").val(produk[2]);
				$("#stok_produk_id").val(produk[3]);

				// set button hide or not
				$("#button_simpan_id").hide();
				$("#button_update_id").show();
				$("#button_cancel_id").show();
			}
		}
	});
}

function cancel_clicked() {
	// set value
	global_id = "";
	$("#nama_produk_id").val("");
	$("#jenis_produk_id").val("1");
	$("#stok_produk_id").val("");

	// set button hide or not
	$("#button_simpan_id").show();
	$("#button_update_id").hide();
	$("#button_cancel_id").hide();
}

// button update
function update_clicked() {
	var nama_produk = $("#nama_produk_id").val();
	var jenis_produk = $("#jenis_produk_id").val();
	var stok_produk = $("#stok_produk_id").val();

	var data = {
		id: global_id,
		nama_produk: nama_produk,
		jenis_produk: jenis_produk,
		stok_produk: stok_produk,
		status: "Update"
	}

	$.ajax({
		url: "crud.php",
		type: "post",
		data: data,
		success(response){
			var resp = JSON.parse(response);
			// console.log(resp);

			alert(resp);

			load_data();
			cancel_clicked();
		}
	});
}

// button delete
function delete_clicked(id) {
	var konfirmasi = confirm("Apakah kamu yakin ingin menghapus data ini ?");

	if (konfirmasi) {
		var data = {
			id: id,
			status: "Delete"
		}

		$.ajax({
			url: "crud.php",
			type: "post",
			data: data,
			success(response){
				var resp = JSON.parse(response)
				// console.log(resp);

				alert(resp);

				load_data();
				cancel_clicked();
			}
		});
	}
}
</script>
</html>