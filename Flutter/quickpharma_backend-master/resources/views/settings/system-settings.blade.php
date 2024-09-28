@extends('layouts.main')
@section('title')
System Settings
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
                        <span class="card-label fw-bold text-dark">    System Settings</span>
                    </h3>
                    <!--end::Title-->

                </div>
                <!--end::Header-->
                <form action="{{ url('set_settings') }}" method="post">
                    @csrf

                    <!--begin::Body-->
                    <div class="card-body border-top pt-6">
                        <input name="type" value="terms_conditions" type="hidden">
                        <div class="row mb-15">
                            <div class="mb-5 border-bottom">
                                <h6 class="text-center text-uppercase">Company Details</h6>
                            </div>
                            <div class="form-group row mb-5">
                                <label class="col-sm-2 col-form-label text-center">Company Name</label>
                                <div class="col-sm-4">
                                    <input name="company_name" type="text" class="form-control"
                                        placeholder="Company Name"
                                        value="{{ system_setting('company_name') != '' ? system_setting('company_name') : '' }}"
                                        required="">
                                </div>

                                <label class="col-sm-2 col-form-label text-center">Website</label>
                                <div class="col-sm-4">
                                    <input name="company_website" type="text" class="form-control" placeholder="Website"
                                        value="{{ system_setting('company_website') != '' ? system_setting('company_website') : '' }}"
                                        >
                                </div>
                            </div>

                            <div class="form-group row mb-5">
                                <label class="col-sm-2 col-form-label text-center">Email</label>
                                <div class="col-sm-4">
                                    <input name="company_email" type="email" class="form-control" placeholder="Email"
                                        value="{{ system_setting('company_email') != '' ? system_setting('company_email') : '' }}"
                                        required="">
                                </div>
                                <label class="col-sm-2 col-form-label text-center">Address</label>
                                <div class="col-sm-4">
                                    <textarea name="company_address" class="form-control" rows="3" placeholder="Enter Address">{{ system_setting('company_address') != '' ? system_setting('company_address') : '' }}</textarea>

                                </div>
                            </div>
                            <div class="form-group row mb-5">
                                <label class="col-sm-2 col-form-label text-center">Telephone 1</label>
                                <div class="col-sm-4">
                                    <input name="company_tel1" type="text" class="form-control" placeholder="Telephone 1"
                                        pattern="\d*"
                                        value="{{ system_setting('company_tel1') != '' ? system_setting('company_tel1') : '' }}"
                                        required="">

                                </div>
                                <label class="col-sm-2 col-form-label text-center">Telephone 2</label>
                                <div class="col-sm-4">
                                    <input name="company_tel2" type="text" class="form-control" placeholder="Telephone 2"
                                        pattern="\d*"
                                        value="{{ system_setting('company_tel2') != '' ? system_setting('company_tel2') : '' }}"
                                        required="">

                                </div>

                            </div>


                            

                        </div>

                        <div class="row mb-15">
                            <div class="mb-5 border-bottom">
                                <h6 class="text-center text-uppercase">Maintenance Setting</h6>
                            </div>

                            <div class="form-group row ">

                                <label class="col-sm-2 col-form-label text-center mt-2">Maintenance Mode</label>
                                <div class="col-sm-2 col-md-4 col-xs-12 text-center mt-6">
                                    <div class="form-check form-switch  text-center">
        
                                        <input type="hidden" name="maintenance_mode" id="maintenance_mode"
                                            value="{{ system_setting('maintenance_mode') != '' ? system_setting('maintenance_mode') : 0 }}">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            {{ system_setting('maintenance_mode') == '1' ? 'checked' : '' }}
                                            id="switch_maintenance_mode">
                                        <label class="form-check-label" for="switch_maintenance_mode"></label>
                                    </div>
                                </div>
                                <label class="col-sm-2 col-form-label text-center mt-2">Maintenance Message</label>
                                <div class="col-sm-2 col-md-4 col-xs-12">
                                    <textarea name="maintenance_message" class="form-control" rows="2" placeholder="Maintenance Message">{{ system_setting('maintenance_message') != '' ? system_setting('maintenance_message') : '' }}</textarea>
                                </div>
        
                            </div>
                        </div>
                        <div class="row mb-15">
                            <div class="mb-5 border-bottom">
                                <h6 class="text-center text-uppercase">Notification FCM Key</h6>
                            </div>

                            <div class="form-group row ">

                                <label class="col-sm-2 form-check-label text-center">FCM Key</label>
                                <div class="col-sm-10 col-md-10 col-xs-12 text-center">
                                    <textarea name="fcm_key" class="form-control" rows="3" placeholder="Fcm Key">{{ system_setting('fcm_key') != '' ? system_setting('fcm_key') : '' }}</textarea>
        
                                </div>
        
        
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-2 d-flex justify-content-end">
                                <button class="btn btn-theme-color btn-rounded" type="submit">Save</button>
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

@section('script')
    <script type="text/javascript">
        // $("#switch_maintenance_mode").change(function(){
        //     $(this).is(':checked') ? $(this).val(1) : $(this).val(0);
        // });

        $("#switch_maintenance_mode").on('change', function() {
            $("#switch_maintenance_mode").is(':checked') ? $("#maintenance_mode").val(1) : $("#maintenance_mode")
                .val(0);
        });
    </script>
@endsection