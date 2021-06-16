<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
    <base href="">
    @include('includes.head')
</head>
<body id="kt_body" style="background: url({{url('/images/bg-10.jpg')}}) no-repeat" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
<div id="app">
    <div class="container">
        <!--begin::Header Mobile-->
        <div id="kt_header_mobile" class="header-mobile">
            @include('includes.header-mobile')
        </div>
        <!--end::Header Mobile-->

        <!--end::Header Mobile-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="d-flex flex-row flex-column-fluid page">
                <!--begin::Wrapper-->
                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                    <!--begin::Header-->
                    <div id="kt_header" class="header">
                        <!--begin::Container-->
                        @include('includes.header')
                        <!--end::Container-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Content-->
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        {!! Breadcrumbs::render() !!}
                        @yield('content')
                    </div>
                    <!--end::Content-->
                </div>
            </div>
        </div>
    </div>
    <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
        @include('includes.footer')
    </div>
</div>
</body>
</html>