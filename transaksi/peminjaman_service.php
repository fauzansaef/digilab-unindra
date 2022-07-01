<?php
require_once "../koneksi.php";
 if(function_exists($_GET['function'])) {
         $_GET['function']();
      }   
   function get_peminjaman()
   {
	  $data=null;
      $connect = open_connection();      
      $query = $connect->query("select tp.id_peminjaman ,tp.tgl_pinjam ,tp.tgl_kembalikan ,tb.kode_buku , tb.judul_buku , ta.nama_anggota , tp2.nama_petugas, tp.status from tbl_peminjaman tp inner join tbl_buku tb on tp.id_buku = tb.id_buku 
								inner join tbl_anggota ta on tp.id_anggota = ta.id_anggota inner join tbl_petugas tp2 on tp.id_petugas = tp2.id_petugas order by tp.id_peminjaman desc ");            
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
   
   
   
   
   function get_peminjaman_id()
   {
      $connect = open_connection();
      if (!empty($_GET["id"])) {
         $id = $_GET["id"];      
      }            
      $query ="SELECT * FROM tbl_peminjaman WHERE id_peminjaman= $id";      
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
   function insert_peminjaman()
      {
         $connect = open_connection();   
         $check = array('id_peminjaman' => '', 'tgl_pinjam' => '', 'tgl_kembalikan' => '', 'id_buku' => '', 'id_anggota' => '', 'id_petugas' => '');
         $check_match = count(array_intersect_key($_POST, $check));
         if($check_match == count($check)){
         
               $result = mysqli_query($connect, "INSERT INTO tbl_peminjaman SET
               id_peminjaman = '$_POST[id_peminjaman]',
               tgl_pinjam = '$_POST[tgl_pinjam]',
               tgl_kembalikan = '$_POST[tgl_kembalikan]',
			   id_buku = '$_POST[id_buku]',
               id_anggota = '$_POST[id_anggota]',
			   status = '0',
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
   function update_peminjaman()
      {
         $connect = open_connection();
         if (!empty($_GET["id"])) {
         $id = $_GET["id"];      
      }   
		 $check = array('tgl_pinjam' => '', 'tgl_kembalikan' => '', 'id_buku' => '', 'id_anggota' => '', 'id_petugas' => '');
         $check_match = count(array_intersect_key($_POST, $check));         
         if($check_match == count($check)){
         
              $result = mysqli_query($connect, "UPDATE tbl_peminjaman SET               
              tgl_pinjam = '$_POST[tgl_pinjam]',
              tgl_kembalikan = '$_POST[tgl_kembalikan]',
              id_buku = '$_POST[id_buku]',
              id_anggota = '$_POST[id_anggota]',
              id_petugas = '$_POST[id_petugas]' WHERE id_peminjaman=".$id);
         
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
   function delete_peminjaman()
   {
      $connect = open_connection();
      $id = $_GET['id'];
      $query = "DELETE FROM tbl_peminjaman WHERE id_peminjaman=".$id;
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
   
   	function update_stok_buku(){
		
		$connect = open_connection();
		$id_buku = $_GET['id_buku'];
		$query = "UPDATE tbl_buku SET stok = (stok-1) WHERE id_buku =".$id_buku;
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
	
	
	function get_count_peminjaman(){
	 $data=null;
      $connect = open_connection();      
      $query = $connect->query("SELECT COUNT(*) AS total FROM tbl_peminjaman WHERE status = 0");            
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