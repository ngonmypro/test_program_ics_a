<?php include "../../../connect/connect_mysql.php";

    if ($_POST['EmpStatus'] == 'add') {
      $sql_se = "SELECT * FROM employee WHERE EmployeeName = '".$_POST['add_emp_name']."' AND EmployeeAddress = '".$_POST['add_emp_address']."' AND EmployeeDepartment = '".$_POST['add_emp_department']."'";
      $result_se = $db->query($sql_se);
      if (mysqli_num_rows($result_se) == 0) {
        $sql_in = " INSERT INTO employee (EmployeeName, EmployeeAddress, EmployeeDepartment)
        VALUES ('".$_POST['add_emp_name']."','".$_POST['add_emp_address']."','".$_POST['add_emp_department']."')";
        $result_in = $db->query($sql_in);
          echo "Y";
      }else {
        echo "N";
      }
    }else if ($_POST['EmpStatus'] == 'edit') {
      $sql_se = "SELECT * FROM employee WHERE EmployeeName = '".$_POST['edit_emp_name']."' AND EmployeeAddress = '".$_POST['edit_emp_address']."' AND EmployeeDepartment = '".$_POST['edit_emp_department']."' AND EmployeeId <> '".$_POST['EmpId']."'";
      $result_se = $db->query($sql_se);
      if (mysqli_num_rows($result_se) == 0) {
      $sql_up = "UPDATE employee SET EmployeeName = '".$_POST['edit_emp_name']."', EmployeeAddress = '".$_POST['edit_emp_address']."', EmployeeDepartment = '".$_POST['edit_emp_department']."' WHERE EmployeeId = '".$_POST['EmpId']."'";
      $result_up = $db->query($sql_up);
        echo "Y";
      }else {
        echo "N";
      }

    }elseif ($_POST['EmpStatus'] == 'delete') {
      $sql_del = "DELETE FROM employee WHERE EmployeeId = '".$_POST['EmpId']."'";
      $result_del = $db->query($sql_del);
        echo "Y";

    }else {
      echo "N";
    }

 ?>
