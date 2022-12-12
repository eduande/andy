<x-layout-dashboard title="Contacts">
    <div class="app-content">
        <link href="{{asset('plugins/datatables/datatables.min.css')}}" rel="stylesheet">
        <link href="{{asset('plugins/select2/css/select2.css')}}" rel="stylesheet">
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
              
               
                <div class="card-header d-flex justify-content-between">
                    <form action="{{route('deleteAll')}}" method="POST">
                        @method('delete')
                        @csrf
                        <input type="hidden" name="tag" value="{{$tag->id}}">
                        <button type="submit" name="deleteAll" class="btn btn-danger "><i class="material-icons-outlined">contacts</i>Eliminar todos</button>
                   </form>
                   {{--   <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#selectNomor"><i class="material-icons-outlined">contacts</i>Generate Kontak</button> --}}
                    <div class="d-flex justify-content-right">
                        <form action="{{route('exportContact')}}" method="POST">
                            @csrf
                            <input type="hidden" name="tag" value="{{$tag->id}}">
                            <button type="submit" name="" class="btn btn-warning "><i class="material-icons">download</i>Exportar (xlsx)</button>
                        </form>
                        <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#importContacts"><i class="material-icons-outlined">upload</i>Importar (xlsx)</button>
                        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#addNumber"><i class="material-icons-outlined">add</i>Agregar</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h5 class="card-title">Listas de contactos de <span class="badge badge-primary">{{$tag->name}}</span></h5>
                                <!-- <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#selectNomor"><i class="material-icons-outlined">contacts</i>Hapus semua</button>
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#selectNomor"><i class="material-icons-outlined">contacts</i>Generate Kontak</button>
                                <div class="d-flex justify-content-right">
                                    <form action="" method="POST">
                                        <button type="submit" name="export" class="btn btn-warning "><i class="material-icons">download</i>Export (xlsx)</button>
                                    </form>
                                    <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#importExcel"><i class="material-icons-outlined">upload</i>Import (xlsx)</button>
                                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#addNumber"><i class="material-icons-outlined">add</i>Tambah</button>
                                </div> -->
                            </div>
                            <div class="card-body">
                                <table id="datatable1" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Número</th>
                                            {{-- <th>Etiqueta</th> --}}
                                            <th class="d-flex justify-content-center">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($contacts as $contact)
                                           
                                       <tr>
                                           <td>{{$contact->name}}</td>
                                           <td>{{$contact->number}}</td>
                                           {{-- <td><span class="badge badge-primary">{{$contact->tag->name}}</span></td> --}}
                                           <td>
                                               <div class="d-flex justify-content-center">
                                                   {{-- <button class="btn btn-success btn-sm mx-3">Agregar a la etiqueta</button> --}}
                                                   <form action="{{route('contactDeleteOne',$contact->id)}}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                       <input type="hidden" name="id" value="{{$contact->id}}">
                                                       <button type="submit" name="delete" class="btn btn-danger btn-sm"><i class="material-icons">delete_outline</i>Eliminar</button>
                                                    </form>
                                               </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                      
    
                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
    
                </div>
    
            </div>
        </div>
    </div>
    <div class="modal fade" id="addNumber" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar contacto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('addcontact')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                        <label for="number" class="form-label">Número</label>
                        <input type="number" name="number" class="form-control" id="number" required>
                      
                      <input type="hidden" name="tag" value="{{$tag->id}}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" name="submit" class="btn btn-primary">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="importContacts" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Importar contactos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('importContacts')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="fileContacts" class="form-label">Nombre</label>
                        <input type="file" name="fileContacts" class="form-control" id="fileContacts" required>
                      
                      <input type="hidden" name="tag" value="{{$tag->id}}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/pages/datatables.js')}}"></script>
    <script src="{{asset('js/pages/select2.js')}}"></script>
    <script src="{{asset('plugins/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
</x-layout-dashboard>