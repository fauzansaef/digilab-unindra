var buku = function(){


var loadDataTable = function(){
	$('#tblBuku').DataTable({
		"processing": true,
        "destroy": true,
        "serverSide": false,
        "pageLength": 10,
        "lengthChange": false,
        "ordering": false,
        "searching": false,
		
		"ajax": {
            "url": "http://localhost/perpustakaan/master/buku_service.php?function=get_buku",
            "type": "GET",
            "dataSrc": "data",
        },
		
		"columns": [
                {"data": "id_buku",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {"data": "kode_buku"},
                {"data": "judul_buku"},
                {"data": "penulis_buku"},
                {"data": "penerbit_buku"},
				{"data": "tahun_penerbit"},
                {"data": "stok"},
           
            ],
            "columnDefs": [
                {"targets": 7, "render": function (data, type, full, meta) {
                        return "\
                                <button class='btn btn-primary viewBuku' \n\
                                type='button' data-toggle='tooltip' data-placement='bottom'\n\
                                data-original-title='View'><i class='fa fa-search'></i></button>\n\
								<button class='btn btn-warning updateBuku' \n\
                                type='button' data-toggle='tooltip' data-placement='bottom'\n\
                                data-original-title='Update'><i class='fa fa-pencil'></i></button>\n\
								<button class='btn btn-danger deleteBuku' \n\
                                type='button' data-toggle='tooltip' data-placement='bottom'\n\
                                data-original-title='Delete'><i class='fa fa-trash-o'></i></button>\n"
								;
                    },
				 "className": 'text-center',
                },

                {
                    targets: [0, 3],
                    className: 'text-center',
                },
            ],
            "drawCallback": function () {
                $('[data-toggle=tooltip]').tooltip();
            },
	});
}


var tambahBuku = function(){
	$('#btnTambahBuku').on('click', function(e){
		  e.preventDefault(e);
		$('#inputBukuModal').modal('show');
		
	});
	
}

var simpanBuku = function(){
	
	$('#btnSimpanBuku').on('click', function(e){
		e.preventDefault(e);
		
		var dataBuku = {
			id_buku : '', 
			kode_buku : $("#ddlKodeBuku option:selected").val(),
			judul_buku : $("#txtJudulBuku").val(),			
			penulis_buku : $("#txtPenulisBuku").val(), 
			penerbit_buku :  $("#txtPenerbitBuku").val(),
			tahun_penerbit : $("#txtTahunPenerbit").val(), 
			stok :  $("#txtStok").val(),
		}
		
		
		   $.ajax({
            url: "http://localhost/perpustakaan/master/buku_service.php?function=insert_buku",
            type: 'POST',
            dataType: "json",
			contentType: 'application/x-www-form-urlencoded',
			data : dataBuku,
            success: function (data) {
				if(data.status==1){
					$('#inputBukuModal').modal('hide');
					Swal.fire(
						'Success!',
						data.message,
						'success'
					).then(function () {
                        location.reload();
                    })
					
					
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

var deleteBuku = function(){
	  $('#tblBuku').find('tbody').on('click', 'button.deleteBuku', function () {
            var table = $('#tblBuku').DataTable();
            var tbl = table.row($(this).parents('tr'));
            var rData = tbl.data();
            var idData = rData["id_buku"];



            Swal.fire({
                title: 'Apakah anda yakin ?',
                text: "Hapus data ini!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.dismiss !== 'cancel') {
                    $.ajax({
                        url: "http://localhost/perpustakaan/master/buku_service.php?function=delete_buku&id=" + idData,
                        type: 'DELETE',
						dataType: "json",
                        success: function (data) {
                            if (data.status == 1) {
                                Swal.fire(
                                        'Terhapus!',
                                        'Data anda telah dihapus.',
                                        'success'
                                        ).then(function () {
                                   location.reload();
                                })
                            } else {
                               common_utils.showPesan("INFO", data.message);
                            }
                            return;
                        },
                        error: function (xhr, status, error) {
                            common_utils.showPesan("INFO", data.message);
                        }
                    })
                }
            });
        });
}

var updateBuku = function(){
	$('#tblBuku').find('tbody').on('click', 'button.updateBuku', function () {
            var table = $('#tblBuku').DataTable();
            var tbl = table.row($(this).parents('tr'));
            var rData = tbl.data();
            var idData = rData["id_buku"];


		 $.ajax({
            url: "http://localhost/perpustakaan/master/buku_service.php?function=get_buku_id&id=" + idData,
            type: 'GET',
			dataType: "json",
            success: function (data) {
                if (data.status == 1) {
					$('#updIdBuku').val(data.data[0].id_buku);
					$('#updDdlKodeBuku').val(data.data[0].kode_buku).change();
					$('#updJudulBuku').val(data.data[0].judul_buku);
					$('#updPenulisBuku').val(data.data[0].penulis_buku);
					$('#updPenerbitBuku').val(data.data[0].penerbit_buku);
					$('#updTahunPenerbit').val(data.data[0].tahun_penerbit);
					$('#updStok').val(data.data[0].stok);
                } else {
                    common_utils.showPesan("INFO", data.message);
                }
            return;
            },
            error: function (xhr, status, error) {
                common_utils.showPesan("INFO", data.message);
            }
        })

		$('#updateBukuModal').modal('show');
			
		$('#btnUpdateBuku').on('click', function(e){
			e.preventDefault(e);	
			
			var dataBuku = {
			id_buku : '',			
			kode_buku : $("#updDdlKodeBuku option:selected").val(),
			judul_buku : $("#updJudulBuku").val(),
			penulis_buku : $("#updPenulisBuku").val(), 
			penerbit_buku :  $("#updPenerbitBuku").val(),
			tahun_penerbit : $("#updTahunPenerbit").val(), 
			stok :  $("#updStok").val(),
		}
		
		
		   $.ajax({
            url: "http://localhost/perpustakaan/master/buku_service.php?function=update_buku&id=" + $('#updIdBuku').val() ,
            type: 'POST',
            dataType: "json",
			contentType: 'application/x-www-form-urlencoded',
			data : dataBuku,
            success: function (data) {
				if(data.status==1){
					$('#updateBukuModal').modal('hide');
					Swal.fire(
						'Success!',
						data.message,
						'success'
					).then(function () {
                        location.reload();
                    })
					
					
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
		
		})
			   
    });
	
}

var viewBuku = function(){
	 $('#tblBuku').find('tbody').on('click', 'button.viewBuku', function () {
            var table = $('#tblBuku').DataTable();
            var tbl = table.row($(this).parents('tr'));
            var rData = tbl.data();
            var idData = rData["id_buku"];
			
			
		$.ajax({
            url: "http://localhost/perpustakaan/master/buku_service.php?function=get_buku_id&id=" + idData,
            type: 'GET',
			dataType: "json",
            success: function (data) {
			
                if (data.status == 1) {
					$("#lblKodeBuku").text(data.data[0].kode_buku);
					$("#lblJudulBuku").text(data.data[0].judul_buku);
					$("#lblPenulisBuku").text(data.data[0].penulis_buku);
					$("#lblPenerbitBuku").text(data.data[0].penerbit_buku);
					$("#lblTahunPenerbit").text(data.data[0].tahun_penerbit);
					$("#lblStok").text(data.data[0].stok);
                } else {
                    common_utils.showPesan("INFO", data.message);
                }
            return;
            },
            error: function (xhr, status, error) {
                common_utils.showPesan("INFO", data.message);
            }
        })
			
			
		$('#viewBukuModal').modal('show');

        });
}

return{
        init: function () {
         loadDataTable();
		 tambahBuku();
		 simpanBuku();
		 deleteBuku();
		 updateBuku();
		 viewBuku();
        },
    };	
}();



jQuery(document).ready(function () {
    buku.init();
});
