@extends('layouts.contentNavbarLayout')

@section('title', 'User Register')

@section('vendor-styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-fixedcolumns-bs5/fixedcolumns.bootstrap5.css') }}"/>
@endsection

@section('vendor-scripts')
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
@endsection

@section('page-scripts')
    <script type="text/javascript">
        function formatDateTime(dateString) {
            if (!dateString) return '';

            let date = new Date(dateString);

            const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

            let day = date.getDate();
            let month = months[date.getMonth()];
            let year = date.getFullYear();

            let hour = date.getHours().toString().padStart(2, '0');
            let minute = date.getMinutes().toString().padStart(2, '0');

            return `${day}-${month}-${year} ${hour}:${minute}`;
        }

        $('.datatables-user-register').DataTable({
            serverSide: true,
            ajax: '/users/register/data',
            searching: true,
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                {
                    data: 'email_verified_at',
                    name: 'email_verified_at',
                    render: function(data) {
                        return formatDateTime(data);
                    }
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    render: function(data) {
                        return formatDateTime(data);
                    }
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function (data) {
                        const isActive = data === '1';
                        return `<span class="badge ${isActive ? 'bg-label-success' : 'bg-label-danger'}">${isActive ? 'Active' : 'Inactive'}</span>`;
                    }
                },
                {
                    data: 'id', name: 'id',
                    render: function (data, type, row) {
                        return `
                            <div class="d-inline-block text-nowrap">
                                <button class="btn btn-text-secondary rounded-pill waves-effect btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="icon-base ti tabler-dots-vertical icon-22px"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end m-0">
                                  <a href="javascript:void(0);" class="dropdown-item">View</a>
                                  <a href="javascript:void(0);" class="dropdown-item">Suspend</a>
                                </div>
                            </div>
                        `;
                    }
                },
            ],
            columnDefs: [{
                searchable: false,
                orderable: false,
                targets: -1
            }],
            scrollX: true,
            fixedColumns: {
                right: 1,
            },
            layout: {
                topStart: {
                    rowClass: "card-header d-flex border-top rounded-0 flex-wrap py-0 flex-column flex-md-row align-items-start",
                    features: [
                        {
                            search: {
                                className: "me-5 ms-n4 pe-5 mb-n6 mb-md-0",
                                placeholder: "Search User Register",
                                text: "_INPUT_",
                            },
                        },
                    ],
                },
                topEnd: {
                    rowClass: "row m-3 my-0 justify-content-between",
                    features: [
                        {
                            pageLength: { menu: [10, 25, 50, 100], text: "_MENU_" },
                            buttons: [
                                {
                                    extend: "collection",
                                    className: "btn btn-label-secondary dropdown-toggle",
                                    text: '<span class="d-flex align-items-center gap-1"><i class="icon-base ti tabler-upload icon-xs"></i> <span class="d-sm-inline-block">Export</span></span>',
                                    buttons: [
                                        {
                                            extend: "csv",
                                            text: '<span class="d-flex align-items-center"><i class="icon-base ti tabler-file me-1"></i>Csv</span>',
                                            className: "dropdown-item"
                                        },
                                        {
                                            extend: "excel",
                                            text: '<span class="d-flex align-items-center"><i class="icon-base ti tabler-upload me-1"></i>Excel</span>',
                                            className: "dropdown-item"
                                        },
                                        {
                                            extend: "copy",
                                            text: '<i class="icon-base ti tabler-copy me-1"></i>Copy',
                                            className: "dropdown-item"
                                        },
                                    ],
                                }
                            ],
                        },
                    ],
                },
                bottomStart: {
                    rowClass: "row mx-3 justify-content-between",
                    features: ["info"],
                },
                bottomEnd: { paging: { firstLast: false } },
            },
            language: {
                paginate: {
                    next: '<i class="icon-base ti tabler-chevron-right scaleX-n1-rtl icon-18px"></i>',
                    previous: '<i class="icon-base ti tabler-chevron-left scaleX-n1-rtl icon-18px"></i>'
                },
            },
        });
        [
            { selector: ".dt-buttons .btn", classToRemove: "btn-secondary" },
            {
                selector: ".dt-buttons",
                classToRemove: "flex-wrap",
                classToAdd: "mb-sm-0 mb-0"
            },
            {
                selector: ".dt-search .form-control",
                classToRemove: "form-control-sm",
                classToAdd: "ms-0 w-100",
            },
            { selector: ".dt-search", classToAdd: "mb-0 mb-md-6" },
            {
                selector: ".dt-length .form-select",
                classToRemove: "form-select-sm",
                classToAdd: "ms-0"
            },
            {
                selector: ".dt-layout-end",
                classToRemove: "justify-content-between",
                classToAdd: "justify-content-md-between justify-content-center d-flex gap-2 mb-md-0 mb-0 mt-0",
            },
            { selector: ".dt-layout-start", classToAdd: "mt-0" },
            { selector: ".dt-layout-table", classToRemove: "row mt-2" },
            {
                selector: ".dt-layout-full",
                classToRemove: "col-md col-12",
                classToAdd: "table-responsive",
            },
        ].forEach(({ selector: e, classToRemove: n, classToAdd: a }) => {
            document.querySelectorAll(e).forEach((t) => {
                n && n.split(" ").forEach((e) => t.classList.remove(e))
                a && a.split(" ").forEach((e) => t.classList.add(e));
            });
        });
    </script>
@endsection

@section('content')
    <div class="card">
        <div class="card-datatable table-responsive text-nowrap">
            <table class="datatables-user-register table table-bordered">
                <thead class="border-top">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Email Verified</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
