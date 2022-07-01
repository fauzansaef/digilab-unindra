var dashboard =  function (){
	
	var totalBuku = function (){
		
		var span = $('#stokBuku');
        span.empty();
		
		 $.ajax({
            url: "http://localhost/perpustakaan/master/buku_service.php?function=get_count_buku",
            type: 'GET',
			dataType: "json",
            success: function (data) {
			
                if (data.status == 1) {
					
					var html = "<span data-counter='counterup' data-value="+data.data[0].total_stok+">"+data.data[0].total_stok+"</span>";
				
					span.append(html);
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
	
	
	var totalAnggota = function (){
		
		var span = $('#totalAnggota');
        span.empty();
		
		 $.ajax({
            url: "http://localhost/perpustakaan/master/anggota_service.php?function=get_count_anggota",
            type: 'GET',
			dataType: "json",
            success: function (data) {
			
                if (data.status == 1) {
					
					var html = "<span data-counter='counterup' data-value="+data.data[0].total+">"+data.data[0].total+"</span>";
				
					span.append(html);
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
	
	
	var totalPeminjaman = function (){
		
		var span = $('#totalPeminjaman');
        span.empty();
		
		 $.ajax({
            url: "http://localhost/perpustakaan/transaksi/peminjaman_service.php?function=get_count_peminjaman",
            type: 'GET',
			dataType: "json",
            success: function (data) {
			
                if (data.status == 1) {
					
					var html = "<span data-counter='counterup' data-value="+data.data[0].total+">"+data.data[0].total+"</span>";
				
					span.append(html);
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
	
	var totalPengembalian = function (){
		
		var span = $('#totalPengembalian');
        span.empty();
		
		 $.ajax({
            url: "http://localhost/perpustakaan/transaksi/pengembalian_service.php?function=get_count_pengembalian",
            type: 'GET',
			dataType: "json",
            success: function (data) {
			
                if (data.status == 1) {
					
					var html = "<span data-counter='counterup' data-value="+data.data[0].total+">"+data.data[0].total+"</span>";
				
					span.append(html);
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
	
	
	
	return{
        init: function () {
			totalBuku();
			totalAnggota();
			totalPeminjaman();
			totalPengembalian();
        },
    };
	
}();

jQuery(document).ready(function () {
    dashboard.init();
});