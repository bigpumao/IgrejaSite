<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Recados</h4>
            </div>
            <div class="modal-body">
                @inject('chat' , 'App\User')

                <div class="container">

                    <div class="col-md-6">
                        @foreach($chat->all() as $user)

                            <div class="col-md-4" style="margin-top: 10px;">
                                <a href="#" onclick="chat({{$user->id}})">
                                    <img src="/uploads/avatars/{{$user->avatar}}" height="70" width="70"
                                         class="img-circle" alt="">
                                    <div class="row">

                                        <strong>{{$user->name}}</strong>
                                    </div>
                                </a>
                            </div>

                        @endforeach
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
            </div>
        </div>

    </div>
</div>