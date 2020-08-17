  function LoadEmployee() {
    $("#content").load("modul/employee/data/show_data.php");
  }

  function AddEmployee(EmpStatus) {
    BootstrapDialog.show({
		type: BootstrapDialog.TYPE_SUCCESS,
		//size: BootstrapDialog.SIZE_WIDE,
		title: '<i class="glyphicon glyphicon-plus"></i> Add employee',
		message: $('<div></div>').load('modul/employee/data/from_add_data.php'),
		buttons: [{
			label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
			// no title as it is optional
			cssClass: 'btn-success',
			action: function(dialogItself){
				AddEmployeePro(EmpStatus);
				dialogItself.close();
			}
		}, {
			label: 'Cancel',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
  }

  function AddEmployeePro(EmpStatus) {
    var add_emp_name = $("#add_emp_name").val();
    var add_emp_address = $("#add_emp_address").val();
    var add_emp_department = $("#add_emp_department").val();

    var data = "add_emp_name=" + add_emp_name + "&add_emp_address=" + add_emp_address + "&add_emp_department=" + add_emp_department + "&EmpStatus=" + EmpStatus;
    //alert(data)
    if (add_emp_name != '' && add_emp_address != '' && add_emp_department != '') {
    $.ajax({
					type: "POST",
					url: "modul/employee/process/chk_data_pro.php",
					cache: false,
					data: data,
					success: function(msg){
						alert(msg)
						if (msg == "Y") {
							swal("Record results", "Save successfully.", "success");
							LoadEmployee();
						}else {
              swal("Record results", "Unsuccessful recording !", "error");
            }
						},
					error: function(){
					//
						},
					complete: function(){
					//
						}
				});
      }else {
        swal("Record results", "Please check the information.", "warning");
      }
  }

  function EditEmployee(EmpId, EmpStatus) {
    //alert(EmpId)
    BootstrapDialog.show({
		type: BootstrapDialog.TYPE_WARNING,
		//size: BootstrapDialog.SIZE_WIDE,
		title: '<i class="glyphicon glyphicon-cog"></i> Edit employee',
		message: $('<div></div>').load('modul/employee/data/from_edit_data.php',{EmpId:EmpId}),
		buttons: [{
			label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
			// no title as it is optional
			cssClass: 'btn-warning',
			action: function(dialogItself){
				EdieEmployeePro(EmpId, EmpStatus);
				dialogItself.close();
			}
		}, {
			label: 'Cancel',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
  }

  function EdieEmployeePro(EmpId, EmpStatus) {
    var edit_emp_name = $("#edit_emp_name").val();
    var edit_emp_address = $("#edit_emp_address").val();
    var edit_emp_department = $("#edit_emp_department").val();

    var data = "edit_emp_name=" + edit_emp_name + "&edit_emp_address=" + edit_emp_address + "&edit_emp_department=" + edit_emp_department + "&EmpId=" + EmpId + "&EmpStatus=" + EmpStatus;
    //alert(data)
    if (edit_emp_name != '' && edit_emp_address != '' && edit_emp_department != '') {
    $.ajax({
					type: "POST",
					url: "modul/employee/process/chk_data_pro.php",
					cache: false,
					data: data,
					success: function(msg){
						//alert(msg)
						if (msg == "Y") {
							swal("Record results", "Save successfully.", "success");
							LoadEmployee();
						}else {
              swal("Record results", "Unsuccessful recording !", "error");
            }
						},
					error: function(){
					//
						},
					complete: function(){
					//
						}
				});
      }else {
        swal("Record results", "Please check the information.", "warning");
      }
  }

  function DelEmployee(EmpId, EmpName, EmpStatus) {
    //alert(EmpId+' | '+EmpName)
    BootstrapDialog.show({
			type: BootstrapDialog.TYPE_DANGER,
			title: '<i class="fa fa-trash-o"></i> Delete employee',
			message: "Confirm delete employee : " + EmpName + " Yes/No ? ",
			buttons: [{
				label: 'Yes',
				// no title as it is optional
				cssClass: 'btn-danger',
				action: function(dialogItself){
					var data = "EmpId=" + EmpId + "&EmpStatus=" + EmpStatus;
					$.ajax({
						  url: "modul/employee/process/chk_data_pro.php",
							dataType: "html",
							type: 'POST', //I want a type as POST
							data: data,
							success: function(msg){
								//alert(msg);
								if(msg=="Y"){
									dialogItself.close();
                  swal("Record results", "Delete successfully.", "success");
									LoadEmployee();
								}else{
									dialogItself.close();
                  swal("Record results", "Failed to delete !", "error");
								}
							},
							error: function() {

							}
						});
				}
			}, {
				label: 'No',
				action: function(dialogItself){
					dialogItself.close();
				}
			}],
			draggable: true,
			closable:false
		});
  }
