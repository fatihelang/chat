<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pword = mysqli_real_escape_string($conn, $_POST['pword']);
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($pword)){
        ///cek email user valid atau nda
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            ///cek email user sudah ada nda
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "$email - Email ini telah terdaftar!";
            }else{
                ///cek user upload file nda
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name']; 
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name']; ///nama sementara buat disimpan di file folder
                    $img_explode = explode('.',$img_name); ///mengubah string menjadi array
                    $img_ext = end($img_explode);///cek ekstensi filenya
                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/png", "image/jpg"];
                        if(in_array($img_type, $types) === true){
                            $time = time(); 
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                                $random_id = rand(time(), 100000000);
                                $status = "Online";
                                $encrypt_pass = md5($pword);
                                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, pword, img, status)
                                VALUES ({$random_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}')");
                                if($insert_query){
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0){
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];
                                        echo "success";
                                    }else{
                                        echo "Alamat Email tidak ada!";
                                    }
                                }else{
                                    echo "Ada yang salah. Tolong ulangi";
                                }
                            }
                        }else{
                            echo "Tolong unggah gambar dengan file - jpeg, png, jpg";
                        }
                    }else{
                        echo "Tolong unggah gambar";
                    }
                }
            }
        }else{
            echo "$email - Email tidak valid!";
        }
    }else{
        echo "Tolong isi semua data";
    }
?>