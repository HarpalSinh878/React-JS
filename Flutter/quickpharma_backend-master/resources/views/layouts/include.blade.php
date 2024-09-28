<link rel="shortcut icon" href="{{ asset('assets/image/favicon.ico') }}" />
<!--begin::Fonts(mandatory for all pages)-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Vendor Stylesheets(used for this page only)-->
<link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
<!--end::Vendor Stylesheets-->

<link href="{{ asset('assets/plugins/custom/leaflet/leaflet.bundle.css') }}" rel="stylesheet" type="text/css" />
<!-- bootstrap-table -->
<link href="{{ asset('assets/bootstrap-table/bootstrap-table.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/bootstrap-table/fixed-columns/bootstrap-table-fixed-columns.min.css') }}" rel="stylesheet"
    type="text/css" />
<!-- end bootstrap-table -->
<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.css') }}" rel="stylesheet" type="text/css" />
<!--end::Global Stylesheets Bundle-->

<link href="{{ asset('assets/plugins/custom/lightbox2/dist/css/lightbox.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('assets/plugins/custom/filepond/dist/filepond.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/custom/filepond/dist/filepond-plugin-image-preview.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('assets/bootstrap-table/editable/css/bootstrap-editable.css') }}" rel="stylesheet"/>


<!--- START :: Leaflet MAP -->

<link rel="stylesheet" href="{{ asset('assets/plugins/custom/leaflet/toolbar/leaflet.toolbar.css') }}" type="text/css" />
<link rel="stylesheet"  href="{{ asset('assets/plugins/custom/leaflet/draw/leaflet.draw.css') }}" />
<link rel="stylesheet"  href="{{ asset('assets/plugins/custom/leaflet/fullscreen/Control.FullScreen.css') }}" />
<link rel="stylesheet"  href="{{ asset('assets/plugins/custom/leaflet/contextmenu/leaflet.contextmenu.css') }}" />
<link rel="stylesheet"  href="{{ asset('assets/plugins/custom/leaflet/texticon/leaflet-text-icon.css') }}" />
<!--- END :: Leaflet MAP -->
<style>
    .pac-container {
            z-index: 1060 !important;
    }
</style>

<script>const domain_url = "{{ url('') }}";</script>  