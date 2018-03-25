    <!-- Navbar Start-->
    <header class="nav-holder make-sticky">
        <div id="navbar" class="navbar navbar-expand-lg">
            <div class="container">
                <a href="index.html" class="navbar-brand home">
               <img src="{{ URL::asset('img/bantranslogo.png') }}" alt="Ban Trans logo" class="d-none d-md-inline-block" style="width:230px;">
               <img src="{{ URL::asset('img/bantranslogo.png') }}" alt="Ban Trans logo" class="d-inline-block d-md-none" style="width:100px;">
               <span class="sr-only">Ban Trans</span></a>
                <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggler btn-template-outlined">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>

                <div id="navigation" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a href="customerHomeNoLogin.html">Home</a>
                        </li>
                        <li class="nav-item dropdown menu-large">
                            <a href="customerAbout.html">About</a>
                        </li>
                        <li class="nav-item dropdown menu-large">
                            <a href="customerHelp.html">Sign In</a>
                        </li>
                        <li class="nav-item dropdown menu-large">
                            <a href="#">Sign Out</a>
                        </li>
                    </ul>
                </div>
                <div id="search" class="collapse clearfix">
                    <form role="search" class="navbar-form">
                        <div class="input-group">
                            <input type="text" placeholder="Search" class="form-control"><span class="input-group-btn">
                    <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <!-- Navbar End-->
