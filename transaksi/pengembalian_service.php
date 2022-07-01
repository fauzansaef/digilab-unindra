<?php
require_once "../koneksi.php";
 if(function_exists($_GET['function'])) {
         $_GET['function']();
      }   
   function get_pengembalian()
   {
	  $data=null;
      $connect = open_connection();      
      $query = $connect->query("select tp.id_pengembalian, ta.nama_anggota , tb.judul_buku ,tp2.nama_petugas ,tp.tgl_pengembalian, tp.denda
								from tbl_pengembalian tp inner join tbl_buku tb on tp.id_buku = tb.id_buku
								inner join tbl_anggota ta on tp.id_anggota = ta.id_anggota
								inner join tbl_petugas tp2 on tp.id_petugas = tp2.id_petugas order by tp.id_pengembalian desc");            
      while($row=mysqli_fetch_object($query))
      {
         $data[] =$row;
      }
	  
	  if($data==null){
		  $response=array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => (array)null
                  ); 
		  
	  }else{
		    
				$response=array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => $data
                  );
	  }
	
      header('Content-Type: application/json');
      echo json_encode($response);
   }   
   
   function get_pengembalian_id()
   {
      $connect = open_connection();
      if (!empty($_GET["id"])) {
         $id = $_GET["id"];      
      }            
      $query ="select tp.id_pengembalian, ta.nama_anggota , tb.judul_buku ,tp2.nama_petugas ,tp.tgl_pengembalian, tp.denda
				from tbl_pengembalian tp inner join tbl_buku tb on tp.id_buku = tb.id_buku
				inner join tbl_anggota ta on tp.id_anggota = ta.id_anggota
				inner join tbl_petugas tp2 on tp.id_petugas = tp2.id_petugas WHERE id_anggota= $id";      
      $result = $connect->query($query);
      while($row = mysqli_fetch_object($result))
      {
         $data[] = $row;
      }            
      if($data)
      {
      $response = array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => $data
                  );               
      }else {
         $response=array(
                     'status' => 0,
                     'message' =>'No Data Found'
                  );
      }
      
      header('Content-Type: application/json');
      echo json_encode($response);
       
   }
   function insert_pengembalian()
      {
         $connect = open_connection();   
         $check = array('id_pengembalian' => '', 'tgl_pengembalian' => '', 'denda' => '','id_buku' => '', 'id_anggota' => '', 'id_petugas' => '');
         $check_match = count(array_intersect_key($_POST, $check));
         if($check_match == count($check)){
         
               $result = mysqli_query($connect, "INSERT INTO tbl_pengembalian SET
               id_pengembalian = '$_POST[id_pengembalian]',
               tgl_pengembalian = '$_POST[tgl_pengembalian]',
               denda = '$_POST[denda]',
			   id_buku = '$_POST[id_buku]',
			   id_anggota = '$_POST[id_anggota]',
               id_petugas = '$_POST[id_petugas]'");
               			   
               if($result)
               {
                  $response=array(
                     'status' => 1,
                     'message' =>'Insert Success'
                  );
               }
               else
               {
                  $response=array(
                     'status' => 0,
                     'message' =>'Insert Failed.'
                  );
               }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Wrong Parameter'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
   function update_pengembalian()
      {
         $connect = open_connection();
         if (!empty($_GET["id"])) {
         $id = $_GET["id"];      
      }   
		 $check = array('tgl_pengembalian' => '', 'denda' => '', 'id_buku' => '', 'id_anggota' => '', 'id_petugas' => '');
         $check_match = count(array_intersect_key($_POST, $check));         
         if($check_match == count($check)){
         
              $result = mysqli_query($connect, "UPDATE tbl_pengembalian SET               
              tgl_pengembalian = '$_POST[tgl_pengembalian]',
              denda = '$_POST[denda]',
			  id_buku = '$_POST[id_buku]',
			  id_anggota = '$_POST[id_anggota]',
              id_petugas = '$_POST[id_petugas]' WHERE id_pengembalian=".$id);
         
            if($result)
            {
               $response=array(
                  'status' => 1,
                  'message' =>'Update Success'                  
               );
            }
            else
            {
               $response=array(
                  'status' => 0,
                  'message' =>'Update Failed'                  
               );
            }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Wrong Parameter',
                     'data'=> $id
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
   function delete_pengembalian()
   {
      $connect = open_connection();
      $id = $_GET['id'];
      $query = "DELETE FROM tbl_pengembalian WHERE id_pengembalian=".$id;
      if(mysqli_query($connect, $query))
      {
         $response=array(
            'status' => 1,
            'message' =>'Delete Success'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'Delete Fail.'
         );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }
   
   
   function get_pengembalian_peminjaman()
   {
	  $data=null;
      $connect = open_connection();
      if (!empty($_GET["npm"])) {
         $npm = $_GET["npm"];      
      }            
      $query = "select tp.id_peminjaman,ta.id_anggota,ta.nama_anggota ,ta.jurusan_anggota,ta.no_hp_anggota ,tb.id_buku ,tb.kode_buku ,tb.judul_buku ,tp.tgl_pinjam ,tp.tgl_kembalikan from tbl_peminjaman tp 
				inner join tbl_anggota ta ON tp.id_anggota = ta.id_anggota 
				inner join tbl_buku tb on tp.id_buku  = tb.id_buku 
				where tp.status = 0 and ta.npm = $npm";      
      $result = $connect->query($query);
      while($row = mysqli_fetch_object($result))
      {
         $data[] = $row;
      }            
       
	  if($data==null){
		  $response=array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => (array)null
                  ); 
		  
	  }else{
		    
				$response=array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => $data
                  );
	  }
	
      
      header('Content-Type: application/json');
      echo json_encode($response);
       
   }
   
   function update_status_peminjaman()
   {
	  	
	$connect = open_connection();
	$id_peminjaman = $_GET['id_peminjaman'];
	$query = "UPDATE tbl_peminjaman SET status = 1 WHERE id_peminjaman=".$id_peminjaman;
      if(mysqli_query($connect, $query))
      {
         $response=array(
            'status' => 1,
            'message' =>'Update Success'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'Update Fail.'
         );
      }
      header('Content-Type: application/json');
      echo json_encode($response);	
		 
	}
	
	function update_stok_buku(){
		
		$connect = open_connection();
		$id_buku = $_GET['id_buku'];
		$query = "UPDATE tbl_buku SET stok = (stok+1) WHERE id_buku =".$id_buku;
		if(mysqli_query($connect, $query))
		{
			$response=array(
            'status' => 1,
            'message' =>'Update Success'
         );
		}
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'Update Fail.'
         );
      }
      header('Content-Type: application/json');
      echo json_encode($response);	
	}
	
	
	
	function get_laporan_pengembalian(){
	  $data=null;
      $connect = open_connection();      
      $query = $connect->query("select tp.id_pengembalian ,tb.kode_buku ,tb.judul_buku ,tb.penulis_buku ,tb.penerbit_buku ,tp.tgl_pengembalian ,tp2.nama_petugas ,tp.denda from tbl_pengembalian tp inner join tbl_buku tb on tp.id_buku = tb.id_buku
inner join tbl_petugas tp2 on tp.id_petugas = tp2.id_petugas order by tp.id_pengembalian desc");            
      while($row=mysqli_fetch_object($query))
      {
         $data[] =$row;
      }
	  
	  if($data==null){
		  $response=array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => (array)null
                  ); 
		  
	  }else{
		    
				$response=array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => $data
                  );
	  }
	
      header('Content-Type: application/json');
      echo json_encode($response);
	}
	
	function get_count_pengembalian(){
	 $data=null;
      $connect = open_connection();      
      $query = $connect->query("SELECT COUNT(*) AS total FROM tbl_peminjaman WHERE status = 1");            
      while($row=mysqli_fetch_object($query))
      {
         $data[] =$row;
      }
	  
	 if($data==null){
		  $response=array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => (array)null
                  ); 
		  
	  }else{
		    
				$response=array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => $data
                  );
	  }
		

      header('Content-Type: application/json');
      echo json_encode($response);
   }
   
 ?>