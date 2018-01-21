@extends('dashboard.template')
@section('content')
    @include('dashboard.script.jquery_datatables')
    <style>
        .table.dataTable tbody tr {
            background-color: rgba(173, 167, 167, 0.27);
        }
    </style>
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="row">
                    @can('acl-permission', $alc)
                        <div class="col-md-3 animated bounceInLeft">
                            <h2><a href="{{route('user.create')}}" data-toggle="tooltip" data-placement="top"
                                   title="Novo Usuário"><i class="fa fa-plus" aria-hidden="true"></i></a></h2>
                        </div>
                    @endcan
                    <div class="col-md-6 col-xs-12">

                        @if(Session::has('msg'))
                            <div id="msg" class="alert alert-success animated bounceInRight"><strong>
                                    <center>{{Session::get('msg')}}</center>
                                </strong></div>
                        @elseif(Session::has('error'))
                            <div id="msg" class="alert alert-danger animated bounceInRight"><strong>
                                    <center>{{Session::get('error')}}</center>
                                </strong></div>
                        @endif
                    </div>
                    <div class="col-md-12 col-xs-12 table">
                        <table id="datatables" class="table table-hover table-condensed" style="width:100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>E-Mail</th>
                                <th>Admin</th>
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
                ajax: "{{route('user.datatables')}}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'admin', name: 'admin'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        </script>

    </section>



    <section class="widget widget-tabs">

        <div class="col-md-7">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">

                    <li><a href="#timeline" data-toggle="tab">Contato</a></li>
                    {{--<li><a href="#settings" data-toggle="tab">Biografias</a></li>--}}
                </ul>
                <div class="tab-content">
                {{--<div class="actve tab-pane" id="activity">--}}


                {{--</div>--}}
                <!-- /.tab-pane -->
                    <div class="tab-pane" id="timeline">
                        @foreach($users as $user)
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-md-2">
                                    <img src="/uploads/avatars/{{$user->avatar}}" alt="" width="70" height="70">
                                </div>
                                @foreach($user->contatos as $contato)
                                    <div class="col-md-3">

                                        <small>Telefone: {{$contato->telefone}}</small>

                                    </div>
                                    <div class="col-md-6">
                                        <small>Endereço: {{$contato->endereco}}</small>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                        {{$users->links()}}
                    </div>
                    <!-- /.tab-pane -->


                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
    </section>
@endsection