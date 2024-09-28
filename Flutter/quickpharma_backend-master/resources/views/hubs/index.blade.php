@extends('layouts.main')
@section('title')
    Hubs
@endsection
@section('page-title')
@endsection
@section('content')
    <!--begin::Row-->
    <div class="row gx-5 gx-xl-10">
        <!--begin::Col-->
        <div class="col-xxl-6 mb-5 mb-xl-10">
            <!--begin::Chart widget 8-->
            <div class="card card-flush h-xl-100">
                <!--begin::Header-->
                <div class="card-header pt-4 pb-2">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">
                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-person me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                </svg>
                            </span>Hubs</span>
                        {{-- <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all channels</span> --}}
                    </h3>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <ul class="nav">
                            <li data-bs-toggle="modal" data-bs-target="#kt_modal_1" class="nav-item ms-lg-3 mb-3">
                                <a class="btn btn-theme-color btn-rounded" data-bs-toggle="modal"
                                    data-bs-target="#addModal"><i class="bi bi-plus-lg fs-4 me-2"></i>Add</a>
                            </li>
                        </ul>
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body border-top pt-6">

                    <div class="row d-flex align-items-center">
                        <div class="table-responsive">
                            <table style="font-family: 'Lato', sans-serif;" class="table-light table-striped table-responsive"table-striped table-responsive" aria-describedby="mydesc"
                                data-url="{{ url('getHubList') }}" class='table-striped' id="table_list" data-toggle="table"
                                data-url="" data-click-to-select="false" data-side-pagination="server"
                                data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200,All]" data-search="true"
                                data-toolbar="#toolbar" data-show-columns="false" data-search-align="right"
                                data-show-refresh="false" data-fixed-columns="false" data-fixed-number="1"
                                data-fixed-right-number="1" data-trim-on-search="false" data-mobile-responsive="true"
                                data-sort-name="id" data-sort-order="desc" data-pagination-successively-size="3"
                                data-query-params="queryParams">
                                <thead>
                                    <tr>
                                        <th scope="col" data-field="action" data-sortable="false"
                                            data-events="actionEvents">Action</th>
                                        <th scope="col" data-field="id" data-visible="false" data-sortable="true">UID
                                        </th>
                                        <th scope="col" data-field="title" data-sortable="true">Title</th>
                                        <th scope="col" data-field="address" data-sortable="true">Address</th>
                                    </tr>
                                </thead>
                            </table>

                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>

            <!--end::Chart widget 8-->
        </div>
        <!--end::Col-->


        <!--begin::Col-->
        <div class="col-xxl-6 mb-5 mb-xl-10">
            <!--begin::Chart widget 8-->
            <div class="card card-flush h-xl-100">
                <!--begin::Header-->
                <div class="card-header pt-4 pb-2">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">
                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-person me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                </svg>
                            </span>COVERAGE</span>
                        {{-- <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all channels</span> --}}
                    </h3>
                    <!--end::Title-->

                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body border-top pt-6">

                    <div class="row d-flex align-items-center">
                        <div id="map" class="w-100" style="height: 800px"></div>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Chart widget 8-->
        </div>
        <!--end::Col-->

    </div>
    <!--end::Row-->



    <!--START:: addModel-->
    <div class="modal fade" aria-modal="true" role="dialog" id="addModal">
        <div class="modal-dialog">
            <div class="modal-content shadow-none">
                <div class="modal-header">
                    <h5 class="modal-title">Add Hub</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                        </svg>
                    </div>
                    <!--end::Close-->
                </div>
                <form id="addForm" action="{{ route('hubs.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row mb-3">
                                    <!--begin::Label-->
                                    <label class="col-lg-12 col-form-label text-center">Title</label>
                                    <!--end::Label-->
                                    <div class="col-lg-12">
                                        <input type="text" name="title"
                                            class="form-control form-control-lg form-control-solid" placeholder="Title">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group row mb-3">
                                    <!--begin::Label-->
                                    <label class="col-lg-12 col-form-label text-center">Address</label>
                                    <!--end::Label-->
                                    <div class="col-lg-12">
                                        <textarea row='4' id="address" placeholder="address" name="address"
                                            class="form-control form-control-lg form-control-solid "></textarea>
                                    </div>
                                    <input type="hidden" id="address_latitude" name="address_latitude">
                                    <input type="hidden" id="address_longitude" name="address_longitude">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-theme-color">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END:: addModel-->
    <!--START:: editModel-->
    <div class="modal fade" tabindex="-1" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content shadow-none">
                <div class="modal-header">
                    <h5 class="modal-title">Edit</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form id="addForm" action="{{ route('update.hubs') }}" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="edit_id" id="edit_id">
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <div class="form-group row mb-3">
                                <!--begin::Label-->
                                <label class="col-lg-12 col-form-label text-center">Title</label>
                                <!--end::Label-->
                                <div class="col-lg-12">
                                    <input type="text" name="title" id="edit_title"
                                        class="form-control form-control-lg form-control-solid" placeholder="Title">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group row mb-3">
                                <!--begin::Label-->
                                <label class="col-lg-12 col-form-label text-center">Address</label>
                                <!--end::Label-->
                                <div class="col-lg-12">
                                    <textarea row='4' placeholder="address" id="edit_address" name="address"
                                        class="form-control form-control-lg form-control-solid"></textarea>
                                </div>
                                <input type="hidden" id="edit_address_latitude" name="address_latitude">
                                <input type="hidden" id="edit_address_longitude" name="address_longitude">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <!--begin::Label-->
                            <label class="col-lg-12 col-form-label text-center">Is Active</label>
                            <!--end::Label-->
                            <div class="col-lg-12 text-center form-group">
                                <div class="control-label col-form-label form-check form-check-inline mb-2">
                                    <input class="form-check-input" required="" name="edit_status" type="radio"
                                        value="1">
                                    <label for="isactive" class="form-check-label text-dark">Yes</label>
                                </div>
                                <div class="control-label col-form-label form-check form-check-inline mb-2">
                                    <input class="form-check-input" required="" name="edit_status" type="radio"
                                        value="0">
                                    <label for="isactive" class="form-check-label text-dark">No</label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-theme-color">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END:: editModel-->


    <div class="modal fade" tabindex="-1" id="create_a_new_region">
        <div class="modal-dialog">
            <div class="modal-content shadow-none">
                <div class="modal-header">
                    <h5 class="modal-title">Create a New Region</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form id="create-form" method="POST" autocomplete="off">
                    @csrf

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="form-group row mb-3">

                                    <div class="col-lg-12">
                                        <select class="form-select form-select-solid" name="hubs" id="hubs"
                                            data-control="select2" data-dropdown-parent="#create_a_new_region"
                                            data-placeholder="Select Hubs" data-allow-clear="true">
                                            @isset($hub)
                                                @foreach ($hub as $row)
                                                    <option value="{{ $row->id }}">{{ $row->title }}</option>
                                                @endforeach
                                            @endisset

                                        </select>
                                        <small class="required">Select Hub for this region</small>


                                    </div>

                                    <input type='hidden' name="area" id="area">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-light" onclick="createRegion()">Create</button>

                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection



@section('script')
    <script>

        $(document).ready(function() {
            map.invalidateSize();
            renderRegions();

        });
        </script>
    <script>
        function queryParams(p) {
            return {
                sort: p.sort,
                order: p.order,
                offset: p.offset,
                limit: p.limit,
                search: p.search
            };
        }
    </script>
    <script>
        window.actionEvents = {
            'click .edit': function(e, value, row, index) {
                $("#edit_id").val(row.id);
                $("#edit_title").val(row.title);
                $("#edit_address").val(row.address);
                $("input[name=edit_status][value='" + row.status + "']").prop('checked', true);;
                $("#edit_address_latitude").val(row.address_latitude);
                $("#edit_address_longitude").val(row.address_longitude);
            },

        };
    </script>

    <script>
        function initMap() {
            const directionsService = new google.maps.DirectionsService();
            const directionsRenderer = new google.maps.DirectionsRenderer();
            var trafficLayer = new google.maps.TrafficLayer();
            // trafficLayer.setMap(map);
            const input = document.getElementById("address");
            autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.addListener('place_changed', function() {
                place = autocomplete.getPlace();
                formatted_address = place.formatted_address;
                latitude = place.geometry.location.lat();
                longitude = place.geometry.location.lng();
                $("#address_latitude").val(latitude);
                $("#address_longitude").val(longitude);
            });
        }
    </script>

    <script>
         var map = null;
         var regions = [];
        var newRegionShape = [];

        function showCoordinates(e) {
            alert(e.latlng);
        }

        function centerMap(e) {
            map.panTo(e.latlng);
        }

        function zoomIn(e) {
            map.zoomIn();
        }

        function zoomOut(e) {
            map.zoomOut();
        }
        map = new L.Map('map', {
            center: new L.LatLng('33.770050', '-118.193741'),
            zoom: 13,
            fullscreenControl: true,
            contextmenu: true,
            contextmenuWidth: 140,
            contextmenuItems: [{
                text: 'Show coordinates',
                callback: showCoordinates
            }, {
                text: 'Center map here',
                callback: centerMap
            }, '-', {
                text: 'Zoom in',

                callback: zoomIn
            }, {
                text: 'Zoom out',
                callback: zoomOut
            }]
        });
        var osmUrl = 'https://www.google.com/maps/vt?lyrs=m@221097413,house_numbers&gl=com&x={x}&y={y}&z={z}';
        var osmAttrib =
            'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://rx2go.ai/">Quick Pharma</a>';
        var osm = L.tileLayer(osmUrl, {
            maxZoom: 21,
            attribution: osmAttrib
        }).addTo(map);
        var drawnItems = L.featureGroup().addTo(map);

        map.addControl(new L.Control.Draw({
            edit: {
                featureGroup: drawnItems,
                poly: {
                    allowIntersection: false
                }
            },
            draw: {
                polygon: {
                    allowIntersection: false,
                    showArea: true,
                    editable: true
                },
                rectangle: {
                    allowIntersection: false,
                    showArea: true,
                    editable: true
                },
                polyline: false,
                marker: false,
                circle: false,
                circlemarker: false
            }
        }));


        map.on(L.Draw.Event.CREATED, function(event) {
            newRegionLayer = event.layer;
            drawnItems.addLayer(newRegionLayer);
            // here you got the polygon points
            newRegionShape = newRegionLayer._latlngs;
            var shape_path = [];
            for (var i = 0; i < newRegionShape[0].length; i++) {
                var lat = newRegionShape[0][i].lat;
                var lng = newRegionShape[0][i].lng;
                shape_path.push({lat,lng});
            }
            var geojson = newRegionLayer.toGeoJSON();
            showModal()
        });

        function showModal($region_id = null) {
            $("#create_a_new_region").modal('show');
        }


        function createRegion() {
            if (newRegionShape[0].length < 4) {
                Swal.fire({
                    title: "Error",
                    type: 'error',
                    showConfirmButton: false,
                    text: "Coordinates not recognized!",
                    timer: 2000
                });

                return;
            }

            if (typeof $('#hubs').val() === 'undefined' || parseInt($('#hubs')
                    .val()) < 1) {
                Swal.fire({
                    title: "Error",
                    type: 'error',
                    showConfirmButton: false,
                    text: "Route name is not selected!",
                    timer: 2000
                });
                return;
            }
            Swal.fire({
                title: "Are you sure you want to create a new region?",
                showConfirmButton: true,
                html: false,
                text: "New Region",
                showCancelButton: true,
                confirmButtonClass: 'btn-info',
                confirmButtonText: 'Yes',
                denyCanceButtonText: `No`,
                closeOnConfirm: true,
                closeOnCancel: true
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    region_name = result.isConfirm;
                    var shape_path = [];
                    var points = [];
                    for (var i = 0; i < newRegionShape[0].length; i++) {
                        var lat = newRegionShape[0][i].lat;
                        var lng = newRegionShape[0][i].lng;
                        // shape_path.push(point_lat);
                        // shape_path.push(point_lng);

                        shape_path.push({
                            lat,
                            lng
                        });
                    }
                    console.log(shape_path);
                    // saving
                    $.ajax({
                        type: "POST",
                        url: "{{ route('create.coverage') }}",
                        data: {
                            '_token': "{{ csrf_token() }}",
                            hubs: $('#hubs').val(),
                            path: shape_path
                        },
                        success: function(response) {
                            if (response === "1") {
                                // removing from map, because it will appear from db
                                map.removeLayer(newRegionLayer)

                                setTimeout(function() {
                                    Swal.fire({
                                        title: "You have successfully created a new region!",
                                        text: "Region Created",
                                        type: 'success',
                                        showConfirmButton: false,

                                        timer: 2000
                                    });
                                }, 150)

                                // nulling variables
                                newRegionShape = [];
                                $("#edit_region_name").modal('hide');

                                // refresh the map
                                renderRegions()
                            } else {
                                setTimeout(function() {
                                    Swal.fire({
                                        title: 'Error',
                                        type: 'error',
                                        text: response,
                                        html: true,
                                        confirmButtonText: 'Okay',
                                        confirmButtonClass: 'btn-danger',
                                    });
                                }, 150)
                            }
                        }
                    });
                }

                if (result.isDenied) {
                    map.removeLayer(newRegionLayer)
                }
            })

        }


         // rendering/rerendereing regions
         function renderRegions() {
            // clear all
            //clearRegions();
            // drawing to the map
            $.ajax({
                type: "GET",
                url: "{{ route('get.coverage') }}",

                success: function(response) {
                    //return false;

                    clearRegions();

                    //loop through array
                    var regionsArray = response; //$.parseJSON(response);
                    var seletedOrders = 0;
                    var seletedRegions = 0;

                    $.each(regionsArray, function(key, array) {
                        seletedRegions++;
                        var polyCoords = this.path;
                        var title = this.title;
                        polyOrders = 0;
                        var points = [];
                        var color = this.color;
                        var settigns = null;
                        seletedOrders = seletedOrders + parseInt(polyOrders);

                        // preparing coordinats
                        if (typeof polyCoords !== 'undefined') {
                            for (var i = 0; i < polyCoords.length; i++) {
                                points.push({
                                    lat: parseFloat(polyCoords[i].lat),
                                    lng: parseFloat(polyCoords[i].lng)
                                });
                            }
                        }
                        if (points.length > 0) {

                            var region = L.polygon(points, {
                                stroke: true,
                                weight: 8,
                                fillOpacity: 0.45,
                                strokeColor: color,
                                fillColor: color,
                                color: color,
                                editable: false,
                                hub: this.title,
                                settings: settigns
                            }).addTo(map);

                            // adding tile with number of orders
                            var icon = new L.TextIcon({

                                text: '<div style="background: ' + color +'; box-shadow: 0px 0px 2px rgba(0,0,0,0.5); font-weight: bold; color: white; padding: 5px; border-radius: 5px; width: 150px; height: 43px;margin-left:-25px"><b>' +
                                        title + '</b>' + '</div>'
                            });

                            var center = region.getBounds().getCenter();
                            region.label = L.marker([center.lat, center.lng], {
                                title: this.title,
                                icon: icon,
                            }).addTo(map);

                            region.bindPopup("<h1>" + title + "</h1>");



                        }
                    })
                    // updateMassButtons(seletedOrders, seletedRegions);
                }
            });
        }

        // removing all reginos from the map
         function clearRegions($id = null) {
            if (map === null) {
                return false;
            }
            for (var key in regions) {
                if ($id !== null && parseInt($id) !== $id) {
                    continue;
                }
                // removeing label first
                map.removeLayer(regions[key].label);

                // removing layer
                map.removeLayer(regions[key]);

                delete regions[key];
            }
            return true;
        }
    </script>
@endsection
