<?php

class Controller extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('idu_model');
    }

    function index() {

        $data['uv'] = $this->idu_model->getDataUniversity();
        $data['gender'] = $this->idu_model->getDatagender();
        $data['status'] = $this->idu_model->getDatastatus();
        $data['department'] = $this->idu_model->getDatadepartment();
        $this->load->view('index', $data);
    }

    function insert_stdInfo() {
        $stdname = $this->input->post('name');
        $unv = $this->input->post('unv');
        $dept = $this->input->post('dept');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $phone = $this->input->post('phone');
        $dob = $this->input->post('dob');
        $add = $this->input->post('add');
        $postcode = $this->input->post('postcode');
        //  $img = $this->input->post('fileToUpload');
        $sex = $this->input->post('sex');
        $status = $this->input->post('status');

        $imagefile = $_FILES["fileToUpload"]["name"];
        $targetFile = "assets/photo/" . $imagefile;
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFile);

//        $target_dir = "image/slider/";
//        $target_file = $target_dir . $_FILES["fileToUpload"]["name"];
//        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
//        $fileToUpload = $_FILES["fileToUpload"]["name"];

        $user = array(             //for student table
            'name' => $stdname,
            'unv' => $unv,
            'dept' => $dept,
            'email' => $email,
            'password' => $password,
            'phone' => $phone,
            'dob' => $dob,
            'add' => $add,
            'postcode' => $postcode,
            'fileToUpload' => $imagefile,
            'sex' => $sex,
            'status' => $status
        );

        $userId = array(
            'password' => $password
        );

        $user_profile = array(
            'name' => $stdname,
            'unv_id' => $unv,
            'dept_id' => $dept,
            'dob' => $dob,
            'fileToUpload' => $imagefile,
            'gender_id' => $sex,
            'status_id' => $status,
            'postcode' => $postcode
        );
        $contactInfo = array(
            'email' => $email,
            'phone' => $phone,
            'add' => $add
        );

        //     $last_id = $this->idu_model->insertData('talstudent', $user); //insert student table data
        //    $userId['id'] = $last_id;


        $last_id = $this->idu_model->insertData('user_id', $userId);
        $user_profile['id'] = $last_id; //accept last id from database
        $this->idu_model->insertData('user_profile', $user_profile);
        $contactInfo['id'] = $last_id;
        $this->idu_model->insertData('contact', $contactInfo);
        redirect('controller/view_multipletableInfo');
    }

    function view_studentinfo() {      //view data for student table
        $data['data'] = $this->idu_model->viewstdinf();
        $this->load->view('view_stdinfo', $data);
    }

    function view_multipletableInfo() {

        $data['data'] = $this->idu_model->getData_difTable();
        $this->load->view('viewData_diffTable', $data);
    }

    //get data from multiple table for edit data

    function edit_multipletableData() {
        $id = $_GET['id'];
        $data['data'] = $this->idu_model->MultiData_difTable($id);
        $data['uv'] = $this->idu_model->getDataUniversity();
        $data['gender'] = $this->idu_model->getDatagender();
        $data['status'] = $this->idu_model->getDatastatus();
        $data['department'] = $this->idu_model->getDatadepartment();
        $data['id'] = $id;
        $this->load->view('editMultiTableData', $data);
    }
    
    
        function delete_diffTabledata() {  //delete specific id data multiple table
        $id = $_GET['id'];
        $this->idu_model->deleteDataMultiTable('user_profile',$id);
        $this->idu_model->deleteDataMultiTable('user_id',$id);
        $this->idu_model->deleteDataMultiTable('contact',$id);
        redirect('controller/view_multipletableInfo');
    }
           function update_multileTaData() {
        $id = $this->input->post('id');
        $stdname = $this->input->post('name');
        $unv = $this->input->post('unv');
        $dept = $this->input->post('dept');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $phone = $this->input->post('phone');
        $dob = $this->input->post('dob');
        $add = $this->input->post('add');
        $postcode = $this->input->post('postcode');
        //  $img = $this->input->post('fileToUpload');
        $sex = $this->input->post('sex');
        $status = $this->input->post('status');
        $imagefile = $_FILES["fileToUpload"]["name"];
        $targetFile = "assets/photo/" . $imagefile;
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFile);

//        $target_dir = "image/slider/";
//        $target_file = $target_dir . $_FILES["fileToUpload"]["name"];
//        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
//        $fileToUpload = $_FILES["fileToUpload"]["name"];

        $user = array(//for student table
            'name' => $stdname,
            'unv' => $unv,
            'dept' => $dept,
            'email' => $email,
            'password' => $password,
            'phone' => $phone,
            'dob' => $dob,
            'add' => $add,
            'postcode' => $postcode,
            'fileToUpload' => $imagefile,
            'sex' => $sex,
            'status' => $status
        );

        $userId = array(
            'password' => $password
        );

        $user_profile = array(
            'name' => $stdname,
            'unv_id' => $unv,
            'dept_id' => $dept,
            'dob' => $dob,
            'fileToUpload' => $imagefile,
            'gender_id' => $sex,
            'status_id' => $status,
            'postcode' => $postcode
        );
        $contactInfo = array(
            'email' => $email,
            'phone' => $phone,
            'add' => $add
        );

        //     $last_id = $this->idu_model->insertData('talstudent', $user); //insert student table data
        //    $userId['id'] = $last_id;
        // $this->idu_model->updateQuery($id, $user); 
        $last_id = $this->idu_model->updateQueryMultiData('user_id', $id, $userId);
        //$user_profile['id'] = $last_id; //accept last id from database
        $this->idu_model->updateQueryMultiData('user_profile', $id, $user_profile);
        // $contactInfo['id'] = $last_id;
        $this->idu_model->updateQueryMultiData('contact', $id, $contactInfo);
        redirect('controller/view_multipletableInfo');
    }

    function view_data() { //view specific id data
        $id = $_GET['id'];
        $data['data'] = $this->idu_model->view_data($id);
        $this->load->view('show_detail', $data);
    }

    function delete_data() {  //delete specific id data
        $id = $_GET['id'];
        $data['data'] = $this->idu_model->deleteData($id);
        redirect('controller/view_studentinfo');
    }

    function edit_studentinfo() { //edit specific id data
        $id = $_GET['id'];
        $data['data'] = $this->idu_model->editstdinfo($id);
        $this->load->view('editStdinfo', $data);
    }

    function update_stdInfo() {    //update student table data
        $id = $this->input->post('id');
        $stdname = $this->input->post('name');
        $unv = $this->input->post('unv');
        $dept = $this->input->post('dept');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $phone = $this->input->post('phone');
        $dob = $this->input->post('dob');
        $add = $this->input->post('add');
        $postcode = $this->input->post('postcode');
        //  $img = $this->input->post('fileToUpload');
        $sex = $this->input->post('sex');
        $status = $this->input->post('status');

        $imagefile = $_FILES["fileToUpload"]["name"];
        $targetFile = "assets/photo/" . $imagefile;
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFile);

//        $target_dir = "image/slider/";
//        $target_file = $target_dir . $_FILES["fileToUpload"]["name"];
//        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
//        $fileToUpload = $_FILES["fileToUpload"]["name"];

        $user = array(  //array for update student table
            'name' => $stdname,
            'unv' => $unv,
            'dept' => $dept,
            'email' => $email,
            'password' => $password,
            'phone' => $phone,
            'dob' => $dob,
            'add' => $add,
            'postcode' => $postcode,
            'fileToUpload' => $imagefile,
            'sex' => $sex,
            'status' => $status
        );
        //  print_r($user);
        // exit();
        $this->idu_model->updateQuery($id, $user); //update student data query
        redirect('controller/view_studentinfo');
    }

//   public function imageUploded($img,$folder)
//   {
//            $target_dir = "uploads/";
//            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//            $uploadOk = 1;
//            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
//            // Check if image file is a actual image or fake image
//            if(isset($_POST["submit"])) {
//                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//                if($check !== false) {
//                    echo "File is an image - " . $check["mime"] . ".";
//                    $uploadOk = 1;
//                } else {
//                    echo "File is not an image.";
//                    $uploadOk = 0;
//                }
//            }
//            // Check if file already exists
//            if (file_exists($target_file)) {
//                echo "Sorry, file already exists.";
//                $uploadOk = 0;
//            }
//            // Check file size
//            if ($_FILES["fileToUpload"]["size"] > 500000) {
//                echo "Sorry, your file is too large.";
//                $uploadOk = 0;
//            }
//            // Allow certain file formats
//            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//            && $imageFileType != "gif" ) {
//                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//                $uploadOk = 0;
//            }
//            // Check if $uploadOk is set to 0 by an error
//            if ($uploadOk == 0) {
//                echo "Sorry, your file was not uploaded.";
//            // if everything is ok, try to upload file
//            } else {
//                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//                    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
//                } else {
//                    echo "Sorry, there was an error uploading your file.";
//                }
//            }
//       
//       
//       
//   }
}
