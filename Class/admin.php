<?php

class adminBack{
    private $conn;

    public function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "imagepro";

        $this->conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

        if(!$this->conn){
            die("Database Connection Error!");
        }
    }

    function upload_img($data){
        $title = $data['title'];
        $img_name = $_FILES['files']['name'];
        $tmp_name = $_FILES['files']['tmp_name'];
        $size = $_FILES['files']['size'];
        $ext = pathinfo($img_name, PATHINFO_EXTENSION);

        if($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg'){
            if($size <= 2097152){
                $query = "INSERT INTO info(title, img_name) VALUE('$title','$img_name')";
                if(mysqli_query($this->conn, $query)){
                    move_uploaded_file($tmp_name, 'upload/'.$img_name);
                    $msg = "Your Image Uploaded Successfully!";
                    return $msg;
                }
            }else{
                $msg = "Your Image Should Be Less or Equal 2 MB!";
                return $msg;
            }
        }else{
            $msg = "Your File is not valid! Please Upload JPG or PNG File.";
            return $msg;
        }
    }

    function display_image(){
        $query = "SELECT * FROM info";
        if(mysqli_query($this->conn, $query)){
            $img_info = mysqli_query($this->conn, $query);
            return $img_info;
        }
    }

}

?>