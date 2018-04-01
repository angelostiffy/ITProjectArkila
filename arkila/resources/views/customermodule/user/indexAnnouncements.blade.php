<div class="container">
            <div class="heading text-center" style="color:white;">
                <h2><i class="fa fa-bullhorn"></i> Announcements</h2>
            </div>
            <!-- Carousel Start-->
            <ul class="owl-carousel testimonials list-unstyled equal-height">
                @foreach($announcements as $announcement)
                <li class="item">
                    <div class="testimonial d-flex flex-wrap" >
                        <div class="text" >
                            <h3>{{$announcement->title}}</h3>
                            <p id="announcementsLimit">{{$announcement->description}}</p>
                            <button class="btn btn-template-outlined" 
                                data-toggle="modal" 
                                data-target="#announcementDetails{{$announcement->announcement_id}}"
                                data-title="{{$announcement->title}}"
                                data-body="{{$announcement->description}}"
                                id="seeMore{{$announcement->announcement_id}}">Continue Reading</button>
                        </div>
                        <div class="bottom d-flex align-items-center justify-content-between align-self-end">
                            <div class="icon"><i class="fa fa-calendar"></i> </div>
                            <div class="testimonial-info d-flex">

                                <h5>February 7, 1998</h5>
                            </div>
                            <!-- estimonial-info-->
                        </div>
                        <!-- bottom-->
                    </div>
                    <!-- testimonial-->
                </li>
                @endforeach
            </ul>
            <!-- Carousel End-->
        </div>
        <!-- container-->
@foreach($announcements as $announcement)        
<div class="modal fade" id="announcementDetails{{$announcement->announcement_id}}">
    <div class="modal-dialog">
        <div class="row">
           <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="modal-content">
                    <div class="modal-header">
                       <h3 id="title{{$announcement->announcement_id}}"></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center" id="body{{$announcement->announcement_id}}"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-group-justified" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach
<!-- /.modal -->

@foreach($announcements as $announcement)
<script>
    $(document).ready(function(){
        $('#seeMore{{$announcement->announcement_id}}').click(function(){
            $('#title{{$announcement->announcement_id}}').html($(this).data('title'));
            $('#body{{$announcement->announcement_id}}').html($(this).data('body'));
        });
    });
</script>
@endforeach