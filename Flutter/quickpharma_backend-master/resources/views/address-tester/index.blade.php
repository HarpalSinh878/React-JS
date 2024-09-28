@extends('layouts.main')
@section('title')
    Address Tester
@endsection
@section('page-title')
@endsection
@section('content')
    <div class="row gx-5 gx-xl-10">
        <div class="col-xxl-12 mb-5 mb-xl-10">
            <div class="card card-flush h-xl-100">
                <div class="card-header pt-4 pb-4">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">
                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-boxes me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z">
                                    </path>
                                </svg> --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-patch-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                    <path
                                        d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z" />
                                </svg>
                            </span>Address Tester</span>
                    </h3>
                </div>
                <form action="{{ route('orders.store') }}" method="post">
                    @csrf
                    <div class="card-body border-top pt-6">
                        <div class="row mt-5 mt-sm-8">
                            <div class="col-lg-6">
                                <div class="row mb-5">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">
                                        Recipient Name</label>
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="recipient_name" id="recipient_name" required
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Recipient Name">
                                        <div class="fv-plugins-message-container invalid-feedback">
                                        </div>
                                    </div>
                                    <div id="suggesstion-box" class="position-relative"></div>
                                </div>
                                <div class="bg-light p-5 border-radius-10 mb-5">
                                    <div class="row mb-5">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Recipient
                                            Address</label>
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input type="text" name="recipient_address" required
                                                class="form-control form-control-lg form-control-solid border-dark"
                                                id="recipient_address" placeholder="Recipient Address">
                                            <input type="hidden" id="hidden_latitude" name="latitude">
                                            <input type="hidden" id="hidden_longitude" name="longitude">
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">City</label>
                                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                                            <input type="text" name="city" id="city" required
                                                class="form-control form-control-lg form-control-solid border-dark"
                                                placeholder="City">
                                        </div>
                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">ZIP</label>
                                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                                            <input type="text" name="zip" id="zip" required
                                                class="form-control form-control-lg form-control-solid border-dark"
                                                placeholder="ZIP">
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">State</label>
                                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                                            <select id="state" required name="state"
                                                class="form-select form-control form-control-solid border-dark"
                                                data-hide-search="true" data-control="select2"
                                                data-placeholder="Select State">
                                                <option></option>
                                                <option value="NY">NY</option>
                                                <option value="CT">CT</option>
                                                <option value="NJ">NJ</option>
                                                <option value="CA">CA</option>
                                            </select>
                                        </div>
                                        <label
                                            class="col-lg-3 col-form-label required fw-semibold fs-6">Apt/Suite/Floor</label>
                                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                                            <input type="text" name="floor" required id="apt"
                                                class="form-control form-control-lg form-control-solid border-dark"
                                                placeholder="Apt/Suite/Floor">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!---START SCRIPT :: Bootstrap-Table Code --->
    <script>
        $(document).click(function() {
            $("#suggesstion-box").hide();
        });
        $(function() {
            initMap();
            $("#recipient_name").keyup(function() {
                $.ajax({
                    type: "get",
                    url: "{{ route('address-tester.recipient-info') }}",
                    data: 'keyword=' + $(this).val(),
                    // beforeSend: function() {
                    //     $("#recipient_name").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
                    // },
                    success: function(response) {
                        $("#suggesstion-box").show().html(response.data);
                    }
                });
            });
        });
        function selectCountry(val) {
            $("#recipient_name").val($(val).attr('data-recipient-name'));
            $('#recipient_address').val($(val).attr('data-address'));
            $("#state").val($(val).attr('data-state')).trigger('change');
            $('#city').val($(val).attr('data-city'));
            $('#zip').val($(val).attr('data-zip'));
            $('#hidden_latitude').val($(val).attr('data-latitude'));
            $('#hidden_longitude').val($(val).attr('data-longitude'));
            $('#zip').val($(val).attr('data-zip'));
            $('#apt').val($(val).attr('data-apt'));
            $("#suggesstion-box").hide();
        }
    </script>
    <script>
        // AIzaSyB8S-HmWFa0DjZlgO6ImTrHlBmCeHgoHzM
        function getCodeFun(lat, lng) {
            var zipcode = '';
            $.ajax({
                url: 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + lat + ',' + lng +
                    '&key={{ env('GOOGLE_MAP_KEY') }}',
                type: "GET",
                dataType: 'json',
                async: false,
                success: function(data) {
                    var results = data.results;
                    // $("#hidden_full_address").val(results.formatted_address)
                    results[0].address_components.forEach(element => {
                        // district1 = element.types[0] == "locality" ? element.long_name : '';
                        if (element.types[0] == "postal_code") {
                            zipcode = element.long_name;
                        }
                    });
                }
            });
            return zipcode;
        }
        function initMap() {
            const directionsService = new google.maps.DirectionsService();
            const directionsRenderer = new google.maps.DirectionsRenderer();
            var trafficLayer = new google.maps.TrafficLayer();
            // trafficLayer.setMap(map);
            const input = document.getElementById("recipient_address");
            autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.addListener('place_changed', function() {
                place = autocomplete.getPlace();
                formatted_address = place.formatted_address;
                latitude = place.geometry.location.lat();
                longitude = place.geometry.location.lng();
                $("#hidden_latitude").val(latitude);
                $("#hidden_longitude").val(longitude);
                // console.log('place', JSON.stringify(place));
                zipcode = getCodeFun(latitude, longitude);
                place.address_components.forEach(element => {
                    if (element.types[0] == "locality") {
                        $("#city").val(element.long_name);
                    }
                    if (element.types[0] == "postal_code") {
                        $("#zip").val(element.long_name);
                    } else {
                        $("#zip").val(zipcode);
                    }
                    if (element.types[0] == "administrative_area_level_1") {
                        $("#state").val(element.short_name).trigger('change');
                    }
                });
            });
            // var options = {types: ['address'],componentRestrictions: {country: 'us'} };
            // autocomplete = new google.maps.places.Autocomplete(input, options);
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                for (var i = 0; i < place.address_components.length; i++) {
                    for (var j = 0; j < place.address_components[i].types.length; j++) {
                        if (place.address_components[i].types[j] == "postal_code") {
                            if ($.trim($("#zip").val()) == '') {
                                $("#zip").val(place.address_components[i].long_name);
                            }
                        }
                        if (place.address_components[i].types[j] == "locality") {
                            if ($.trim($("#city").val()) == '') {
                                $("#city").val(place.address_components[i].long_name);
                            }
                        }
                        if (place.address_components[i].types[j] == "administrative_area_level_1") {
                            if ($.trim($("#state").val()) == '') {
                                $('#state').append('<option value="' + place.address_components[i].short_name +
                                    '" selected>' + place.address_components[i].short_name + '</option>');
                            }
                        }
                    }
                }
            });
        }
    </script>
@endsection
