@extends('layouts.customer_user') @section('content')
<section id="mainSection" style="background-image: url('{{ URL::asset('img/background.jpg') }}');">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div id="accordionThree" class="mb-5">
                <div class="card card-primary">
                    <div id="AnnouncementHead1" class="card-header">
                        <h5 class="mb-0"><a data-toggle="collapse" href="#AnnouncementBody1" aria-expanded="true"><strong>Announcement 1</strong></a></h5>
                    </div>
                    <div id="AnnouncementBody1" data-parent="#accordionThree" class="collapse show">
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi nihil repellat incidunt error labore mollitia, doloremque sint vero ut aliquid harum iusto officiis excepturi, libero est explicabo! Rem illum, porro.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid a voluptatibus blanditiis nisi vitae, consectetur veniam veritatis ea obcaecati magni atque vel non officia amet esse ad inventore, eum odit!</p>
                        </div>
                    </div>
                </div>
                <div class="card card-primary">
                    <div id="AnnouncementHead2" class="card-header">
                        <h5 class="mb-0"><a data-toggle="collapse" href="#AnnouncementBody2"><strong>Announcement 2</strong></a></h5>
                    </div>
                    <div id="AnnouncementBody2" data-parent="#accordionThree" class="collapse">
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi nihil repellat incidunt error labore mollitia, doloremque sint vero ut aliquid harum iusto officiis excepturi, libero est explicabo! Rem illum, porro.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid a voluptatibus blanditiis nisi vitae, consectetur veniam veritatis ea obcaecati magni atque vel non officia amet esse ad inventore, eum odit!</p>
                        </div>
                    </div>
                </div>
                <div class="card card-primary">
                    <div id="AnnouncementHead3" class="card-header">
                        <h5 class="mb-0"><a data-toggle="collapse" href="#AnnouncementBody3"><strong>Announcement 3</strong></a></h5>
                    </div>
                    <div id="AnnouncementBody3" data-parent="#accordionThree" class="collapse">
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi nihil repellat incidunt error labore mollitia, doloremque sint vero ut aliquid harum iusto officiis excepturi, libero est explicabo! Rem illum, porro.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid a voluptatibus blanditiis nisi vitae, consectetur veniam veritatis ea obcaecati magni atque vel non officia amet esse ad inventore, eum odit!</p>
                        </div>
                    </div>
                </div>
                <div class="card card-primary">
                    <div id="AnnouncementHead4" class="card-header">
                        <h5 class="mb-0"><a data-toggle="collapse" href="#AnnouncementBody4"><strong>Announcement 4</strong></a></h5>
                    </div>
                    <div id="AnnouncementBody4" data-parent="#accordionThree" class="collapse">
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi nihil repellat incidunt error labore mollitia, doloremque sint vero ut aliquid harum iusto officiis excepturi, libero est explicabo! Rem illum, porro.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid a voluptatibus blanditiis nisi vitae, consectetur veniam veritatis ea obcaecati magni atque vel non officia amet esse ad inventore, eum odit!</p>
                        </div>
                    </div>
                </div>
                <div class="card card-primary">
                    <div id="AnnouncementHead5" class="card-header">
                        <h5 class="mb-0"><a data-toggle="collapse" href="#AnnouncementBody5"><strong>Announcement 5</strong></a></h5>
                    </div>
                    <div id="AnnouncementBody5" data-parent="#accordionThree" class="collapse">
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi nihil repellat incidunt error labore mollitia, doloremque sint vero ut aliquid harum iusto officiis excepturi, libero est explicabo! Rem illum, porro.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid a voluptatibus blanditiis nisi vitae, consectetur veniam veritatis ea obcaecati magni atque vel non officia amet esse ad inventore, eum odit!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- col-->
    </div>
    <!-- row-->
</section>
<!--    main section-->
@stop