@extends('layouts.main')
@section('title')
    Routes Timeline
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
                            <span class="svg-icon svg-icon-1 svg-icon-primary">

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-stopwatch" viewBox="0 0 16 16">
                                    <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z" />
                                    <path
                                        d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z" />
                                </svg>
                            </span>Routes Timeline</span>
                        {{-- <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all channels</span> --}}
                    </h3>
                    <!--end::Title-->

                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body border-top pt-6">
                    <!--begin::Tab content-->
                    <div class="row d-flex align-items-center">
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade active show" id="all" role="tabpanel">
                                <!--begin::Statistics-->
                                <div class="mb-19">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <input class="form-control form-control-solid flatpickr"
                                                placeholder="Pick date & time" />
                                            <span>Route Created After</span>
                                        </div>
                                        <div class="col-sm-2">
                                            <input class="form-control form-control-solid flatpickr"
                                                placeholder="Pick date & time" />
                                            <span>Route Created Before</span>
                                        </div>
                                        <div class="col-sm-1">
                                            <button class="btn btn-success"><i class="bi bi-check2"></i>Apply</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <select class="form-select form-select-solid" data-control="select2"
                                                data-placeholder="Select Route" data-allow-clear="true">
                                            </select>
                                            <span>Filter By Route</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-10">
                                    <button class="btn btn-theme-color mb-2 filter-btn"
                                        value="All">All({{ getOrdersTotal('') }})</button>
                                    <button class="btn btn-theme-color mb-2 filter-btn" value="Open">Open
                                        ({{ getOrdersTotal('Ready To Pickup') }})</button>
                                    <button class="btn btn-theme-color mb-2 filter-btn" value="Driver Assigned">Driver
                                        Assigned ({{ getOrdersTotal('Pickup Occurred') }})</button>
                                    <button class="btn btn-theme-color mb-2 filter-btn" value="Driver Out">Driver Out
                                        ({{ getOrdersTotal('Ready For Delivery') }})</button>
                                    <button class="btn btn-theme-color mb-2 filter-btn"
                                        value="Patient Texted and Called">Patient Texted and Called
                                        ({{ getOrdersTotal('Route Optimized') }})</button>
                                    <button class="btn btn-theme-color mb-2 filter-btn" value="Route On Time">Route On Time
                                        ({{ getOrdersTotal('Driver Out') }})</button>
                                    <button class="btn btn-theme-color mb-2 filter-btn" value="Route Late">Route Late
                                        ({{ getOrdersTotal('Delivered') }})</button>
                                    <button class="btn btn-theme-color mb-2 filter-btn" value="Need Help">Need Help
                                        ({{ getOrdersTotal('Delivered Attempted') }})</button>
                                    <button class="btn btn-theme-color mb-2 filter-btn" value="Route Finished">Route
                                        Finished ({{ getOrdersTotal('Returned') }})</button>
                                    <button class="btn btn-theme-color mb-2 filter-btn"
                                        value="Driver Is On His Way To The Office">Driver Is On His Way To The Office
                                        ({{ getOrdersTotal('Rejected') }})</button>
                                    <button class="btn btn-theme-color mb-2 filter-btn" value="QAQC Checked the Route">QAQC
                                        Checked the Route({{ getOrdersTotal('Back To Pharmacy') }})</button>
                                    <button class="btn btn-theme-color mb-2 filter-btn"
                                        value="Accounting Pending">Accounting Pending
                                        ({{ getOrdersTotal('Investigation') }})</button>
                                    <button class="btn btn-theme-color mb-2 filter-btn"
                                        value="Accounting Checked">Accounting Checked
                                        ({{ getOrdersTotal('Other Date Delivery') }})</button>
                                </div>
                                <div class="mb-5">
                                    <div id="kt_docs_vistimeline_group"></div>
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Tab pane-->
                        </div>
                        <!--end::Tab content-->
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Chart widget 8-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
@endsection

@section('script')
    <script>
        var now = Date.now();

        var options = {
            stack: true,
            maxHeight: 640,
            horizontalScroll: false,
            verticalScroll: true,
            zoomKey: "ctrlKey",
            start: new Date(new Date().setHours(0, 0, 0, 0)), // minus 3 days
            end: new Date(new Date().setHours(23, 59, 59, 999)), // plus 1 months aprox.
            showCurrentTime:true,
            orientation: {
                axis: "both",
                item: "top",
            },
        };
        var groups = new vis.DataSet();
        var items = new vis.DataSet();

        var count = 10;

        for (var i = 0; i < count; i++) {
            var start = new Date(new Date().setHours(0, 0, 0, 0));
            var end = Date(new Date().setHours((Math.random() * (23 - 0 + 1) + 0),59, 59, 999));
            console.log(end);
            groups.add({
                id: i,
                content: "Task " + i,
                order: i,
            });

            items.add({
                id: i,
                group: i,
                start: start,
                end: end,
                type: "range",
                content: "Item " + i,
            });
        }

        // create a Timeline
        var container = document.getElementById("kt_docs_vistimeline_group");
        var timeline = new vis.Timeline(container, items, groups, options);
        //timeline = new vis.Timeline(container, null, options);
        timeline.setGroups(groups);
        timeline.setItems(items);

        function debounce(func, wait = 100) {
            let timeout;
            return function(...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    func.apply(this, args);
                }, wait);
            };
        }

        let groupFocus = (e) => {
            let vGroups = timeline.getVisibleGroups();
            let vItems = vGroups.reduce((res, groupId) => {
                let group = timeline.itemSet.groups[groupId];
                if (group.items) {
                    res = res.concat(Object.keys(group.items));
                }
                return res;
            }, []);
            timeline.focus(vItems);
        };
        timeline.on("scroll", debounce(groupFocus, 200));
        // Enabling the next line leads to a continuous since calling focus might scroll vertically even if it shouldn't
        // this.timeline.on("scrollSide", debounce(groupFocus, 200))

        // Handle button click
        const button = document.getElementById('kt_docs_vistimeline_group_button');
        button.addEventListener('click', e => {
            e.preventDefault();

            var a = timeline.getVisibleGroups();
            document.getElementById("visibleGroupsContainer").innerHTML = "";
            document.getElementById("visibleGroupsContainer").innerHTML += a;
        });
    </script>
@endsection
