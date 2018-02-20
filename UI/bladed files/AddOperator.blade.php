@extends('layouts.master')
@section('title', 'Add Operator')
@section('content-header', 'Add Operator')
@section('content')
 <section class="content">
        <h3 class="box-title">Add Operator</h3>
          <div class="box box-primary">
            <div class="box-body">
                <h3>Personal Information</h3>
              <div class="row">
                <div class="col-md-4">
                  Last Name:<input type="text" class="form-control" placeholder="Last Name">
                    Contact Number:<input type="text" class="form-control" placeholder="Contact Number">
                    Age:<input type="text" class="form-control" placeholder="Age">
                    
                   <div class="radio">
                       <div>Gender:</div>
                       <label><input type="radio" name="gender">Male</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="gender">Female</label>
                    </div>
            
                </div>
                <div class="col-md-4">
                  First Name:<input type="text" class="form-control" placeholder="First Name">
                    Address:<input type="text" class="form-control" placeholder="Address">
                    Birthdate:
                    <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right datepicker">
            </div>
                    Citizenship:<input type="text" class="form-control" placeholder="Citizenship">
                </div>
                <div class="col-md-4">
                  Middle Name:<input type="text" class="form-control" placeholder="Middle Name">
                    Provincial Address:<input type="text" class="form-control" placeholder="Provincial Address">
                    Birthplace:<input type="text" class="form-control" placeholder="Birthplace">
                    Civil Status:<input type="text" class="form-control" placeholder="Civil Status">
                </div>
                
                <div class="col-md-12">
                    SSS No:<input type="text" class="form-control" placeholder="SSS Number">
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
                  Name of Spouse:<input type="text" class="form-control" placeholder="Name of Spouse">
                   Fathers Name:<input type="text" class="form-control" placeholder="Fathers Name">
                    Mothers Name:<input type="text" class="form-control" placeholder="Mothers Name">
            
                </div>
                <div class="col-md-6">
                  Birthdate of Spouse:
                   <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right datepicker">
            </div>
                    Occupation:<input type="text" class="form-control" placeholder="Occupation">
                    Occupation:<input type="text" class="form-control" placeholder="Occupation">
                  
                </div>
              </div>
                <row>
                    <div class="col-md-4">
                     Person to Contact In Case of Emergency:<input type="text" class="form-control" placeholder="Peson In Case of Emergency">
                     </div>
                    <div class="col-md-4">
                        Address:<input type="text" class="form-control" placeholder="Address">  
                    </div>
                    <div class="col-md-4">
                        Contact Number:<input type="text" class="form-control" placeholder="Contact Number">
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
                           <input type="text" placeholder="Childrens Name" class = "form-control">   
                       </td>
                       <td>
                           <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right datepicker">
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
          <button type="submit" class="btn btn-info" name="requestNoPO">Submit</button>

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