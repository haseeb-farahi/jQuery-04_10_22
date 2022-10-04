<?php
$con = mysqli_connect('localhost','root','','db_students');

if(isset($_POST['save_student'])){

    $name = mysqli_real_escape_string($con,$_POST['name']);
    $lname = mysqli_real_escape_string($con,$_POST['lname']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $dep = mysqli_real_escape_string($con,$_POST['dep']);

if($name == NULL || $lname==NULL || $email== NULL || $phone==Null || $dep == Null){
    $res = [
        "status"=>422,
        "message"=>"all fields are mondatory",
    ];
    echo json_encode($res);
    return;
}
    $query = "INSERT INTO students(name,lname,email,phone,dep) VALUE('$name','$lname','$email','$phone','$dep')";

    $query_run = mysqli_query($con,$query);

    if($query_run){
        $res = [
            "status"=>200,
            "message"=>"Student Created Successfully",
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_GET['student_id'])){

    $student_id = mysqli_real_escape_string($con,$_GET['student_id']);

    $query = "SELECT * FROM sudents WHERE id = '";

    $query_run = mysqli_query($con,$query);

    if(mysqli_num_rows($query_run)==1){
        $student = mysqli_fetch_array($query_run);

        $res = [
            "status"=>200,
            "message"=>'student selected'
            'data'=>$student,


        ];
        echo json_encode($res);
        return;

    }else{
        $res =[
            "status"=>404;
            "message"=>'student not exist'
        ];
        echo json_encode($res);
        return;
    }

}






// INSERT INTO `students` (`id`, `name`, `lname`, `phone`, `email`, `dep`) VALUES ('1', 'Ahmad', 'Mahamood', '077203040', 'ahmad@gmail.com', 'BCA');
?>