@extends('layouts.app')
@section('title', 'Agenda Kegiatan')
@section('interface')
        <!--Breadcrumb Banner Area Start-->
        <div class="breadcrumb-banner-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-text">
                            <h1 class="text-center">Classes</h1>
                            <div class="breadcrumb-bar">
                                <ul class="breadcrumb">
                                    <li><a href="index.html">Home</a></li>
                                    <li>Classes</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Breadcrumb Banner Area-->
        <!--Class List Area Start-->
        <div class="class-list-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="class-menu">
                            <div class="class-icon">
                                <a href="class-grid.html" class="active"><i class="fa fa-th-large"></i></a>
                            </div>
                            <div class="class-icon">
                                <a href="class-list.html"><i class="fa fa-bars"></i></a>
                            </div>  
                            <div class="search-container">
                                <form action="#" method="post">
                                    <input type="text" placeholder="Search our classes" />
                                    <button class="submit"><i class="fa fa-search"></i></button>
                                </form>                               
                            </div>  
                        </div>
                    </div>    
                </div>
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="class-list-item">
                            <div class="row">
                                <div class="col-xl-5 col-lg-6 col-md-6">
                                    <a href="#"><img src="img/gallery/9.jpg" alt=""></a>
                                </div>
                                <div class="col-xl-7 col-lg-6 col-md-6">
                                    <div class="class-list-text">
                                        <h3><a href="#">Letter Match Class</a></h3>
                                        <div class="class-information">
                                            <span>Age: 3 - 4 years</span>
                                            <span>Class Size: 38</span>
                                            <span>Start Date: March 25, 2016</span>
                                        </div>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen. </p>
                                        <a href="#" class="button-default">Read More <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="class-list-item">
                            <div class="row">
                                <div class="col-xl-5 col-lg-6 col-md-6">
                                    <a href="#"><img src="img/gallery/8.jpg" alt=""></a>
                                </div>
                                <div class="col-xl-7 col-lg-6 col-md-6">
                                    <div class="class-list-text">
                                        <h3><a href="#">Alphabet Matching Class</a></h3>
                                        <div class="class-information">
                                            <span>Age: 5 - 6 years</span>
                                            <span>Class Size: 25</span>
                                            <span>Start Date: April 10, 2016</span>
                                        </div>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using</p>
                                        <a href="#" class="button-default">Read More <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="class-list-item">
                            <div class="row">
                                <div class="col-xl-5 col-lg-6 col-md-6">
                                    <a href="#"><img src="img/gallery/11.jpg" alt=""></a>
                                </div>
                                <div class="col-xl-7 col-lg-6 col-md-6">
                                    <div class="class-list-text">
                                        <h3><a href="#">Cool Math Class</a></h3>
                                        <div class="class-information">
                                            <span>Age: 7 - 8 years</span>
                                            <span>Class Size: 30</span>
                                            <span>Start Date: February 18, 2016</span>
                                        </div>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of</p>
                                        <a href="#" class="button-default">Read More <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="class-list-item">
                            <div class="row">
                                <div class="col-xl-5 col-lg-6 col-md-6">
                                    <a href="#"><img src="img/gallery/13.jpg" alt=""></a>
                                </div>
                                <div class="col-xl-7 col-lg-6 col-md-6">
                                    <div class="class-list-text">
                                        <h3><a href="#">Color Matching Class</a></h3>
                                        <div class="class-information">
                                            <span>Age: 2 - 3 years</span>
                                            <span>Class Size: 40</span>
                                            <span>Start Date: May 18, 2016</span>
                                        </div>
                                        <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence.</p>
                                        <a href="#" class="button-default">Read More <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="class-list-item">
                            <div class="row">
                                <div class="col-xl-5 col-lg-6 col-md-6">
                                    <a href="#"><img src="img/gallery/10.jpg" alt=""></a>
                                </div>
                                <div class="col-xl-7 col-lg-6 col-md-6">
                                    <div class="class-list-text">
                                        <h3><a href="#">Science Class</a></h3>
                                        <div class="class-information">
                                            <span>Age: 3 - 4 years</span>
                                            <span>Class Size: 30</span>
                                            <span>Start Date: April 18, 2016</span>
                                        </div>
                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa.</p>
                                        <a href="#" class="button-default">Read More <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="pagination-content">
                            <div class="pagination-button">
                                <ul class="pagination">
                                    <li class="current"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                                </ul>
                                <span>Page:</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="single-widget-item res-mrg-top-xs">
                            <div class="single-title">
                                <h3>All Classes</h3>
                            </div>
                            <div class="single-widget-container">
                                <ul class="sidebar-categories class">
                                    <li><a href="#">Art Class</a></li>
                                    <li><a href="#">Sports Class</a></li>
                                    <li><a href="#">Math Class</a></li>
                                    <li><a href="#">Science Class</a></li>
                                    <li><a href="#">History Class</a></li>
                                    <li><a href="#">Paint Class</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-widget-item">
                            <div class="single-title">
                                <h3>Recent Classes</h3>
                            </div>
                            <div class="single-widget-container">
                                <div class="recent-post-item">
                                    <div class="recent-post-image">
                                        <a href="#"><img src="img/gallery/15.jpg" alt=""></a>
                                    </div>
                                    <div class="recent-post-text">
                                        <h4><a href="#">Alphabet Match Class</a></h4>
                                        <span><i class="fa fa-calendar"></i>March 25, 2016</span>
                                    </div>
                                </div>
                                <div class="recent-post-item">
                                    <div class="recent-post-image">
                                        <a href="#"><img src="img/gallery/16.jpg" alt=""></a>
                                    </div>
                                    <div class="recent-post-text">
                                        <h4><a href="#">Cool Math Class</a></h4>
                                        <span><i class="fa fa-calendar"></i>April 23, 2016</span>
                                    </div>
                                </div>
                                <div class="recent-post-item">
                                    <div class="recent-post-image">
                                        <a href="#"><img src="img/gallery/17.jpg" alt=""></a>
                                    </div>
                                    <div class="recent-post-text">
                                        <h4><a href="#">Color Match Class</a></h4>
                                        <span><i class="fa fa-calendar"></i>July 12, 2016</span>
                                    </div>
                                </div>
                                <div class="recent-post-item">
                                    <div class="recent-post-image">
                                        <a href="#"><img src="img/gallery/18.jpg" alt=""></a>
                                    </div>
                                    <div class="recent-post-text">
                                        <h4><a href="#">Letter Match Class</a></h4>
                                        <span><i class="fa fa-calendar"></i>June 29, 2016</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-widget-item hidden-sm">
                            <div class="single-widget-container">
                                <a href="#">
                                    <img src="img/banner/11.jpg" alt="">
                                    <span>Enroll Your Child</span>
                                </a>
                            </div>
                        </div>  
                        <div class="single-widget-item">
                            <div class="single-title">
                                <h3>Tags</h3>
                            </div>
                            <div class="single-widget-container">
                                <ul class="tag-list">                  
                                    <li><a href="#">Art Class</a></li>
                                    <li><a href="#">Class</a></li>
                                    <li><a href="#">Letter</a></li>
                                    <li><a href="#">Sport Class</a></li>
                                    <li><a href="#">Learn</a></li>
                                    <li><a href="#">Color</a></li>
                                    <li><a href="#">Language</a></li>
                                    <li><a href="#">Paint</a></li>
                                    <li><a href="#">Letter</a></li>
                                    <li><a href="#">Paint Class</a></li>
                                    <li><a href="#">Toys</a></li>
                                    <li><a href="#">Color</a></li>
                                </ul>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
        <!--End of Class List Area-->
     @endsection