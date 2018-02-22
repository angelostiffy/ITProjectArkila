@extends('layouts.master')
@section('title', 'Add Driver')
@section('content-header', 'Add Driver')
@section('content')
<section class="content">
  <h3 class="box-title">Add Driver</h3>
  
  <div class="box box-primary">
    
    <div class="box-body">
      <h3>Personal Information</h3>
        <form method="post" action="{{ route('drivers.index')}}">
                  {{ csrf_field() }}

            <label>Operator</label>
                  <select name="operator">
                      <option>Select Category</option>
                      @foreach($operators as $operator)
                      <option value="{{ $operator->operator_id }}">{{ $operator->first_name . " " . $operator->last_name }}</option>
                      @endforeach
                 </select>
            
                <div class="row">
                  <div class="col-md-4">
                    Last Name:<input type="name" class="form-control" name="last" placeholder="Last Name" value="{{ old('last') }}">
                    Member ID: <input type="name" class="form-control" name="member" placeholder="Member ID" value="{{ old('member') }}">
                    Contact Number:<input type="number" class="form-control" name="contactn" placeholder="Contact Number" value="{{ old('contactn') }}">

                    Gender:
                    <div>
                      <input type="radio" name="gender" value="Male">Male<br>
                      <input type="radio" name="gender" value="Female">Female
                    </div>
                  </div>

                  <div class="col-md-4">
                    First Name: <input type="name" class="form-control" name="first" placeholder="First Name" value="{{ old('first') }}">
                    Address:<input type="text" class="form-control" name="address" placeholder="Address" value="{{ old('address') }}">

                      
                      Birthdate:
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right datepicker" name="birthdate"  value="{{ old('birthdate') }}">
                      </div>
                      Citizenship:<input type="text" class="form-control" name="citizenship" placeholder="Enter Driver's Citizenship" value="{{ old('citizenship') }}">
                  </div>
                  <div class="col-md-4">
                    Middle Name:<input type="name" class="form-control" name="middle" placeholder="Enter Driver's Middle Name" value="{{ old('middle') }}">
                      Provincial Address:<input type="text" class="form-control" name="paddress" placeholder="Enter Driver's Provincial Address" value="{{ old('paddress') }}">
                      Birthplace:<input type="text" class="form-control" name="bplace" placeholder="Enter Driver's Birth Place" value="{{ old('bplace') }}">


                      Civil Status:
                      <div>
                      <input type="radio" name="cstatus" value="Single">Single
                      <input type="radio" name="cstatus" value="Married">Married
                    </div>
                    <div>
                      <input type="radio" name="cstatus" value="Divorced">Divorced
                      <input type="radio" name="cstatus" value="Divorced">Divorced
                    </div>
                  
                  
                      
                  
                </div>
                <row>
                    <div class="col-md-4">
                      SSS No:<input type="text" class="form-control" name="sss" placeholder="Enter Driver's SSS Number" value="{{ old('sss') }}">
                      </div>
                      <div class="col-md-4">
                      License No:<input type="text" class="form-control" name="licenseNum" placeholder="Enter Driver's License Number" value="{{ old('licenseNum') }}">
                      </div>
                      <div class="col-md-4">
                      Expiry Date:
                      <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right datepicker" name="exp" value="{{ old('exp') }}">
              </div>
                      </div>
                </row>
              </div>
              <!-- /.box-body -->
            </div>
          
          
          
          <div class="box box-primary">
            
              <div class="box-body">
                  <h3>Family Information</h3>
                <div class="row">
                  <div class="col-md-6">
                    Name of Spouse:<input type="name" class="form-control" name="spouse" placeholder="Enter Driver's Spouse Name" value="{{ old('spouse') }}">
                    Fathers Name:<input type="name" class="form-control" name="father" placeholder="Enter Driver's Father Name" value="{{ old('father') }}">
                      Mothers Name:<input type="name" class="form-control" name="mother" placeholder="Enter Driver's Mother Name" value="{{ old('mother') }}">
              
                  </div>
                  <div class="col-md-6">
                    Birthdate of Spouse:
                      <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right datepicker" name="spousebday" value="{{ old('spousebday') }}">
              </div>
                      Occupation:<input type="text" class="form-control" name="fatheroccup" placeholder="Enter Driver's Father Occupation" value="{{ old('fatheroccup') }}">
                      Occupation:<input type="text" class="form-control" name="motheroccup" placeholder="Enter Driver's Mother Occupation" value="{{ old('motheroccup') }}">
                    
                  </div>
                </div>
                  <row>
                      <div class="col-md-4">
                      Person to Contact In Case of Emergency:<input type="name" class="form-control" name="personemergency" placeholder="Enter Driver's Contact in Case of Emergency" value="{{ old('personemergency') }}">
                      </div>
                      <div class="col-md-4">
                          Address:<input type="text" class="form-control" name="peAddress" placeholder="Enter Driver's Contact in Case of Emergency Address" value="{{ old('peAddress') }}">
                      </div>
                      <div class="col-md-4">
                          Contact Number:<input type="number" class="form-control" name="peContactnum" placeholder="Enter Driver's Contact in Case of Emergency Contact Number" value="{{ old('peContactnum') }}">
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
                            <input type="text" placeholder="Childrens Name" name="child[]" class = "form-control">   
                        </td>
                        <td>
                              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right datepicker" name="childBirthdate[]" >
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
              <button type="submit" class="btn btn-primary">Submit</button>
              </form>            
            </div>
            <!-- /.box-body -->
          </div>
        </section>
        
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