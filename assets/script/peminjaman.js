var peminjaman = function(){

$(document).on('hidden.bs.modal','#inputPeminjamanModal', function () {
  location.reload();
})

var loadDataTable = function(){
	$('#tblPeminjaman').DataTable({
		"processing": true,
        "destroy": true,
        "serverSide": false,
        "pageLength": 10,
        "lengthChange": false,
        "ordering": false,
        "searching": false,
		
		"ajax": {
            "url": "http://localhost/perpustakaan/transaksi/peminjaman_service.php?function=get_peminjaman",
            "type": "GET",
            "dataSrc": "data",
        },
		
		"columns": [
                 {"data": "id_peminjaman",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {"data": "tgl_pinjam"},
                {"data": "tgl_kembalikan"},
                {"data": "kode_buku"},
                {"data": "judul_buku"},
				{"data": "nama_anggota"},
				{"data": "nama_petugas"}
           
            ],
            "columnDefs": [
             
                {
                    targets: [0, 1,2],
                    className: 'text-center',
                },
            ],
            "drawCallback": function () {
                $('[data-toggle=tooltip]').tooltip();
            },
	});
}

var tambahPeminjaman = function(){
	$('#btnTambahPeminjaman').on('click', function(e){
		  e.preventDefault(e);
		$('#inputPeminjamanModal').modal('show');
		
    $('#selectAnggota').select2({
        dropdownParent: $('#inputPeminjamanModal')
    });
	loadListAnggota($('#selectAnggota'));
	
	
	
	$('#selectBuku').select2({
        dropdownParent: $('#inputPeminjamanModal')
    });
	loadListBuku($('#selectBuku'));
});
	
}

var simpanPeminjaman = function(){
	
	$('#btnSimpanPeminjaman').on('click', function(e){
		e.preventDefault(e);
		console.log($("#sessionIdPetugas").val())
		var dataPeminjaman = {
			id_peminjaman : '', 
			tgl_pinjam : $("#txtTglPinjam").val(),
			tgl_kembalikan : $("#txtTglKembalikan").val(),			
			id_buku : $("#selectBuku option:selected").val(),
			id_anggota :  $("#selectAnggota option:selected").val(),
			id_petugas : $("#sessionIdPetugas").val(), 
		}
		
		
		   $.ajax({
            url: "http://localhost/perpustakaan/transaksi/peminjaman_service.php?function=insert_peminjaman",
            type: 'POST',
            dataType: "json",
			contentType: 'application/x-www-form-urlencoded',
			data : dataPeminjaman,
            success: function (data) {
				if(data.status==1){
					
					
					
						$.ajax({
								url: "http://localhost/perpustakaan/transaksi/peminjaman_service.php?function=update_stok_buku&id_buku=" + $("#selectBuku option:selected").val(),
								type: 'GET',
								dataType: "json",
								success: function (data) {
							
								if(data.status==1){
								$('#inputPeminjamanModal').modal('hide');
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
					common_utils.unblockPanel($('#divTableLoader'));
					common_utils.showPesan("INFO", data.message);
				}
               

            },
            error: function (data, status, er) {
                common_utils.unblockPanel($('#divTableLoader'));
			    common_utils.showPesan("INFO", data.message);
    
            },
            complete: function () {
                common_utils.unblockPanel($('#divTableLoader'));
            }
        });
		
		
	});
}

var loadListBuku = function (selectBuku) {
	
        var options = selectBuku;
        options.empty();

        common_utils.blockPanel(selectBuku);

        $.ajax({
            type: "GET",
            url:  "http://localhost/perpustakaan/master/buku_service.php?function=get_buku",
        
            success: function (data) {
                if (data.status != 1) {
                    common_utils.showPesan("INFO", data.message);
                    common_utils.unblockPanel(selectBuku);
                    return;
                } 
                var html = "<option value='0' selected>" + 'Pilih Buku...' + "</option>";
                for (var i = 0; i < data.data.length; i++) {
					
					
                    html = html + "<option value=" + data.data[i].id_buku  + " >"
                            + data.data[i].kode_buku + "&nbsp; - &nbsp;" + data.data[i].judul_buku + "</option>";
                }
                options.append(html);

                listBuku = data.message;
                common_utils.unblockPanel(selectBuku);
            },
            error: function (xhr, status, error) {
                common_utils.unblockPanel(selectBuku);
            }
        });
}
	
var loadListAnggota = function(selectAnggota) {
	      var options = selectAnggota;
        options.empty();

        common_utils.blockPanel(selectAnggota);

        $.ajax({
            type: "GET",
            url:  "http://localhost/perpustakaan/master/anggota_service.php?function=get_anggota",
        
            success: function (data) {
                if (data.status != 1) {
                    common_utils.showPesan("INFO", data.message);
                    common_utils.unblockPanel(selectAnggota);
                    return;
                } 
                var html = "<option value='0' selected>" + 'Pilih NPM ...' + "</option>";
                for (var i = 0; i < data.data.length; i++) {
					
                    html = html + "<option value=" + data.data[i].id_anggota  + " >"
                            + data.data[i].npm + "&nbsp; - &nbsp;" + data.data[i].nama_anggota + "</option>";
                }
                options.append(html);

                listBuku = data.message;
                common_utils.unblockPanel(selectAnggota);
            },
            error: function (xhr, status, error) {
                common_utils.unblockPanel(selectAnggota);
            }
        });
	
}

var loadDataTableLaporan = function(){
$('#tblLaporanPeminjaman').DataTable({
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
        "searching": false,
		
		"ajax": {
            "url": "http://localhost/perpustakaan/transaksi/peminjaman_service.php?function=get_peminjaman",
            "type": "GET",
            "dataSrc": "data",
			
        },
		
		"columns": [
                 {"data": "id_peminjaman",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {"data": "tgl_pinjam"},
                {"data": "tgl_kembalikan"},
                {"data": "kode_buku"},
                {"data": "judul_buku"},
				{"data": "nama_anggota"},
				{"data": "nama_petugas"},
				{"data": "status",render: function (data, type, row, meta) {
                            if(data==1){
								return '<a style="color:blue;"  >Sudah Dikembalikan</a>';
							}else{
								return '<a style="color:red;"   >Belum Dikembalikan</a>';
							}

                        }
				
				}
           
            ],
            "columnDefs": [
             
                {
                    targets: [0, 1,2],
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
		 tambahPeminjaman();
		 simpanPeminjaman();
		 loadDataTableLaporan();
		
        },
    };	
}();



jQuery(document).ready(function () {
    peminjaman.init();
});
