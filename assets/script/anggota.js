var anggota = function(){


var loadDataTable = function(){
	$('#tblAnggota').DataTable({
		"processing": true,
        "destroy": true,
        "serverSide": false,
        "pageLength": 10,
        "lengthChange": false,
        "ordering": false,
        "searching": false,
		
		"ajax": {
            "url": "http://localhost/perpustakaan/master/anggota_service.php?function=get_anggota",
            "type": "GET",
            "dataSrc": "data",
        },
		
		"columns": [
                {"data": "id_anggota",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {"data": "nama_anggota"},
				{"data": "npm"},
                {"data": "jurusan_anggota"},
                {"data": "no_hp_anggota"},
                {"data": "alamat_anggota"},
				
				
           
            ],
            "columnDefs": [
                {"targets": 6, "render": function (data, type, full, meta) {
                        return "\
                                <button class='btn btn-primary viewAnggota' \n\
                                type='button' data-toggle='tooltip' data-placement='bottom'\n\
                                data-original-title='View'><i class='fa fa-search'></i></button>\n\
								<button class='btn btn-warning updateAnggota' \n\
                                type='button' data-toggle='tooltip' data-placement='bottom'\n\
                                data-original-title='Update'><i class='fa fa-pencil'></i></button>\n\
								<button class='btn btn-danger deleteAnggota' \n\
                                type='button' data-toggle='tooltip' data-placement='bottom'\n\
                                data-original-title='Delete'><i class='fa fa-trash-o'></i></button>\n"
								;
                    },
				 "className": 'text-center',
                },

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


var tambahAnggota = function(){
	$('#btnTambahAnggota').on('click', function(e){
		  e.preventDefault(e);
		$('#inputAnggotaModal').modal('show');
		
	});
	
}

var simpanAnggota = function(){
	
	$('#btnSimpanAnggota').on('click', function(e){
		e.preventDefault(e);
		
		var dataAnggota = {
			id_anggota : '',
			nama_anggota : $("#txtNamaAnggota").val(),
			jurusan_anggota : $("#ddlJurusan option:selected").val(),
			no_hp_anggota : $("#txtNoHp").val(), 
			alamat_anggota :  $("#txtAlamat").val(),
			npm :  $("#txtNPM").val()
		}
		
		
		   $.ajax({
            url: "http://localhost/perpustakaan/master/anggota_service.php?function=insert_anggota",
            type: 'POST',
            dataType: "json",
			contentType: 'application/x-www-form-urlencoded',
			data : dataAnggota,
            success: function (data) {
				if(data.status==1){
					$('#inputAnggotaModal').modal('hide');
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

var deleteAnggota = function(){
	  $('#tblAnggota').find('tbody').on('click', 'button.deleteAnggota', function () {
            var table = $('#tblAnggota').DataTable();
            var tbl = table.row($(this).parents('tr'));
            var rData = tbl.data();
            var idData = rData["id_anggota"];



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
                        url: "http://localhost/perpustakaan/master/anggota_service.php?function=delete_anggota&id=" + idData,
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

var updateAnggota = function(){
	$('#tblAnggota').find('tbody').on('click', 'button.updateAnggota', function () {
            var table = $('#tblAnggota').DataTable();
            var tbl = table.row($(this).parents('tr'));
            var rData = tbl.data();
            var idData = rData["id_anggota"];


			

		 $.ajax({
            url: "http://localhost/perpustakaan/master/anggota_service.php?function=get_anggota_id&id=" + idData,
            type: 'GET',
			dataType: "json",
            success: function (data) {
			
                if (data.status == 1) {
					$('#updIdAnggota').val(data.data[0].id_anggota);
					$('#updNamaAnggota').val(data.data[0].nama_anggota);
					$('#updDdlJurusan').val(data.data[0].jurusan_anggota).change();
					$('#updNoHp').val(data.data[0].no_hp_anggota);
					$('#updAlamat').val(data.data[0].alamat_anggota);
					$('#updNPM').val(data.data[0].npm);
					
                } else {
                    common_utils.showPesan("INFO", data.message);
                }
            return;
            },
            error: function (xhr, status, error) {
                common_utils.showPesan("INFO", data.message);
            }
        })

		$('#updateAnggotaModal').modal('show');
			
		$('#btnUpdateAnggota').on('click', function(e){
			e.preventDefault(e);	
			
			console.log(idData)
			
			
			var dataAnggota = {
			id_anggota :  '',
			nama_anggota : $("#updNamaAnggota").val(),
			jurusan_anggota : $("#updDdlJurusan option:selected").val(),
			no_hp_anggota : $("#updNoHp").val(), 
			alamat_anggota :  $("#updAlamat").val(),
			npm :  $("#updNPM").val()
		}
		
		
		   $.ajax({
            url: "http://localhost/perpustakaan/master/anggota_service.php?function=update_anggota&id=" + $("#updIdAnggota").val() ,
            type: 'POST',
            dataType: "json",
			contentType: 'application/x-www-form-urlencoded',
			data : dataAnggota,
            success: function (data) {
				if(data.status==1){
					$('#updateAnggotaModal').modal('hide');
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


var viewAnggota = function(){
	 $('#tblAnggota').find('tbody').on('click', 'button.viewAnggota', function () {
            var table = $('#tblAnggota').DataTable();
            var tbl = table.row($(this).parents('tr'));
            var rData = tbl.data();
            var idData = rData["id_anggota"];
			
			
		$.ajax({
            url: "http://localhost/perpustakaan/master/anggota_service.php?function=get_anggota_id&id=" + idData,
            type: 'GET',
			dataType: "json",
            success: function (data) {
			
                if (data.status == 1) {
					$("#lblNama").text(data.data[0].nama_anggota);
					$("#lblJurusan").text(data.data[0].jurusan_anggota);
					$("#lblNoHp").text(data.data[0].no_hp_anggota);
					$("#lblAlamat").text(data.data[0].alamat_anggota);
					$("#lblNPM").text(data.data[0].npm);
                } else {
                    common_utils.showPesan("INFO", data.message);
                }
            return;
            },
            error: function (xhr, status, error) {
                common_utils.showPesan("INFO", data.message);
            }
        })
			
			
		$('#viewAnggotaModal').modal('show');

        });
}
return{
        init: function () {
         loadDataTable();
		 tambahAnggota();
		 simpanAnggota();
		 deleteAnggota();
		 updateAnggota();
		 viewAnggota();
        },
    };	
}();



jQuery(document).ready(function () {
    anggota.init();
});
