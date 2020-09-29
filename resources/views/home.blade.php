@extends('layouts.app')

@section('css')
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="justify-content-center">
        <h2 class="mb-4">September</h2>
        <table class="table table-striped table-bordered logbook-datatable">
            <thead>
            <tr>
                <th>No</th>
                <th>Date</th>
                <th>Clock In</th>
                <th>Clock Out</th>
                <th>Activity</th>
                <th>Description</th>
                <th>Site Supervisor Approval</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src = "http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" defer ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>

    <script type="text/javascript">
        $(function () {
            var table = $('.logbook-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'date', name: 'date'},
                    {data: 'clock_in', name: 'clock_in'},
                    {data: 'clock_out', name: 'clock_out'},
                    {data: 'activity', name: 'activity'},
                    {data: 'desc', name: 'description'},
                    {
                        data: 'approval',
                        name: 'approval',
                    },
                ],
                // dom: 'Bfrtip',
                // buttons: [
                //     {
                //         extend : 'excel', className : 'btn-sm btn-dark'
                //     },
                //     {
                //         extend : 'pdf', className : 'btn-sm btn-dark'
                //     }
                // ],
                responsive : true
            });

        });
    </script>
@endsection
