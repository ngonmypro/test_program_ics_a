<?php include "../../../connect/connect_mysql.php";

  $sql_edit = "SELECT * FROM employee WHERE EmployeeId = '".$_POST['EmpId']."'";
    $result_edit = $db->query($sql_edit);
    while( $row_edit = $result_edit->fetch_array(MYSQLI_BOTH) ){
 ?>
<div data-parsley-validate class="form-horizontal form-label-left">

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">NAME</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="edit_emp_name" placeholder="Please enter the name" maxlength="200" value="<?php echo $row_edit['EmployeeName']; ?>"/>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <textarea rows="3"  class="form-control" id="edit_emp_address" placeholder="Please enter the address" value=""><?php echo $row_edit['EmployeeAddress']; ?></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Department</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='text' class="form-control" id="edit_emp_department" placeholder="Please enter the department" maxlength="100" value="<?php echo $row_edit['EmployeeDepartment']; ?>"/>
          </div>
        </div>

</div>
<?php } ?>
