var pengembalian = function(){


$(document).on('hidden.bs.modal','#inputPengembalianModal', function () {
  location.reload();
})

var loadDataTable = function(){
	$('#tblPengembalian').DataTable({
		"processing": true,
        "destroy": true,
        "serverSide": false,
        "pageLength": 10,
        "lengthChange": false,
        "ordering": false,
        "searching": false,
		
		"ajax": {
            "url": "http://localhost/perpustakaan/transaksi/pengembalian_service.php?function=get_pengembalian",
            "type": "GET",
            "dataSrc": "data",
        },
		
		"columns": [
                {"data": "id_pengembalian",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {"data": "nama_anggota"},
                {"data": "judul_buku"},
                {"data": "nama_petugas"},
                {"data": "tgl_pengembalian"},
				{"data": "denda"}
           
            ],
            "columnDefs": [
                {
                    targets: [0, 4],
                    className: 'text-center',
                },
            ],
            "drawCallback": function () {
                $('[data-toggle=tooltip]').tooltip();
            },
	});
}

var loadListBuku = function (ddlname) {
	
        var options = ddlname;
        options.empty();

        common_utils.blockPanel(ddlname);

        $.ajax({
            type: "GET",
            url:  "http://localhost/perpustakaan/master/anggota_service.php?function=get_buku",
        
            success: function (data) {
                if (data.status != 1) {
                    common_utils.showPesan("INFO", data.ketStatus);
                    common_utils.unblockPanel(ddlname);
                    return;
                } 
                var html = "<option value='0' selected>" + 'Pilih Buku...' + "</option>";
                for (var i = 0; i < data.data.length; i++) {
                    html = html + "<option value=" + data.data[i]['id_buku']  + " >"
                            + data.message[i]['kode_buku'] + " - " + data.message[i]['judul_buku'] + "</option>";
                }
                options.append(html);

                listBuku = data.message;
                common_utils.unblockPanel(ddlname);
            },
            error: function (xhr, status, error) {
                common_utils.unblockPanel(ddlname);
            }
        });
    };

var prosesPengembalian = function(){
	
	$('#btnTambahPengembalian').on('click', function(e){
		  e.preventDefault(e);
		$('#inputPengembalianModal').modal('show');
		
	});	
}

var cariPeminjaman = function(){
	$('#btnCariPeminjaman').on('click', function(e){
		e.preventDefault(e);
		
	
	var dataPengembalian = {}	
		
		
		
	$('#tblDaftarPengembalian').DataTable({
		"processing": true,
        "destroy": true,
        "serverSide": false,
        "pageLength": 10,
        "lengthChange": false,
        "ordering": false,
        "searching": false,
		
		"ajax": {
            "url": "http://localhost/perpustakaan/transaksi/pengembalian_service.php?function=get_pengembalian_peminjaman&npm=" + $('#txtNPMPeminjam').val(),
            "type": "GET",
            "dataSrc": "data",
        },
		
		"columns": [
                {"data": "id_peminjaman",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {"data": "nama_anggota"},
                {"data": "jurusan_anggota"},
                {"data": "no_hp_anggota"},
                {"data": "kode_buku"},
				{"data": "judul_buku"},
				{"data": "tgl_pinjam"},
				{"data": "tgl_kembalikan"}
           
            ],
            "columnDefs": [
                {
                    targets: [0, 4,6,7],
                    className: 'text-center',
                },
            ],
            "drawCallback": function () {
                $('[data-toggle=tooltip]').tooltip();
            },
	});
		
		
		
		
		$.ajax({
            url: "http://localhost/perpustakaan/transaksi/pengembalian_service.php?function=get_pengembalian_peminjaman&npm=" + $('#txtNPMPeminjam').val(),
            type: 'GET',
			dataType: "json",
            success: function (data) {
			
                if (data.status == 1) {					
					console.log(data.data.length);
					
					
					var date = new Date();
					var day = date.getDate();
					var month = date.getMonth() + 1;
					var year = date.getFullYear();
					if (month < 10) month = "0" + month;
					if (day < 10) day = "0" + day;
					var today = year + "-" + month + "-" + day;   
					$("#tglDikembalikan").val(today);
					
					var tglHarusMengembalikan = null;
					var tglDikembalikan = new Date($("#tglDikembalikan").val());
					var diffTime = null;
					var diffDays = null; 
					var denda = null;
					var totalDenda = 0;
					
					for(let i=0; i<data.data.length; i++){
						tglHarusMengembalikan = new Date(data.data[i].tgl_kembalikan)
						diffTime = Math.abs(tglDikembalikan - tglHarusMengembalikan);
						diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
						denda = diffDays * 2000;
						
						dataPengembalian = {
							id_pengembalian : '',
							tgl_pengembalian : $("#tglDikembalikan").val(),
							denda : denda,
							id_buku : data.data[i].id_buku, 
							id_anggota :  data.data[i].id_anggota,
							id_petugas :  1							
						}
						
						totalDenda += denda;
						
						
						$("#denda").val(totalDenda);
						
						simpanPengembalian(dataPengembalian,data.data[i].id_peminjaman,data.data[i].id_buku);
						
					}
					
					
                } else {
                    common_utils.showPesan("INFO", data.message);
                }
            return;
            },
            error: function (data, status, error) {
				
                common_utils.showPesan("INFO", status);
            }
        })
	
		
	});
		
	
}

var simpanPengembalian = function(dataPengembalian, idPeminjaman,idBuku){
	$('#btnProsesPengembalian').on('click', function(e){
		e.preventDefault(e);
			
		   $.ajax({
            url: "http://localhost/perpustakaan/transaksi/pengembalian_service.php?function=insert_pengembalian&id_peminjaman",
            type: 'POST',
            dataType: "json",
			contentType: 'application/x-www-form-urlencoded',
			data : dataPengembalian,
            success: function (data) {
				console.log(1)
				if(data.status==1){
					$.ajax({
					url: "http://localhost/perpustakaan/transaksi/pengembalian_service.php?function=update_status_peminjaman&id_peminjaman=" + idPeminjaman,
					type: 'GET',
					dataType: "json",
					success: function (data) {
						
						if(data.status==1){
								$.ajax({
								url: "http://localhost/perpustakaan/transaksi/pengembalian_service.php?function=update_stok_buku&id_buku=" + idBuku,
								type: 'GET',
								dataType: "json",
								success: function (data) {
							
								if(data.status==1){
								$('#inputPengembalianModal').modal('hide');
								Swal.fire(
									'Success!',
									data.message,
									'success'
								).then(function () {
									alert(data.message)
							})
						
					}else{
						alert(data.message)
						common_utils.unblockPanel($('#divTableLoader'));
						common_utils.showPesan("INFO", data.message);
					}
               

				},
					error: function (data, status, er) {
						common_utils.unblockPanel($('#divTableLoader'));
						common_utils.showPesan("INFO", status);
					},
					omplete: function () {
							common_utils.unblockPanel($('#divTableLoader'));
					}
					});
						
					}else{
						alert(data.message)
						common_utils.unblockPanel($('#divTableLoader'));
						common_utils.showPesan("INFO", data.message);
					}
               

				},
					error: function (data, status, er) {
						common_utils.unblockPanel($('#divTableLoader'));
						common_utils.showPesan("INFO", status);
					},
					omplete: function () {
							common_utils.unblockPanel($('#divTableLoader'));
					}
					});
					
					
				
					
					
				}else{
					common_utils.unblockPanel($('#divTableLoader'));
					common_utils.showPesan("INFO", data.message);
				}
               

            },
            error: function (data, status, er) {
                common_utils.unblockPanel($('#divTableLoader'));
			    common_utils.showPesan("INFO", status);
    
            },
            complete: function () {
                common_utils.unblockPanel($('#divTableLoader'));
            }
        });
		
	
	
		
	});
}

var loadDataTableLaporan = function(){
	$('#tblLaporanPengembalian').DataTable({
		dom: 'Bfrtip',
        buttons: [
		   { extend: 'copy', className: 'btn-primary' },
           { extend: 'pdf', className: 'btn-success' },
		   { extend: 'print', className: 'btn-warning' },
		   { extend: 'excel', className: 'btn-danger' }
        ],
		
		"processing": true,
        "destroy": true,
        "serverSide": false,
        "pageLength": 10,
        "lengthChange": false,
        "ordering": false,
        "searching": true,
		
		"ajax": {
            "url": "http://localhost/perpustakaan/transaksi/pengembalian_service.php?function=get_laporan_pengembalian",
            "type": "GET",
            "dataSrc": "data",
        },
		
		"columns": [
                {"data": "id_pengembalian",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {"data": "kode_buku"},
                {"data": "judul_buku"},
                {"data": "penulis_buku"},
                {"data": "penerbit_buku"},
				{"data": "tgl_pengembalian"},
				{"data": "nama_petugas"},
				{"data": "denda"}
           
            ],
            "columnDefs": [
                {
                    targets: [0, 4, 5,7],
                    className: 'text-center',
                },
            ],
            "drawCallback": function () {
                $('[data-toggle=tooltip]').tooltip();
            },
	});
}



return{
        init: function () {
			loadDataTable();
			prosesPengembalian();
			cariPeminjaman();
			loadDataTableLaporan();
			
        },
    };	
}();

jQuery(document).ready(function () {
    pengembalian.init();
});