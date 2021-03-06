@extends('dashboard.template')
@section('content')
@include('dashboard.script.jquery_datatables')
<style type="text/css">
      .table.dataTable tbody tr {
        background-color: rgba(173, 167, 167, 0.27);
    }
</style>
<!-- App scripts -->
<div class="section">
    <div class="col-md-12">
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-3 animated bounceInLeft">
                            <h2><a href="{{route('eventos.create')}}" data-toggle="tooltip" data-placement="top" title="Novo Evento"><i class="fa fa-plus" aria-hidden="true"></i></a></h2> 
                        </div>
                        <div class="col-md-4 col-xs-12">

                            @if(Session::has('msg'))
                            <div id="msg" class="alert alert-success animated bounceInRight"><strong> <center>{{Session::get('msg')}}</center></strong></div>
                            @elseif(Session::has('error'))
                            <div id="msg" class="alert alert-danger animated bounceInRight"><strong> <center>{{Session::get('msg')}}</center></strong></div>
                            @endif
                        </div>
                        <div class="col-md-12 col-xs-12 table">
                            <table id="datatables" class="table table-hover table-condensed" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Titulo</th>
                                        <th>Data Inicio</th>
                                        <th>Data Fim</th>
                                        <th>Visualizações</th>
                                        <th>Status</th>
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
                    ajax: "{{route('eventos.datatables')}}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'titulo', name: 'titulo'},
                        {data: 'data_inicio', name: 'data_inicio'},
                        {data: 'data_fim', name: 'data_fim'},
                        {data: 'visualizacao', name: 'visualizacao'},
                        {data: 'status', name: 'status'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });
            </script>

        </section>
    </div>
</div>
@stop