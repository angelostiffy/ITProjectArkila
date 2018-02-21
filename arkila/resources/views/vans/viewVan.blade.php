@extends('vans.master')
@section('table')
    <section class="content-header">
                
                 <div class="box ">
                 <div class="box box-header">
                     <h3 style="margin-right: 10px; display: inline-block;"><strong>Edit Van Information</strong></h3><button class="btn btn-info" onclick="grayer('f_1',false);" style="float: right; margin-top: 2%;"><i class="fa fa-pencil-square-o"></i> Edit</button>
                 </div>
                <form id="f_1" action="#" onsubmit="return false;" class="form-horizontal">
                 <div class="box-body">
                     
                    <div class="col-md-6">
                        <div  class="form-group">
                            <label for="driverId" class="control-label col-sm-4">Driver ID</label>
                            <div class="col-sm-8">
                            <input type="text" id="driverId" name="driverId" class="form-control">
                            </div>
                        </div>
                        <div  class="form-group">
                            <label for="operatorId" class="control-label col-sm-4">Operator ID</label>
                            <div class="col-sm-8">
                            <input type="text" id="operatorId" name="operatorId" class="form-control">
                            </div>
                        </div>
                        
                      </div>
                      
                      
                      <div class="col-md-6">
                        <div  class="form-group">
                            <label for="genderD" class="control-label col-sm-4">Gender</label>
                            <div class="col-sm-8">
                            <input type="text" id="genderD" name="genderD" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="citizenshipD" class="control-label col-sm-4">Citizenship</label>
                            <div class="col-sm-8">
                            <input type="text" id="citizenshipD" name="citizenshipD" class="form-control">
                            </div>
                        </div>
                      </div>
                      </div>
                      </form>
                    <div class="box-footer">
                <button class="btn btn-primary pull-right" onclick="grayer('f_1',true);">Save changes</button>
                    </div>
                        </div>
                    </div>
                     
        </div>
        </div>
    </section>
    

<script type="text/javascript">
function grayer(formId, yesNo) {
   var f = document.getElementById(formId), s, opacity;
   s = f.style;
   s.opacity = s.MozOpacity = s.KhtmlOpacity = opacity/100;
   s.filter = 'alpha(opacity='+opacity+')';
   for(var i=0; i<f.length; i++) f[i].disabled = yesNo;
}
window.onload=function(){grayer('f_1',true);}; // disabled by default
</script>
<style type="text/css">
form {  height: 1%; /* hack IE */
         padding: 10px;
      }
</style>
@endsection