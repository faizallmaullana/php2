<?php

	include("koneksi.php");

	$status = $_POST['status'];

	// load data
	if ($status == "Load") {
		$sql = "SELECT * FROM produk";
		$query = mysqli_query($db, $sql);
		$produk = mysqli_fetch_all($query);

		echo json_encode($produk);
	}

	// save data
	if ($status == "Simpan") {
		$nama_produk = $_POST['nama_produk'];
		$jenis_produk = $_POST['jenis_produk'];
		$stok_produk = $_POST['stok_produk'];

		$sql = "INSERT INTO produk (nama_produk, jenis_produk, stok_produk) VALUE ('$nama_produk', '$jenis_produk', '$stok_produk')";
		$query = mysqli_query($db, $sql);
		if($query) {
			echo json_encode("Data berhasil disimpan");
		}else{
			echo json_encode("Data gagal disimpan");
		}
	}

	// edit data
	if ($status == "Edit") {
		$id = $_POST['id'];

		$sql = "SELECT * FROM produk WHERE id = '$id'";
		$query = mysqli_query($db, $sql);
		$produk = mysqli_fetch_all($query);

		echo json_encode($produk);
	}

	// update data
	if ($status == "Update") {
		$id = $_POST['id'];
		$nama_produk = $_POST['nama_produk'];
		$jenis_produk = $_POST['jenis_produk'];
		$stok_produk = $_POST['stok_produk'];

		$sql = "UPDATE produk SET nama_produk = '$nama_produk', jenis_produk = '$jenis_produk', stok_produk = '$stok_produk' WHERE id = $id";
		$query = mysqli_query($db, $sql);
		if($query) {
			echo json_encode("Data berhasil diubah");
		}else{
			echo json_encode("Data gagal diubah");
		}
	}

	// delete data
	if ($status == "Delete") {
		$id = $_POST['id'];

		$sql = "DELETE FROM produk WHERE id = '$id'";
		$query = mysqli_query($db, $sql);
		if($query) {
			echo json_encode("Data berhasil dihapus");
		}else{
			echo json_encode("Data gagal dihapus");
		}
	}