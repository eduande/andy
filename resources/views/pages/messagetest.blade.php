
<x-layout-dashboard title="Message Test">

    <div class="app-content">
        @if (session()->has('alert'))
        <x-alert>
            @slot('type',session('alert')['type'])
            @slot('msg',session('alert')['msg'])
        </x-alert>
     @endif
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="page-description page-description-tabbed">
                           

                            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="account-tab" data-bs-toggle="tab" data-bs-target="#text" type="button" role="tab" aria-controls="hoaccountme" aria-selected="true">Texto</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#image" type="button" role="tab" aria-controls="security" aria-selected="false">Media</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="integrations-tab" data-bs-toggle="tab" data-bs-target="#button" type="button" role="tab" aria-controls="integrations" aria-selected="false">Botón</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="integrations-tab" data-bs-toggle="tab" data-bs-target="#template" type="button" role="tab" aria-controls="integrations" aria-selected="false">Plantilla</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="integrations-tab" data-bs-toggle="tab" data-bs-target="#list" type="button" role="tab" aria-controls="integrations" aria-selected="false">Lista</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="text" role="tabpanel" aria-labelledby="account-tab">
                                <div class="card">
                                     {{-- please select deviec --}}
                                     <div class="card-body">
                                       @if(!Session::has('selectedDevice'))
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>Please select device first</strong>
                                                </div>
                                            </div>
                                        </div>
                                        @else 
                                       <h5>Mensaje de texto</h5>
                                       <div class="example-container">
                                        <div class="example-content">
                                            <form action="{{route('textMessageTest')}}" method="POST" id="formSendMsg">
                                                @csrf
                                                <label for="textmessage" class="form-label">Mensaje de texto</label>
                                                <input type="number" value={{Session::get('selectedDevice')}} name="sender" id="sender" class="form-control" readonly>
                                                   
                                                <label for="number" class="form-label">Número de destino</label>
                                                <input type="text" name="number" class="form-control" id="number" required>
                                                <label for="textmessage" class="form-label">Mensaje</label>
                                                <input type="text" name="message" class="form-control" id="textmessage" required>
                                                <button type="submit" name="sendMsg" class="btn btn-success mt-3"><i class="material-icons-outlined">send</i>Enviar</button>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="security-tab">
                                <div class="card">
                                    <div class="card-body">
                                       <h5>Mensaje multimedia </h5>
                                       <div class="example-container">
                                        <div class="example-content">
                                            <form action="{{route('imageMessageTest')}}" method="POST" id="formSendMsg">
                                                @csrf
                                                <label for="textmessage" class="form-label">Cuenta Whatsapp</label>
                                               <input type="number" value={{Session::get('selectedDevice')}} name="sender" id="sender" class="form-control" readonly>
                                                 
                                                <label for="number" class="form-label">Número de destino</label>
                                                <input type="number" name="number" class="form-control " id="number" required>

<div class="file-uploader">
    <label class="form-label mt-4">Media Url *Seleccione desde el administrador de archivos o complete el manual</label><br>
                                       <span class="text-danger text-sm">asegúrese de que la URL vaya directamente a los medios.</span>
   <div class="chose-area"></div>
</div>
{{--  radio select flex,,  --}}
<div class="form-group mt-4">
    <label class="form-label">Tipo de medio</label>
    {{-- dif flex gap 4 --}}

    <div class="d-flex ">
        
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline1" name="type" class="custom-control-input" value="image" checked>
            <label class="custom-control-label" for="customRadioInline1">Imagen (jpg,jpeg,png)</label>
        </div>
       
    </div>
</div>
   


                                               
                                                <label for="textmessage" class="form-label mt-4">Subtítulo</label>
                                                <input type="text" name="message" class="form-control" id="textmessage" required>
                                                <button type="submit" name="sendMsg" class="btn btn-success mt-3"><i class="material-icons-outlined">send</i>Enviar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="button" role="tabpanel" aria-labelledby="integrations-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Mensaje de botón</h5>
                                        <div class="example-container">
                                         <div class="example-content">
                                             <form action="{{route('buttonMessageTest')}}" method="POST" id="formSendMsg">
                                                 @csrf
                                                 <label for="textmessage" class="form-label">Cuenta Whatsapp</label>
                                                {{-- input --}}
                                                <input type="text" value={{Session::get('selectedDevice')}} name="sender" id="sender" class="form-control" readonly>
                                                 <label for="number" class="form-label">Número de destino</label>
                                                 <input type="number" name="number" class="form-control" id="number" required>
                                                 
                                                 <label for="textmessage" class="form-label">Mensaje</label>
                                                 <input type="text" name="message" class="form-control" id="textmessage" required>
                                                 <label for="footer" class="form-label">Mensaje de pie de página *opcional</label>

                                                 <input type="text" name="footer" class="form-control" id="footer" >
<div class=" file-uploader">
    <label class="form-label mt-4">Imagen *opcional</label><br>
                                      
   <div class="chose-area"></div>
</div>
                                                <button class="btn btn-sm btn-primary mt-4" type="button" id="addbutton">+ Button</button>
                                                 <div id="button-area">

                                                 </div>
                                                 <button type="submit" name="sendMsg" class="btn btn-success mt-3"><i class="material-icons-outlined">send</i>Enviar</button>
                                             </form>
                                         </div>
                                         </div>
                                     </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="template" role="tabpanel" aria-labelledby="integrations-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Mensaje de plantilla</h5>
                                        <div class="example-container">
                                         <div class="example-content">
                                             <form action="{{route('templateMessageTest')}}" method="POST" id="formSendMsg">
                                                 @csrf
                                                 <label for="textmessage" class="form-label">Cuenta Whatsapp</label>
                                                {{-- input --}}
                                                <input type="text" value={{Session::get('selectedDevice')}} name="sender" id="sender" class="form-control" readonly>
                                                 <label for="number" class="form-label">Número de destino</label>
                                                 <input type="number" name="number" class="form-control" id="number" required>
                                                 
                                                 <label for="textmessage" class="form-label">Mensaje</label>
                                                 <input type="text" name="message" class="form-control" id="textmessage" required>
                                                 <label for="footer" class="form-label">Mensaje de pie de página *opcional</label>
                                                 <input type="text" name="footer" class="form-control" id="number" >
<div class=" file-uploader">
    <label class="form-label mt-4">Imagen *opcional</label><br>
                                      
   <div class="chose-area"></div>
</div>
                                                <button class="btn btn-sm btn-primary mt-4" type="button" id="addtemplate">+ Temas</button>
                                                 <div id="template-area">

                                                 </div>
                                                 {{-- <label for="template1" class="form-label">Tema 1</label>
                                                 <input type="text" placeholder="TIPO | Tu texto aquí | URL o número de teléfono" name="template1" id="template" class="form-control">
                                                 <label for="template2" class="form-label">Tema 2</label>
                                                 <input type="text" placeholder="TIPO | Tu texto aquí | URL o número de teléfono" name="template2" id="template2" class="form-control">  --}}
                <span class="text-danger">enlace de botón de ejemplo : <span class="badge badge-secondary">url|Visitame|https://systemwebpro.com</span> <br> ejemplo botón de llamada : <span class="badge badge-secondary">call|Llámame|5582298859671</span>  <br> El tipo solo tiene dos opciones, llamada y url!</span>
<br>
                                                 <button type="submit" name="sendMsg" class="btn btn-success mt-3"><i class="material-icons-outlined">send</i>Enviar</button>
                                             </form>
                                         </div>
                                         </div>
                                        </div>
                                        @endif
                                </div>
                            </div>
                              <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="integrations-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Mensaje de lista</h5>
                                        <div class="example-container">
                                         <div class="example-content">
                                             <form action="{{route('listMessageTest')}}" method="POST" id="formSendMsg">
                                                 @csrf
                                                 <label for="textmessage" class="form-label">Cuenta Whatsapp</label>
                                                {{-- input --}}
                                                <input type="text" value={{Session::get('selectedDevice')}} name="sender" id="sender" class="form-control" readonly>
                                                 <label for="number" class="form-label">Número de destino</label>
                                                 <input type="number" name="number" class="form-control" id="number" required>
                                                 
                                                 <label for="textmessage" class="form-label">Mensaje</label>
                                                 <input type="text" name="message" class="form-control" id="textmessage" required>
                                                 <label for="footer" class="form-label">Mensaje de pie de página *opcional</label>
                                                 <input type="text" name="footer" class="form-control" id="textmessage" >
                                                 <label for="footer" class="form-label">Lista de títulos</label>
                                                 <input type="text" name="title" class="form-control" id="title" required>
                                                 <label for="buttontext" class="form-label">Botón de texto </label>

                                                 <input type="text" name="buttontext" class="form-control" id="buttontext" >

                                                <button class="btn btn-sm btn-primary mt-4" type="button" id="addList">+ Lista</button>
                                                 <div id="list-area">

                                                 </div>
                                                 <button type="submit" name="sendMsg" class="btn btn-success mt-3"><i class="material-icons-outlined">send</i>Enviar</button>
                                             </form>
                                         </div>
                                         </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout-dashboard>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    
    // when tab change, find .chose-area in active tab
    
    $('.nav-link').on('click', function(e) {
      
    
        var choseAreaImage = $('#image').find('.chose-area');
        choseAreaImage.html('');
        //find data-bs-target in this
        var target = $(this).data('bs-target');
        if(target == '#button'){
               var choseAreaImage = $('#image').find('.chose-area');
                   choseAreaImage.html('');
                   let choseAreaTemplate = $('#template').find('.chose-area');
            choseAreaTemplate.html('');
            var choseArea = $('#button').find('.chose-area');
                 choseArea.html(
            ` <div class="input-group ">
                <span class="input-group-btn">
                    <a id="imagetest" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white imagetest">
                        <i class="fa fa-picture-o"></i> Seleccionar
                        </a>
                        </span>
                        <input id="thumbnail"  class="form-control"  type="text" name="url" readonly>
                        </div>`
                        )
                        $('#imagetest').filemanager('file')
                    


        } else if(target == '#image'){
            let choseAreaButton = $('#button').find('.chose-area');
            choseAreaButton.html('');
            let choseAreaTemplate = $('#template').find('.chose-area');
            choseAreaTemplate.html('');
            var choseArea = $('#image').find('.chose-area');
            choseArea.html(
            ` <div class="input-group ">
                <span class="input-group-btn">
                    <a id="imagetest" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white imagetest">
                        <i class="fa fa-picture-o"></i> Seleccionar
                        </a>
                        </span>
                        <input id="thumbnail"  class="form-control"  type="text" name="url" required>
                        </div>`
                        )
                        $('#imagetest').filemanager('file')
        }
         else if(target == '#template'){
            let choseAreaButton = $('#button').find('.chose-area');
            choseAreaButton.html('');
            
            let choseAreaImage = $('#image').find('.chose-area');
            choseAreaImage.html('');

            var choseArea = $('#template').find('.chose-area');
            choseArea.html(
            ` <div class="input-group ">
                <span class="input-group-btn">
                    <a id="imagetest" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white imagetest">
                        <i class="fa fa-picture-o"></i> Seleccionar
                        </a>
                        </span>
                        <input id="thumbnail"  class="form-control"  type="text" name="url" >
                        </div>`
                        )
                        $('#imagetest').filemanager('file')
        }
    });

   
                    

  // add button when click addbutton maximum 3, if click addbutton more than 3, it will not add button
    $('#addbutton').click(function(){
        var button = $('#button-area').children().length;
        if(button < 3){
        $('#button-area').append('<div class="form-group"><label for="button'+(button+1)+'" class="form-label">Button '+(button+1)+'</label><input type="text" name="button['+(button+1)+']" id="button'+(button+1)+'" class="form-control" required></div>');
        }
    });
    $('#addtemplate').click(function(){
        var template = $('#template-area').children().length;
        if(template < 3){
            
        $('#template-area').append('<div class="form-group"><label for="template'+(template+1)+'" class="form-label">Template '+(template+1)+'</label><input type="text" placeholder="TIPO | Tu texto aquí | URL o número de teléfono"  name="template['+(template+1)+']" id="template'+(template+1)+'" class="form-control" required></div>');
        }
    });
   
    $('#addList').click(function(){
        var list = $('#list-area').children().length;
        if(list < 5){
            
        $('#list-area').append('<div class="form-group"><label for="list'+(list+1)+'" class="form-label">list '+(list+1)+'</label><input type="text"  name="list['+(list+1)+']" id="list'+(list+1)+'" class="form-control" required></div>');
        }
    });
   

    
</script>