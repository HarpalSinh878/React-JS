<div class="modal fade" tabindex="-1" id="callback_model">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"> Request Callback</h3>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-1"></span>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                            transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                            transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                    </svg>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
                <label class="col-lg-12 col-form-label">We will call you back as soon as we can.</label>
                <div class="form-group row mb-2">
                    <div class="col-lg-8">
                        <input type="text" class="form-control form-control-lg form-control-solid"
                            placeholder="+123456789" value="+123456789">
                        <span>Phone Number</span>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" class="form-control form-control-lg form-control-solid" placeholder=""
                            value="">
                        <span>Extension</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-theme-color" onclick="Request();">Request</button>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<button id="kt_app_layout_builder_toggle"
    class="btn btn-theme-color border-radius-100 app-layout-builder-toggle btn-rounded pt-5 pb-5 ps-5 pe-5"
    data-bs-toggle="tooltip" data-bs-placement="left" data-bs-dismiss="click" data-bs-trigger="hover"
    data-bs-original-title="Metronic Builder" data-kt-initialized="1">
    <i class="las la-sms fs-2x"></i></button>

@yield('toolbar')

<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
    <span class="svg-icon">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                transform="rotate(90 13 6)" fill="currentColor" />
            <path
                d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                fill="currentColor" />
        </svg>
    </span>
    <!--end::Svg Icon-->
</div>
<!--end::Scrolltop-->
{{-- <script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if ( localStorage.getItem("data-theme") !== null ) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }</script> --}}

<!----- THIS FORM USE FOR DELETE  ---->
<form method="DELETE" id="form-del">
    @csrf
    <input name="_method" type="hidden" value="DELETE">

</form>
<!----- THIS FORM USE FOR DELETE  ---->

<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>

<script src="{{ asset('assets/plugins/custom/leaflet/leaflet.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.js') }}"></script>
<!-- table -->
<script src="{{ asset('assets/bootstrap-table/export/tableexport.jquery.plugin/tableExport.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap-table/export/jspdf/dist/jspdf.umd.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap-table/bootstrap-table.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap-table/fixed-columns/bootstrap-table-fixed-columns.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap-table/mobile/bootstrap-table-mobile.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap-table/copy-rows/bootstrap-table-copy-rows.js') }}"></script>
<script src="{{ asset('assets/bootstrap-table/export/bootstrap-table-export.js') }}"></script>
<script src="{{ asset('assets/bootstrap-table/print/bootstrap-table-print.js') }}"></script>

<!-- end table -->
<script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>

<script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/new-target.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>

<script src="{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/lightbox2/dist/js/lightbox.js') }}"></script>
<!-- start :: include FilePond library -->
<script src="{{ asset('assets/plugins/custom/filepond/dist/filepond.min.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/filepond/dist/filepond-plugin-image-preview.min.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/filepond/dist/filepond-plugin-file-validate-size.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/filepond/dist/filepond-plugin-file-validate-type.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/filepond/dist/filepond-plugin-image-validate-size.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/filepond/dist/filepond.jquery.js') }}"></script>
<!-- end :: include FilePond library -->
<script type="text/javascript" src="{{ asset('assets/plugins/custom/jsRapStopwatch/jsRapStopwatch.js') }}"></script>

<!--- START :: Leaflet MAP -->
<script src="{{ asset('assets/plugins/custom/leaflet/toolbar/leaflet.toolbar.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/leaflet/draw/leaflet.draw.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/leaflet/fullscreen/Control.FullScreen.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/leaflet/contextmenu/leaflet.contextmenu.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/leaflet/texticon/leaflet-text-icon.js') }}"></script>


<script src="{{ asset('assets/bootstrap-table/editable/js/bootstrap-editable.min.js') }} "></script>
<script src="{{ asset('assets/bootstrap-table/editable/bootstrap-table-editable.js') }} "></script>
<script src="{{ asset('assets/plugins/custom/jqClock/jqClock.min.js') }}"></script>

<script src="{{ asset('assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
<!--- END :: Leaflet MAP -->
<!-- end :: include FilePond library -->
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8S-HmWFa0DjZlgO6ImTrHlBmCeHgoHzM&callback=initMap&libraries=places&v=weekly"
    defer></script>

<script src="{{ asset('assets/js/custom/custom.js') }}"></script>

<script>
    $(document).ready(function() {

        // $("#driver").select2({
        //     ajax: {
        //         url: "{{ route('driver.getalldriver') }}",
        //         type: "GET",

        //         data: function(params) {
        //             return {
        //                 searchTerm: params.term // search term
        //             };
        //         },
        //         processResults: function(response) {
        //             return {
        //                 results: response
        //             };
        //         },
        //         cache: true
        //     }
        // });
    });


    function confirmAndNodeDeleteOrder(e) {
        var orderid = e.currentTarget.getAttribute(
            'orderid'
            ); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty

        Swal.fire({
            title: 'Are You Sure Want to Reject Order?',
            icon: 'error',
            showDenyButton: true,

            confirmButtonText: 'Yes',
            denyCanceButtonText: `No`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('SaveStatus') }}",
                    type: "POST",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        "orderid": orderid,
                        "status": 'Rejected',
                    },
                    cache: false,
                    success: function(result) {

                        if (result.error == false) {
                            location.reload();
                        }


                    },
                    error: function(error) {

                    }
                });
            }
        })
        return false;
    }
</script>

<script>
    Filevalidation = () => {
        const attachfile = document.getElementById('attachfile');
        // Check if any file is selected.
        if (attachfile.files.length > 0) {
            for (const i = 0; i <= attachfile.files.length - 1; i++) {
                const fsize = attachfile.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 2048) {
                    toastr.error("File too Big, please select a file less than 2mb");
                    document.getElementById('attachfile').value = '';
                }
            }
        }

        const attachsignature = document.getElementById('attachsignature');
        // Check if any file is selected.
        if (attachsignature.files.length > 0) {
            for (const i = 0; i <= attachsignature.files.length - 1; i++) {
                const fsize = attachsignature.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 2048) {
                    toastr.error("File too Big, please select a file less than 2mb");
                    document.getElementById('attachsignature').value = '';
                }
            }
        }

        const copay = document.getElementById('copay_file');
        // Check if any file is selected.
        if (copay.files.length > 0) {
            for (const i = 0; i <= copay.files.length - 1; i++) {
                const fsize = copay.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 2048) {
                    toastr.error("File too Big, please select a file less than 2mb");
                    document.getElementById('copay_file').value = '';
                }
            }
        }

        const fridge = document.getElementById('fridge_file');
        // Check if any file is selected.
        if (fridge.files.length > 0) {
            for (const i = 0; i <= fridge.files.length - 1; i++) {
                const fsize = fridge.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 2048) {
                    toastr.error("File too Big, please select a file less than 2mb");
                    document.getElementById('fridge_file').value = '';
                }
            }
        }


    }
</script>


<script>
    $(function() {
        myStopWatch = $('#stopwatch').jsRapStopwatch({
            timeName: [' YEAR ', ' MONTH ', ' DAY ', ' HOURS ', ' MIN ', ' SEC'],
            enabled: false
        })[0];
        myStopWatch.opt.timeStart.setTime(new Date());

        LoginStopWatch = $('#LoginStopWatch').jsRapStopwatch({
            timeName: [' YEAR ', ' MONTH ', ' DAY ', ' HOURS ', ' MIN ', ' SEC'],
            enabled: false
        })[0];
        LoginStopWatch.opt.timeStart.setTime(new Date("{{ Auth::user()->last_login_at }}"));

        $("#currentDateTime").clock({
            dateFormat: "m/d ",
            timeFormat: " h:i:s A",
        });

    });
</script>

@if (Session::has('success'))
    <script type="text/javascript">
        toastr.options.closeButton = true;
        toastr.success("{{ Session::get('success') }}");
    </script>
@endif




@if (Session::has('error'))
    <script type="text/javascript">
        toastr.options.closeButton = true;
        toastr.error("{{ Session::get('error') }}");
    </script>
@endif


@if ($errors->isNotEmpty())
    @foreach ($errors->all() as $input_error)
        <script type="text/javascript">
            toastr.options.closeButton = true;
            toastr.error("{{ $input_error }}");
        </script>
    @endforeach
@endif
