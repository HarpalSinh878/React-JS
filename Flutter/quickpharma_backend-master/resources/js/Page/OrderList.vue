<template>
    <!--begin::Col-->
    <div class="col-xxl-2 col-sm-2 mb-5 mb-xl-10 ms-n7">
        <!--begin::Chart widget 8-->
        <div class="card card-flush h-xl-100">

            <!--begin::Body-->
            <div class="card-body border-top pt-6">
                <div class="row mb-5">
                    <div class="col-sm-6">
                        <h3 class="mt-3">
                            <i class="fs-fluid bi bi-geo-alt"></i>
                            <span class="ms-1">Routes</span>
                        </h3>
                    </div>
                    <div class="col-sm-6 text-center">
                        <button class="btn btn-icon btn-sm btn-secondary"><i class="bi bi-arrow-clockwise"></i></button>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="form-check form-check-custom form-check-solid ms-1 form-check-sm col-auto">
                        <input class="form-check-input me-3" type="checkbox">
                        <label class="form-check-label">
                            <div class="fw-semibold text-gray-800">SHOW ONLY PENDING</div>
                        </label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-check form-check-custom form-check-solid ms-1 form-check-sm col-auto">
                        <input class="form-check-input me-3" type="checkbox">
                        <label class="form-check-label">
                            <div class="fw-semibold text-gray-800">SHOW ONLY MY ROUTE</div>
                        </label>
                    </div>
                </div>
                <div class="row mb-3">
                    <input type="text" class="form-control form-control-solid" placeholder="Route Name Or ID">
                </div>
                <hr>
                <div class="row mb-3 scroll-y">
                    <div class="form-check form-check-custom form-check-solid ms-1 form-check-sm col-auto">
                        <div id="route_buttons"
                            style="max-height: 500px; overflow-y: scroll; margin-bottom: 15px; border-bottom: 1px solid lightgray;">

                            <div class="pets" v-for="route in routes" :key="route.id">
                                {{ route.id }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Chart widget 8-->
    </div>
    <!--end::Col-->
</template>
<script>
let toViewPort = function () {
    //	Click first route or searched route.
    let id = false;
    if (id) {
        $(`button[data-uid="${id}"]`).click();
        setTimeout(() => {
            $('#route_buttons')
                .scrollTop(0)
                .animate({
                    scrollTop: $(`button[data-uid="${id}"]`).offset().top - $('#route_buttons').offset().top
                }, 1000);

        }, 500);
    } else {
        $(".select_route:first").click();
    }
};
update_routes(toViewPort);
var selected_route = "";
function update_routes(callback) {
    $.ajax({
        type: "GET",
        url: domain_url + '/api/web/getOptimizeRoute',
        success: function (response) {

            //info = response;
            var buttons = "";
            $.each(response.data, function (index, value) {
                buttons = buttons +
                    "<button id='route" + value.id + "' style='width: 100%; white-space: normal; margin-bottom: 10px;' class='btn select_route " +
                    value.class + " " + (selected_route.toString() === value.uid.toString() ? 'active' : '') + "' type='button' data-uid='" + value.id + "' data-driver='" + value.driverid + "'>" +
                    value.name + "</button>" + value.renderStats;
            });
            $("#route_buttons").html(buttons);

            // SET CLICK LISTENER, must be in function as buttons only exist afterwards
            $(".select_route").click(function () {
                var uid = $(this).attr("data-uid");
                if (typeof uid == 'undefined' || !uid) {
                    return;
                }
              
                selected_route = uid;
                console.log($(this).attr("data-driver"));
                this.$emit('change-driver-id', $(this).attr("data-driver"))
                $('#js-importbtn').attr('href', '/routes-module/import/index?route_id=' + uid);
                var name = $(this).html();
                // only when clicked
                drawDirections = false;
                $(".select_route").removeClass("active");
                $(this).addClass("active");

                $("#route_progress").html("<i class='fa fa-spinner fa-spin'></i>");


                if (tmpIterator) {
                    clearInterval(tmpIterator);
                }

                tmpIterator = setInterval(() => {
                    if (appJs) {
                        clearInterval(tmpIterator);

                        let act = 'push';
                        if (!history.state) {
                            act = 'replace'
                        }
                        if (history.state && history.state.route_id != uid || history.state == null) {
                            appJs.$router[act]({ name: 'route-view-item', params: { uid } })
                            history.replaceState({ 'action': 'routesOpenDetails', 'route_id': uid }, null, '/routes/' + uid);
                        }
                    }
                }, 50);

                //	Get route info
                updateSelectedRoute(selected_route);
            });


            if (callback) callback();
        }
    });

}

function selectCurrentState() {
    $('#set_current_substate').val('');
    if ($(this).find('span').text().trim() == 'All') {
        $('#set_current_state').val('');
    } else {
        $('#set_current_state').val($(this).find('span').text());
    }
    update_routes(function () {
        setTimeout(function () {
            if ($('.select_route.active').length == 0) {
                $(".select_route:first").click();
            }
        }, 500)
    });
}
export default {
    data() {
        return {
            routes: []
        }
    },
    mounted() {

    },
    created() {
        update_routes();
    },
    methods: {

    },
}
</script>