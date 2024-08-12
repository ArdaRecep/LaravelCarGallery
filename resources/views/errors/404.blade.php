@extends("layouts.master")
@section("title","Page Not Found")
@section("content")
<section class="banner-header section-padding bg-img" data-overlay-dark="6" data-background="/a/crash2.jpg">
    <div class="v-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Page not found</h1>
                    <h6>404 Page</h6>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- divider line -->
<div class="line-vr-section"></div>
<!-- Not found 404 -->
<section class="not-found section-padding" style="padding: 60px 0 0 0!important;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 text-center">
                <h1 style="color:#f5b754">404</h1>
                <h3>Sorry, We Can't Find That Page!</h3>
                <p>The page you are looking for was moved, removed, renamed or never existed.</p>
                <div class="search-form">
                    <div class="social-icons">
                        <ul class="list-inline">
                            <a href="{{route("front.index")}}">
                                <li class="rounded-pill" style="width:150px">Cars</li>
                            </a>
                            <a href="{{route("front.brand.index")}}">
                                <li class="rounded-pill" style="width:150px">Brands</li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- divider line -->
<div style="margin-top: 50px;" class="line-vr-section"></div>
@endsection
