<?php 
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pword = mysqli_real_escape_string($conn, $_POST['pword']);
    if(!empty($email) && !empty($pword)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $user_pass = md5($pword);
            $enc_pass = $row['pword'];
            if($user_pass === $enc_pass){
                $status = "Online";
                $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                if($sql2){
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo "success";
                }else{
                    echo "Ada yang salah. Tolong ulangi";
                }
            }else{
                echo "Email atau Sandi ada yang salah!";
            }
        }else{
            echo "$email - email ini tidak terdaftar";
        }
    }else{
        echo "Tolong isi semua data";
    }
?>