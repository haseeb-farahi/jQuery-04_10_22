
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./pics/bootstrap.min.css">
    <script src="./pics/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container"><br><br>
    <div class="card">
        <div class="card-header">
       <!-- Button trigger modal -->
        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#saveStudentModal">
          Create New Student 
        </button>
        <div class="alert alert-warning d-none" id="myAlertMsg" role="alert"></div>
        </div>
        
        
        <!-- Modal -->
        <div class="modal fade" id="saveStudentModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="saveStudentModal">Create New Student title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    
                                    
                            </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                           <form id="saveStudent">
                           <label for="name"><b>Name:</b></label>
                            <input type="text" name="name" class="form-control" placeholder="Student Name">

                            <label for="name"><b>Last Name:</b></label>
                            <input type="text" class="form-control" name="lname" placeholder="Student Last Name">

                            <label for="name"><b>Email:</b></label>
                            <input type="email" class="form-control" name="email" placeholder="Student Email">

                            <label for="name"><b>Phone:</b></label>
                            <input type="text" class="form-control" name="phone" placeholder="Student Phone Number">

                            <label for="name"><b>Departement:</b></label>
                            <input type="text" class="form-control" name="dep" placeholder="Student DEP">
                           
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create Student</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-primary" id= "lostOfStudents">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">lname</th>
                            <th scope="col">email</th>
                            <th scope="col">phone</th>
                            <th scope="col">DEP</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i =1;
                        $con = mysqli_connect('localhost','root','','db_students');
                        $query ="SELECT *FROM students";
                        $query_run = mysqli_query($con,$query);
                        if(mysqli_num_rows($query_run)>0){
                         foreach($query_run as $students){
                            ?>
                         


                        <tr class="">
                            <td scope="row"><?=$i++ ?></td>
                            <td><?= $students['name'];?></td>
                            <td><?= $students['lname'];?></td>
                            <td><?= $students['email'];?></td>
                            <td><?= $students['phone'];?></td>
                            <td><?= $students['dep'];?></td>

                            <td>
                                <button class="btn btn-info btn-sm" id="infoStudentBtn">Info</button>
                                <button class="btn btn-primary btn-sm" id="editStudentBtn">Edit</button>
                                <button class="btn btn-danger btn-sm" id="deleteStudent">Delete</button>
                            </td>
                        </tr>
                        <?php
                         }
                        }
                        ?>
                        
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
   </div>   
</body>
<script src="./pics/jquery.min.js"></script>
<script src="./myScript.js"></script>
</html>