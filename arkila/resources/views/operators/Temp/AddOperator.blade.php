@extends('layouts.master')
@section('title', 'Add Operator')
@section('content-header', 'Add Operator')
@section('content')
    <form method="POST" action="/home/operators">
        {{ csrf_field() }}
 <section class="content">
     @include('message.error')
        <h3 class="box-title">Add Operator</h3>
          <div class="box box-primary">
            <div class="box-body">
                <h3>Personal Information</h3>
              <div class="row">
                <div class="col-md-4">
                  Last Name:<input type="text" class="form-control" name ="lastName" placeholder="Last Name">
                    Contact Number:<input type="text" name="firstName" class="form-control" placeholder="Contact Number">
                    Age:<input type="text" name="age" class="form-control" placeholder="Age">
                    
                   <div class="radio">
                       <div>Gender:</div>
                       <label><input type="radio" name="gender">Male</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="gender">Female</label>
                    </div>
            
                </div>
                <div class="col-md-4">
                  First Name:<input type="text" name="firstName" class="form-control" placeholder="First Name">
                    Address:<input type="text" name="address" class="form-control" placeholder="Address">
                    Birthdate:
                    <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" name="birthDate" class="form-control pull-right datepicker">
            </div>
                    Citizenship:<input name="citizenship" type="text" class="form-control" placeholder="Citizenship">
                </div>
                <div class="col-md-4">
                  Middle Name:<input name="middleName" type="text" class="form-control" placeholder="Middle Name">
                    Provincial Address:<input name="provincialAddress" type="text" class="form-control" placeholder="Provincial Address">
                    Birthplace:<input name="birthPlace" type="text" class="form-control" placeholder="Birthplace">
                    Civil Status:<input name="civilStatus" type="text" class="form-control" placeholder="Civil Status">
                </div>
                
                <div class="col-md-12">
                    SSS No:<input name="sss" ype="text" class="form-control" placeholder="SSS Number">
                     </div>
                  <div class="col-md-6">
                      Driver License: <input type="text" name="driverLicense" placeholder="Drivers License" class="form-control">
                      Driver License Expiry Date: <input type="text" name="driverLicenseExpiryDate" placeholder="Expiry Date" class="form-control">
                  </div>
                     
                
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        
        
        
        <div class="box box-primary">
          
            <div class="box-body">
                <h3>Family Information</h3>
              <div class="row">
                <div class="col-md-6">
                  Name of Spouse:<input name="spouse" type="text" class="form-control" placeholder="Name of Spouse">
                   Fathers Name:<input name="fathersName" type="text" class="form-control" placeholder="Fathers Name">
                    Mothers Name:<input name="mothersName" type="text" class="form-control" placeholder="Mothers Name">
            
                </div>
                <div class="col-md-6">
                  Birthdate of Spouse:
                   <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input name="spouseBirthDate" type="text" class="form-control pull-right datepicker">
            </div>
                    Occupation:<input name="fatherOccupation" type="text" class="form-control" placeholder="Occupation">
                    Occupation:<input name="motherOccupation" type="text" class="form-control" placeholder="Occupation">
                  
                </div>
              </div>
                <row>
                    <div class="col-md-4">
                     Person to Contact In Case of Emergency:<input name="personInCaseOfEmergency" type="text" class="form-control" placeholder="Peson In Case of Emergency">
                     </div>
                    <div class="col-md-4">
                        Address:<input name="emergencyAddress" type="text" class="form-control" placeholder="Address">
                    </div>
                    <div class="col-md-4">
                        Contact Number:<input name="emergencyContactNumber" type="text" class="form-control" placeholder="Contact Number">
                    </div>
                </row>
                <row>
          
                </row>
                
                
                
                
                <div class="row">
                <div class="col-md-12">
              <table class="table table-hover custab">
                   <thead>
                       <th>Childrens Name</th>
                       <th>Birthdate</th>
                   </thead>
                   <tbody id = "childrens">
                   <tr>
                       <td>
                           <input name="children[]" type="text" placeholder="Childrens Name" class = "form-control">
                       </td>
                       <td>
                           <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input name="childrenBDay[]" type="text" class="form-control pull-right datepicker">
            </div> 
                       </td>
                       <td><button style="display: none;" type="button" onclick="event.srcElement.parentElement.parentElement.remove();rmv()" class='btn btn-danger' >Delete</button>
                       </td>
                       
                   </tr>
                   </tbody>
                    </table>
                    
                    <button type="button" class="btn btn-info" onclick="addItem()">Add another Item</button>
                  </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <button type="submit" class="btn btn-info">Submit</button>

      </section>
</form>
@endsection
@section('scripts')
@parent
<script>

$(cloneDatePicker()
   );
    
    function cloneDatePicker() {
    
    //Date picker
    $('.datepicker').datepicker({
      autoclose: true
    })

  }
    
    
    
    function addItem(){
	var tablebody = document.getElementById('childrens');
	if(tablebody.rows.length == 1){
		tablebody.rows[0].cells[tablebody.rows[0].cells.length-1].children[0].style.display="";
	}


	var tablebody = document.getElementById('childrens');
	var iClone = tablebody.children[0].cloneNode(true);
	for(var i = 0; i< iClone.cells.length; i++){
		iClone.cells[i].children[0].value ="";
	}
        
	tablebody.appendChild(iClone);
        cloneDatePicker();
}

function rmv(){
	var tabRow = document.getElementById("childrens");
	if(tabRow.rows.length == 1){
		tabRow.rows[0].cells[tabRow.rows[0].cells.length-1].children[0].style.display="none";
	}
	else{
		tabRow.rows[0].cells[tabRow.rows[0].cells.length-1].children[0].style.display="";
	}
}

</script>
@endsection