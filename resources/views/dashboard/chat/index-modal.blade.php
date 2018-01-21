<!-- Modal -->
<div id="chat" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Recado para <p id="remetente"></p></h3>

                <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="3 New Messages" class="badge bg-light-blue">3</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts"
                            data-widget="chat-pane-toggle">
                        <i class="fa fa-comments"></i></button>
                    <button type="button" class="btn btn-box-tool" id="close"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                        <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-left" id="nome1"></span>
                            <span class="direct-chat-timestamp pull-right" id="horas">23 Jan 2:00 pm</span>
                        </div>
                        <!-- /.direct-chat-info -->
                        <div id="img"></div>
                    {{--<img class="direct-chat-img" src="/imagens/uploads/avatars/" alt="Message User Image">--}}
                    <!-- /.direct-chat-img -->
                    {{--<div class="direct-chat-text">--}}
                    {{--Aqui vai a mensagem--}}
                    {{--</div>--}}
                    <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                    {{--<div class="direct-chat-info clearfix">--}}
                    {{--<span class="direct-chat-name pull-right">Adriana</span>--}}
                    {{--<span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>--}}
                    {{--</div>--}}
                    <!-- /.direct-chat-info -->
                    {{--<img class="direct-chat-img" src="/imagens/uploads/avatars/" alt="Message User Image">--}}
                    <!-- /.direct-chat-img -->
                    {{--<div class="direct-chat-text">--}}
                    {{--Aqui vai a mensagem--}}
                    {{--</div>--}}
                    <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
                </div>
                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts">
                    <ul class="contacts-list">
                        {{--<li>--}}
                            {{--<a href="#">--}}
                                {{--<img class="contacts-list-img" src="../dist/img/user1-128x128.jpg" alt="User Image">--}}

                                {{--<div class="contacts-list-info">--}}
                                    {{--<span class="contacts-list-name">--}}
                                      {{--Count Dracula--}}
                                      {{--<small class="contacts-list-date pull-right">2/28/2015</small>--}}
                                    {{--</span>--}}
                                    {{--<span class="contacts-list-msg">How have you been? I was...</span>--}}
                                {{--</div>--}}
                                {{--<!-- /.contacts-list-info -->--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        <!-- End Contact Item -->
                    </ul>
                    <!-- /.contatcts-list -->
                </div>
                <!-- /.direct-chat-pane -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <form action="">
                    {{csrf_field()}}
                    <div class="input-group">
                        <input type="text" name="message" placeholder="Digite aqui sua mensagem" class="form-control" id="mensagem">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-primary btn-flat" id="enviar">Enviar</button>
                        </span>
                    </div>
                </form>
            </div>
            <!-- /.box-footer-->
        </div>

    </div>
</div>