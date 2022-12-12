<x-layout-dashboard title="Auto Replies">
  
    <div class="app-content">
        {{-- <link href="{{asset('plugins/datatables/datatables.min.css')}}" rel="stylesheet"> --}}
        {{-- <link href="{{asset('plugins/select2/css/select2.css')}}" rel="stylesheet"> --}}
        <link href="{{asset('css/custom.css')}}" rel="stylesheet">
        <div class="content-wrapper">
            <div class="container">
                @if (session()->has('alert'))
                <x-alert>
                    @slot('type',session('alert')['type'])
                    @slot('msg',session('alert')['msg'])
                </x-alert>
             @endif
             @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
       
           
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                 
                                <h5 class="card-title">Listas de respuesta automática {{Session::get('selectedDevice')}} </h5>
                                <div class="d-flex ">
                                   
                                    @if(Session::has('selectedDevice'))

                                   
                                    <form action="{{route('deleteAllAutoreply')}}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" name="delete" class="btn btn-danger btn-xs"><i class="material-icons">delete_outline</i>Eliminar todos</button>
                                    </form>
                                    <button type="button" class="btn btn-primary btn-xs mx-4" data-bs-toggle="modal" data-bs-target="#addAutoRespond"><i class="material-icons-outlined">add</i>Agregar</button>
                                    @endif
                                </div>
                                 </div>
                            <div class="card-body rounded-lg">
                                <table id="datatable1" class="display table table-striped table-bordered" style="width:100%">
                                    {{-- si existe la variable de respuestas automáticas para cada uno, de lo contrario, seleccione el dispositivo --}}
                                  
                                     <thead class="">
                                        <tr>
                                           
                                            <th>Palabra clave</th>
                                            <th>Detalles</th>
                                           <th>Tipo</th>

                                            <th>Responder</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                     

                                        @if(Session::has('selectedDevice'))
                                       @foreach ($autoreplies as $autoreply)

                                       <tr>
    
                                       
                                        <td>{{$autoreply['keyword']}} </td>
                                        <td>Responderá si la palabra clave <span class="badge badge-success">{{$autoreply['type_keyword']}}</span> & cuando el remitente es <span class="badge badge-warning">{{$autoreply['reply_when']}}</span> </td>
                                        <td>{{$autoreply['type']}}</td>
                                       <td><button class="btn btn-primary" onclick="viewReply({{$autoreply->id}})">Ver</button></td>
                                        <td> 
                                            <form action={{route('autoreply.delete')}} method="POST">
                                                @method('delete')
                                                @csrf
                                                <input type="hidden" name="id" value="{{$autoreply->id}}">
                                                <button type="submit" name="delete" class="btn btn-danger btn-sm"><i class="material-icons">delete_outline</i></button>
                                            </form>

                                        </td>
                                    </tr>
                                       @endforeach
                                        @else
                                        <tr>
                                            <td colspan="4">Por favor seleccione dispositivo</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                   
                                 
    
                                </table>
                                {{-- pagination custom --}}
                                
                                <div class="d-flex">
                                    {{$autoreplies->links()}}
                                </div>
                               
                            </div>
                        </div>
                    </div>
    
                </div>
    
            </div>
        </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="addAutoRespond" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir respuesta automática</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="formautoreply">
                    @csrf
                    <label for="device" class="form-label">Cuenta Whatsapp</label>
                   @if(Session::has('selectedDevice'))
                    <input type="text" name="device" id="device" class="form-control" value="{{Session::get('selectedDevice')}}" readonly>
                    @else
                    <input type="text" name="devicee" id="device" class="form-control" value="Please select device" readonly>
                    @endif
                  
                    <div class="form-group">
                        <label for="keyword" class="form-label">Tipo de palabra clave</label><br>
                        <input type="radio" value="Equal" name="type_keyword" checkedx` class="mr-2"><label class="form-label">Igual</label>
                        <input type="radio" value="Contain" name="type_keyword"><label class="form-label">Contiene</label>
                    </div>
                    <div class="form-group">
                        <label for="keyword" class="form-label">Solo responde cuando el remitente es </label><br>
                        <input type="radio" value="Group" name="reply_when" class="mr-2"><label class="form-label">Grupo</label>
                        <input type="radio" value="Personal" name="reply_when"><label class="form-label">Personal</label>
                        <input type="radio" value="All" checked name="reply_when"><label class="form-label">Todos</label>
                    </div>
                    <label for="keyword" class="form-label">Palabra clave</label>
                    <input type="text" name="keyword" class="form-control" id="keyword" required>
                    <label for="type" class="form-label">Escriba respuesta</label>
                    <select name="type" id="type" class="js-states form-control" tabindex="-1" required>
                      <option selected  disabled>Seleccione uno</option>
                        <option value="text">Mensaje de texto</option>
                        <option value="image">Mensaje de imagen</option>
                        <option value="button">Mensaje de botón</option>
                        <option value="template">Tema Mensaje</option>
                        <option value="list">Lista Mensaje</option>
                       
                     </select>
                     <div class="ajaxplace"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" name="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Vista previa de respuesta automática</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body showReply">
                 </div>
        </div>
    </div>
</div>
<!--  -->
    {{-- <script src="{{asset('js/pages/datatables.js')}}"></script> --}}
    {{-- <script src="{{asset('js/pages/select2.js')}}"></script> --}}
    <script src="{{asset('plugins/datatables/datatables.min.js')}}"></script>
    {{-- <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script> --}}
  <script src="{{asset('js/autoreply.js')}}"></script>
 
</x-layout-dashboard>