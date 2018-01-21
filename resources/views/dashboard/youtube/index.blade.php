@extends('dashboard.template')
@section('content')
@include('dashboard.script.jquery_datatables')
<style>
    .table.dataTable tbody tr {
        background-color: rgba(173, 167, 167, 0.27);
    }
</style>
@include('dashboard.script.jquery_datatables')
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="row">
                <div class="col-md-3 animated bounceInLeft">
                    <h2><a href="{{route('tube.create')}}" data-toggle="tooltip" data-placement="top" title="Criar novo vídeo do You Tube"><i class="fa fa-plus" aria-hidden="true"></i></a></h2>
                </div>
                <div class="col-md-6 col-xs-12">

                    @if(Session::has('msg'))
                    <div id="msg" class="alert alert-success animated bounceInRight"><strong> <center>{{Session::get('msg')}}</center></strong></div>
                    @elseif(Session::has('error'))
                    <div id="msg" class="alert alert-danger animated bounceInRight"><strong> <center>{{Session::get('error')}}</center></strong></div>
                    @endif
                </div>
                <div class="col-md-12 col-xs-12 table">
                    <table id="datatables" class="table table-hover table-condensed" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Titulo</th>
                                <th>status</th>
                                <th>Criado</th>
                                <th>Ações</th>

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>    
    </div>
    <script type="text/javascript">

        $('#datatables').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
            },
            processing: true,
            serverSide: true,
            ajax: "{{route('tube.datatables')}}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'titulo', name: 'titulo'},
                {data: 'status', name: 'status'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    </script>

</section>

@stop