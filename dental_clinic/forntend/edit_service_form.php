<?php

include'../database_conn.php';

if ( isset ( $_POST['update'] )){


    $user_id = $_POST ["appt_id"];

    $first_name = $_POST ["first_name"];

    $last_name = $_POST ["last_name"];

    $age = $_POST ["age"];

    $date_of_birth = $_POST ["date_of_birth"];

    $gender = $_POST ["gender"];

    $relationship = $_POST ["relationship"];

    $contact = $_POST ["contact"];

    $email = $_POST [" email"];

    $address = $_POST ["address"];

    $remarks = $_POST ["remarks"];
    
    $sql ="UPDATE `_appointments` SET `first_name` = '$first_name', `last_name` = '$last_name', 
    `age` = '$age', `date_of_birth` = '$date_of_birth' = `gender` = '$gender', `relationship` = '$relationship',
    `contact` = '$contact', `email` = '$email', `address` = '$address', `remarks` = '$remarks' WHERE `appt_id` = '$user_id'";

    $result = $conn->query($sql);

    if($result == TRUE ){
        
        echo'Details has been updated.';

        header("location:homee.html");

    }else{
        // echo"Error".$sql."<br>". $conn->error;
    }

}

if(isset($_GET['appt_id'])){

    $user_id = $GET['appt_id'];

    $sql = "SELECT * FROM `_appointments` WHERE `appt_id`='$user_id' ";

    $result = $conn->query($sql);

    if($result->num_rows>0){

        while($row = $result->fetch_assoc()){

        $first_name = $row ["first_name"];

        $last_name = $row ["last_name"];
    
        $age = $row ["age"];
    
        $date_of_birth = $row ["date_of_birth"];
    
        $gender = $row ["gender"];
    
        $relationship = $row ["relationship"];
    
        $contact = $row ["contact"];
    
        $email = $row [" email"];
    
        $address = $row ["address"];
        }
        ?>
    <div class="patient_form" style="width:50%;font-size: 25px;">
    <form action="services_form.php?id=<?php echo $row['appt_id'] ?>" method="post">

      <label for="first_name">First Name</label><br>
      <input type="text" id="first_name" name="first_name" value="<?php $first_name; ?>" placeholder="Enter Your First Name"><br>
      <input type="hidden" name = "user_id" value="<?php echo $id; ?>">
      <span class="error" style="color: red;">
        <?php echo $first_name_err ?>
      </span>

      <label for="last_name">Last Name</label><br>
      <input type="text" id="last_name" name="last_name" value="<?php $last_name; ?>" placeholder="Enter Your Last Name"><br>
      <span class="error" style="color: red;">
        <?php echo $last_name_err ?>
      </span>

      <label for="age">Your Age</label><br>
      <input type="number" id="age" name="age" value="<?php $age; ?>" placeholder="Enter Your Age"><br>
      <span class="error" style="color: red;">
        <?php echo $age_err ?>
      </span>
      <hr>
      <label for="date_of_birth">Date of Birth</label><br>
      <input type="date" id="date_of_birth" name="date_of_birth" value="<?php $date_of_birth; ?>" placeholder="Enter Your Date of Birth"><br>

      <label for="gender">Gender</label><br>
      <label for="male">Male</label>
      <input type="radio" id="gender" name="gender">
      <label for="female">Female</label>
      <input type="radio" id="gender" name="gender"><br><br>

      <span class="error" style="color: red;">
        <?php echo $date_of_birth_err ?>
      </span>


      <label for="relationship">Relationship</label><br>
      <select name="relationship" value="<?php $relationship; ?>" id="relationship">
        <option>Relationship Status</option>
        <option value="Married">Married</option>
        <option value="Unmarried">Unmarried</option>
      </select>
      <br>
      <span class="error" style="color: red;">
        <?php echo $relationship_err ?>
      </span>
      <hr>
      <label for="contact">Contact</label><br>
      <input type="tel" id="contact" name="contact" value="<?php $contact; ?>" placeholder="Enter Your Phone Number"><br>
      <span class="error" style="color: red;">
        <?php echo $contact_err ?>
      </span>

      <label for="email">Email</label><br>
      <input type="email" id="email" name="email" value="<?php $email; ?>" placeholder="Enter Your Email"><br>
      <span class="error" style="color: red;">
        <?php echo $email_err ?>
      </span>

      <label for="address">Address</label><br>
      <input type="text" id="address" name="address" value="<?php $address; ?>" placeholder="Enter Your Address"><br>
      <br>
      <span class="error" style="color: red;">
        <?php echo $address_err ?>
      </span>

      <label for="remarks">Remarks</label><br>
      <textarea name="remarks" id="remarks" value="<?php $remarks; ?>" cols="30" rows="5" placeholder="Say Something About Your Appointment..." >></textarea><br>
      <br>
      <span class="error" style="color: red;">
        <?php echo $remarks_err ?>
      </span>
      
      <button type="submit">Submit Form</button>
      <hr>

    </form>
  </div>
<?php
}else{

    header("location:homee.html");

}

}
?>