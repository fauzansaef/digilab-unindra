<?php
require_once "../koneksi.php";
 if(function_exists($_GET['function'])) {
         $_GET['function']();
      }   
   function get_buku()
   {
	  $data=null;
      $connect = open_connection();      
      $query = $connect->query("SELECT * FROM tbl_buku ORDER BY id_buku DESC");            
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
   
   function get_buku_id()
   {
      $connect = open_connection();
      if (!empty($_GET["id"])) {
         $id = $_GET["id"];      
      }            
      $query ="SELECT * FROM tbl_buku WHERE id_buku= $id";      
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
   function insert_buku()
      {
         $connect = open_connection();   
         $check = array('id_buku' => '', 'kode_buku' => '', 'judul_buku' => '', 'penulis_buku' => '', 'penerbit_buku' => '', 'tahun_penerbit' => '', 'stok' => '');
         $check_match = count(array_intersect_key($_POST, $check));
         if($check_match == count($check)){
         
               $result = mysqli_query($connect, "INSERT INTO tbl_buku SET
               id_buku = '$_POST[id_buku]',
               kode_buku = '$_POST[kode_buku]',
               judul_buku = '$_POST[judul_buku]',
			   penulis_buku = '$_POST[penulis_buku]',
               penerbit_buku = '$_POST[penerbit_buku]',
               tahun_penerbit = '$_POST[tahun_penerbit]',
               stok = '$_POST[stok]'");
               
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
   function update_buku()
      {
         $connect = open_connection();
         if (!empty($_GET["id"])) {
         $id = $_GET["id"];      
      }   
		 $check = array('kode_buku' => '', 'judul_buku' => '', 'penulis_buku' => '', 'penerbit_buku' => '', 'tahun_penerbit' => '', 'stok' => '');
         $check_match = count(array_intersect_key($_POST, $check));         
         if($check_match == count($check)){
         
              $result = mysqli_query($connect, "UPDATE tbl_buku SET               
              kode_buku = '$_POST[kode_buku]',
              judul_buku = '$_POST[judul_buku]',
              penulis_buku = '$_POST[penulis_buku]',
              penerbit_buku = '$_POST[penerbit_buku]',
              tahun_penerbit = '$_POST[tahun_penerbit]',
              stok = '$_POST[stok]' WHERE id_buku=".$id);
         
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
   function delete_buku()
   {
      $connect = open_connection();
      $id = $_GET['id'];
      $query = "DELETE FROM tbl_buku WHERE id_buku=".$id;
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
   
   
   function get_count_buku(){
	 $data=null;
      $connect = open_connection();      
      $query = $connect->query("SELECT SUM(stok) AS total_stok FROM tbl_buku");            
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