<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<script src="jquery-2.1.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap335.min.css">
<script src="bootstrap335.min.js"></script>
<script src="run_perttify.min.js"></script>

<link rel="stylesheet" type="text/css" href="dist/css/bootstrap-dialog.min.css">
<script src="dist/js/bootstrap-dialog.min.js"></script>

<script>
	$( document ).ready(function() {
    	//console.log( "ready!" );
	});
	function dgl1(){
		//alert("test");
		BootstrapDialog.alert('I want banana!');	
	}
	function dgl2(){
		BootstrapDialog.show({
            message: 'Hi Apple!'
        });	
	}
	function dgl3(){
		BootstrapDialog.show({
            title: 'Say-hello dialog',
            message: 'Hi Apple!'
        });	
	}
	function dgl4(){
		BootstrapDialog.show({
            title: 'Default Title',
            message: 'Click buttons below.',
            buttons: [{
                label: 'Title 1',
                action: function(dialog) {
                    dialog.setTitle('Title 1');
                }
            }, {
                label: 'Title 2',
                action: function(dialog) {
                    dialog.setTitle('Title 2');
                }
            }]
        });
	}
	function dgl5(){
		BootstrapDialog.show({
            title: 'Default Title',
            message: 'Click buttons below.',
            buttons: [{
                label: 'Message 1',
                action: function(dialog) {
                    dialog.setMessage('Message 1');
                }
            }, {
                label: 'Message 2',
                action: function(dialog) {
                    dialog.setMessage('Message 2');
                }
            }]
        });
	}
	function dgl6(){
		BootstrapDialog.show({
            message: $('<div></div>').load('remote.php')
        });	
	}
	function dgl7(){
		BootstrapDialog.show({
            message: function(dialog) {
                var $message = $('<div></div>');
                var pageToLoad = dialog.getData('pageToLoad');
                $message.load(pageToLoad);
        
                return $message;
            },
            data: {
                'pageToLoad': 'remote.php'
            }
        });	
	}
	
	function dgl8(){
		BootstrapDialog.confirm({
            title: 'WARNING',
            message: 'Warning! Drop your banana?',
            type: BootstrapDialog.TYPE_WARNING, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
            closable: true, // <-- Default value is false
            draggable: true, // <-- Default value is false
            btnCancelLabel: 'Do not drop it!', // <-- Default value is 'Cancel',
            btnOKLabel: 'Drop it!', // <-- Default value is 'OK',
            btnOKClass: 'btn-warning', // <-- If you didn't specify it, dialog type will be used,
            callback: function(result) {
                // result will be true if button was click, while it will be false if users close the dialog directly.
                if(result) {
                    alert('Yup.');
                }else {
                    alert('Nope.');
                }
            }
        });
	}
	
</script>
</head>

<body>
<button id="testbdl1" onClick="javascript:dgl1();">dgl1 alert</button>
<button id="testbdl2" onClick="javascript:dgl2();">dgl2 Simplest</button>
<button id="testbdl3" onClick="javascript:dgl3();">dgl3 Dialog Title</button>
<button id="testbdl4" onClick="javascript:dgl4();">dgl4 Manipulating Dialog Title</button>
<button id="testbdl5" onClick="javascript:dgl5();">dgl5 Manipulating Dialog Message</button>
<button id="testbdl6" onClick="javascript:dgl6();">dgl6 Loading remote page (1)</button>
<button id="testbdl7" onClick="javascript:dgl7();">dgl7 Loading remote page (2)</button>
<button id="testbdl8" onClick="javascript:dgl8();">dgl8 ALL</button>
</body>
</html>