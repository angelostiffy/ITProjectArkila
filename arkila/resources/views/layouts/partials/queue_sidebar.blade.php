<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li class="active"><a href="#control-sidebar-queue-tab" data-toggle="tab"><i class="fa fa-list-ol"></i></a></li>
        <li><a href="#control-sidebar-remarked-tab" data-toggle="tab"><i class="fa fa-thumb-tack text-red"></i></a></li>
        <li><a href="#control-sidebar-remarked-tab" data-toggle="tab"><i class="fa fa-thumb-tack text-red"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-queue-tab">
        <h3 class="">Add Unit to Queue</h3>
        <div class="form-group">
          <label for="">Van Unit</label>
          <select class="form-control">
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
           </select>
        </div>
        <div class="form-group">  
          <label for="">Destination</label>
          <select name="" class="form-control">
            <option value=""></option>
            <option value=""></option>
            <option value=""></option>
          </select>
        </div>
        <div class="form-group">  
        <label for="">Driver</label>
        <select class="form-control">
              <option value=""></option>
              <option value=""></option>
              <option value=""></option>
        </select>
        </div>
        <div class="pull-right">
            <button  data-toggle="tooltip" class="btn btn-primary btn-sm" title="Please add vans, destinations, or drivers before adding a van to the queue" disabled><i class="fa fa-plus"></i> ADD </button>
        </div>
      </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-remarked-tab">
        <h3 class="">Sell Ticket</h3>
        <div class="form-group">
          <label for="">Terminal</label>
            <select name="terminal" id="terminal" class="form-control">
              <option value="">AA</option>
            </select>
        </div>
        <div class="form-group">
          <label for="">Destination</label>
            <select name="destination" id="destination" class="form-control">
              <option>BB</option>
            </select>
        </div>
        <div class="form-group">
          <label for="">Discount</label>
          <div class="input-group">
            <span class="input-group-addon">
              <input id="checkDiscount" type="checkbox">
            </span>
            <select name="discount" id="discount" class="form-control">
              <option value="">CCC</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="">Ticket</label>
          <select name="tickets" id="ticket" class="form-control select2" multiple="multiple" data-placeholder="Select Ticket">
            <option value="">aa</option>
          </select>
        </div>
          <div class="pull-right">
            <button class="btn btn-primary">AAA</button>
          </div>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside>
<div class="control-sidebar-bg"></div>