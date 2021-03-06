<?PHP
require_once("source/include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("source/login.php");
    exit;
}
$email = $_SESSION[$fgmembersite->GetLoginSessionVar()];
?>
<script type="text/javascript">
    var getEmail = "<?php echo $email; ?>";
</script>

<!--add more data:This is the page that the user will arrive on when they want to add more information to thier previously collected data
for the first time. Date 2 records this day and date 3 automatically calculates 20 days after this date (when heat check should)
taka place. Line, New Pen , and Comments can always be modified 
-->
<!DOCTYPE html>
<html>
<head> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="getRow1.js"></script>
    <script src="js/updateDB__1.8.js"></script>
    <script src="js/getDate3.1.js"></script>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js">
    </script>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js">
    </script>
    <!--animate css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    
	<title>Add More Data</title>
    <style>
        .space button{margin-right:15px;}
        .space button:last-child{margin-right:0px;}
         #lineModal, #boar2Modal, #commentsModal, #newPenModal {
          width: 50%;
          left: 25%;
          right: 5%;
        }
        th {  
            height: 50px;}
     
        #outer{
            width:100%;
            text-align: center;
        }
        .inner{
            display: inline-flex;
        }
              
        .makePink{
           color:#d81b60;
        }
        /*making what i want from the datepicker to be pink*/
         .picker__date-display, .picker__weekday-display, .picker__day--selected, .picker__day--selected:hover, .picker--focused .picker__day--selected{
            background-color:#d81b60;
        }
         /*making what I want from the date picker to be brown*/
        .picker__close, .picker__today, .picker__day.picker__day--today{
            color: #795548;
        }
        /* making the dropdown menu brown */
        .dropdown-content li>a, .dropdown-content li>span{
             color: #795548;
        }
        /*changing the input text fields color to the brown */
          .input-field input[type=text]:focus + label, textarea:focus + label {
            color: #795548 !important;
        }
          .input-field input[type=text]:focus, textarea:focus {
            border-bottom: 1px solid #795548 !important;
             box-shadow: 0 1px 0 0 #795548 !important;
        }
         /*changing the color when the user enters something to the pink */
        .input-field input[type=text].valid, textarea.materialize-textarea.valid{
            border-bottom: 1px solid #d81b60;
            box-shadow: 0 1px 0 0 #d81b60;
        }
    </style>
</head>   

<body> 
  <nav>

    <div class="nav-wrapper white">
      <a href="#" class="brand-logo center pink-text">Add More Data</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons makePink text">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">

        <li><a class="makePink text" href="homeapp.php">Home</a></li>
        <li><a class="makePink text" href="pigTable.php">View Data</a></li>
		<li><a class="makePink text" href="editData.php">Edit Data</a></li>
      </ul>
     <ul class="side-nav" id="mobile-demo">
       <li><a href="homeapp.php">Home</a></li>
        <li><a href="pigTable.php">View Data</a></li>
		<li><a href="editData.php">Edit Data</a></li>
      </ul>
    </div>
  </nav>
    <div class = "container" id="rowData" style="padding-top:30px;"><p>Selected row from edit data shows here.</p></div>
    <h5 class="animated bounceInDown header col xl12 light" style="padding-bottom: 40px; padding-top: 50px; text-align:center">Fill in the text field you would like to modify.</h5>
    <div class="container center" style= "padding-left: 300px; padding-right: 300px;">

		<div class="row">
		<form class="col s12">
			<div class="input-field col s12">
			  <input id="Pen" type="text" class="validate" style="padding-left: 40px; margin-bottom:30px;">
			  <label for="Pen">Pen</label>
			</div>
			<div class="input-field col s12">
			  <input id="Notch" type="text" class="validate" style="padding-left: 40px; margin-bottom:30px;">
			  <label for="Notch">Notch</label>
			</div>
			<div class="input-field col s12">
			  <input id="tag" type="text" class="validate" style="padding-left: 40px; margin-bottom:30px;">
			  <label for="tag">Tag</label>
			</div>
		  <div class="input-field col s12">
			<select id ="breedMenu">
			  <option value="" disabled selected>Choose your option</option>
			  <option value="1">Yorkshire</option>
			  <option value="2">Crossbreed</option>
			  <option value="3">Berkshire</option>
			  <option value="4">Chester White and Landrace</option>
			  <option value="5">Spotted Hereford Tamworth</option>
			  <option value="6">Duroc</option>
			  <option value="7">Hampshire</option>
			</select>
			<label>Breed</label>
		  </div>
			<div class="input-field col s12">
			  <input id="date1" type="text" class="validate datepicker" style="padding-left: 40px; margin-bottom:30px;">
			  <label for="date1">Date 1</label>
			</div>
			<div class="input-field col s12">
			  <input id="boar1" type="text" class="validate" style="padding-left: 40px; margin-bottom:30px;">
			  <label for="boar1">Boar 1</label>
			</div>
			<div class="input-field col s12">
			  <input id="date2" type="text" class="validate datepicker" style="padding-left: 40px; margin-bottom:30px;">
			  <label for="date2">Date 2</label>
			</div>
			<div class="input-field col s12">
			  <input id="boar2" type="text" class="validate" style="padding-left: 40px; margin-bottom:30px;">
			  <label for="boar2">Boar 2</label>
			</div>
			<div class="input-field col s12">
			  <input id="heat" type="text" class="validate" style="padding-left: 40px; margin-bottom:30px;">
			  <label for="heat">Heat</label>
			</div>
			<div class="input-field col s12">
			  <input id="date3" type="text" class="validate datepicker" style="padding-left: 40px; margin-bottom:30px;">
			  <label for="date3">Date 3</label>
			</div>
            <script>next_date();</script>
			<div class="input-field col s12">
			  <input id="line" type="text" class="validate" style="padding-left: 40px; margin-bottom:30px;">
			  <label for="line">Line</label>
			</div>
			<div class="input-field col s12">
			  <input id="newpen" type="text" class="validate" style="padding-left: 40px;margin-bottom:30px;">
			  <label for="newpen">New Pen</label>
			</div>
			<div class="input-field col s12">
			  <textarea id="comment" type="text" class="materialize-textarea validate" style="padding-left: 40px;"></textarea>
			  <label for="comment">Comments</label>
			</div>
			</div>
		</form>
		</div>
    </div>

       
<div id="outer" class= "container">
    <div class="container" style="padding-top: 40px ">
    
    <table class="bordered centered responsive-table container" style="padding-top: 100px; table-layout:fixed">
            <tr id="myRow" >
            </tr>   
        </table>
    </div>
 </div>
    
    <!--upon pressing the submit button, the data that was just entered and each
        cell of the row that was selected must be gathered--> 
    <div id= "outer" class="container center" style="padding-top: 40px; padding-bottom:35px;">
    <button data-target="submitModal2" class="btn waves-effect waves-light modal-trigger brown" id="add" >Submit Data</button> 
        </div>
   
    
    
  
	<!--Footer-->
        <footer class="page-footer pink darken-1">
           <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Summary</h5>
                <p class="grey-text text-lighten-4">You can use this page to modify exisiting data--more precisely to finish your data collection. This page is only accesible from the Edit Data page.</p>
              </div>
            </div>
          </div>
          <div class="footer-copyright pink darken-1 ">
            <div class="container">
            Animal Farm 2017
            <a class="grey-text text-lighten-4 right" href="index.html">California State University, Fresno</a>
            </div>
          </div>
        </footer>
    
        
<script>
	// dropdown menu for breed
  $(document).ready(function() {
    $('select').material_select();
  });
  //for the datepicker to work
      $('.datepicker').pickadate({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 15, // Creates a dropdown of 15 years to control year,
      today: 'Today',
      clear: 'Clear',
      close: 'Ok',
      closeOnSelect: false, // Close upon selecting a date,
      format: "mm/dd/yyyy"
    });
</script>
    
  <!-- Modal Structure for the submit button, will show sucess message and allow user to edit another entry or go back to home -->
  <div id="submitModal2" class="modal">
    <div class="modal-content">
      <h4 id ="result">Submission was successful!<i class="small material-icons green-text">done_all</i></h4>
      <p>Choose if you would like to edit another entry or go back to home.</p>
    </div>
    <div class="modal-footer">
      <a href="editData.php" class="modal-action modal-close waves-effect waves-green btn-flat">Edit Another</a>
      <a href="homeapp.php" class="modal-action modal-close waves-effect waves-green btn-flat">Home</a>
    </div>
  </div>
  
	<!--In order for the page to be mobile friendly I need this JQuery-->
<script>
    $(document).ready(
        function() {
            $(".button-collapse").sideNav();
        });
</script>
    
<!--for the modals to work i need this JQuery-->
<script>
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
</script>

</body>    
</html>
