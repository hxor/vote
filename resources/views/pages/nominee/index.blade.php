@extends('layouts.app')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/datatables/datatables.min.css') }}"/>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nominee
                    <a href="{{ route('nominee.create') }}" class="btn btn-primary pull-right modal-show" style="margin-top: -8px;" title="Create Data"><i class="icon-plus"></i> Create</a>
                </div>
                <div class="panel-body">
                        <table id="datatable" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('foot')
    <script src="{{ asset('js/crud.js') }}"></script>
    <!-- Sweetalert2 -->
    <script src="{{ asset('libs/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('libs/datatables/datatables.min.js') }}"></script>
    <script>
        $('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('table.nominee') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'number_id', name: 'number_id'},
                {data: 'name', name: 'name'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    </script>
@endsection
