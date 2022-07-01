<?php
require_once "../koneksi.php";
 if(function_exists($_GET['function'])) {
         $_GET['function']();
      }   
   function get_anggota()
   {
	  $data=null;
      $connect = open_connection();      
      $query = $connect->query("SELECT * FROM tbl_anggota ORDER BY id_anggota DESC");            
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
   
   function get_anggota_id()
   {
      $connect = open_connection();
      if (!empty($_GET["id"])) {
         $id = $_GET["id"];      
      }            
      $query ="SELECT * FROM tbl_anggota WHERE id_anggota= $id";      
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
   function insert_anggota()
      {
         $connect = open_connection();   
         $check = array('id_anggota' => '', 'nama_anggota' => '', 'jurusan_anggota' => '', 'no_hp_anggota' => '', 'alamat_anggota' => '', 'npm' => '');
         $check_match = count(array_intersect_key($_POST, $check));
         if($check_match == count($check)){
         
               $result = mysqli_query($connect, "INSERT INTO tbl_anggota SET
               id_anggota = '$_POST[id_anggota]',
               nama_anggota = '$_POST[nama_anggota]',
               jurusan_anggota = '$_POST[jurusan_anggota]',
			   no_hp_anggota = '$_POST[no_hp_anggota]',
			   alamat_anggota = '$_POST[alamat_anggota]',
               npm = '$_POST[npm]'");
               
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
   function update_anggota()
      {
        $connect = open_connection();
        if (!empty($_GET["id"])) {
				$id = $_GET["id"];      
		}   
		 $check = array('nama_anggota' => '', 'jurusan_anggota' => '', 'no_hp_anggota' => '', 'alamat_anggota' => '', 'npm' => '');
         $check_match = count(array_intersect_key($_POST, $check));         
         if($check_match == count($check)){
         
              $result = mysqli_query($connect, "UPDATE tbl_anggota SET               
              nama_anggota = '$_POST[nama_anggota]',
              jurusan_anggota = '$_POST[jurusan_anggota]',
			  no_hp_anggota = '$_POST[no_hp_anggota]',
              alamat_anggota = '$_POST[alamat_anggota]',
			  npm = '$_POST[npm]' WHERE id_anggota=".$id);
         
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
         }
		 else{
            $response=array(
                     'status' => 0,
                     'message' =>'Wrong Parameter',
                     'data'=> $id
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
   function delete_anggota()
   {
      $connect = open_connection();
      $id = $_GET['id'];
      $query = "DELETE FROM tbl_anggota WHERE id_anggota=".$id;
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
   
   
   function get_count_anggota(){
	 $data=null;
      $connect = open_connection();      
      $query = $connect->query("SELECT COUNT(*) AS total FROM tbl_anggota");            
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