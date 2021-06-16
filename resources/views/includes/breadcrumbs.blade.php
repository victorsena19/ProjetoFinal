<div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Heading-->
            <div class="d-flex flex-column">
                <!--begin::Breadcrumb-->
                <div class="d-flex align-items-center font-weight-bold my-2">
                    @unless ($breadcrumbs->isEmpty())
                        <a href="{{url('/')}}" class="opacity-75 hover-opacity-100">
                            <i class="flaticon2-shelter text-white icon-1x"></i>
                        </a>
                        @foreach ($breadcrumbs as $breadcrumb)
                            @if (!is_null($breadcrumb->url) && !$loop->last)
                                <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                                <a href="{{ $breadcrumb->url }}"
                                   class="text-white text-hover-white opacity-75 hover-opacity-100">{{ $breadcrumb->title }}</a>
                            @else
                                <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                                <span class="text-white active">{{ $breadcrumb->title }}</span>
                            @endif
                        @endforeach
                    @endunless
                </div>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Heading-->
        </div>
        <!--end::Info-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Button-->
            <a href="#" class="btn btn-transparent-white font-weight-bold py-3 px-6 mr-2">Perguntas Frequentes</a>
            <a href="#" class="btn btn-transparent-white font-weight-bold py-3 px-6 mr-2">Lei de Acesso a Informação</a>
            <a href="#" class="btn btn-transparent-white font-weight-bold py-3 px-6 mr-2">Guias, Manuais e
                Orientações</a>
            <!--end::Button-->
        </div>
        <!--end::Toolbar-->
    </div>
</div>