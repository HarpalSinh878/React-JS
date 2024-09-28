@extends('layouts.main')
@section('title')
About Us
@endsection
@section('page-title')
@endsection
@section('content')
    <!--begin::Row-->
    <div class="row gx-5 gx-xl-10">
        <!--begin::Col-->
        <div class="col-xxl-12 mb-5 mb-xl-10">
            <!--begin::Chart widget 8-->
            <div class="card card-flush h-xl-100">
                <!--begin::Header-->
                <div class="card-header pt-4 pb-2">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">
                            About Us</span>
                        {{-- <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all channels</span> --}}
                    </h3>
                    <!--end::Title-->
                   
                </div>
                <!--end::Header-->
                <form action="{{ url('settings') }}" method="post">
                    @csrf

                    <!--begin::Body-->
                    <div class="card-body border-top pt-6">
                        <input name="type" value="about_us" type="hidden">
                        <div class="row">
                            <div class="col-md-12">
                                <textarea id="tinymce_editor" name="data" class="form-control col-md-7 col-xs-12">{{ $data }}</textarea>
    
                            </div>

                            <div class="col-12 mt-2 d-flex justify-content-end">
                                <button class="btn btn-theme-color btn-rounded" type="submit" name="submit">Save</button>
                            </div>
    
                        </div>
                    </div>
                    <!--end::Body-->

                </form>
            </div>
            <!--end::Chart widget 8-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

   
@endsection
