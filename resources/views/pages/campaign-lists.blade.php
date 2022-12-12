<x-layout-dashboard title="Campaign List">
  
    <div class="app-content">
        <link href="{{asset('plugins/datatables/datatables.min.css')}}" rel="stylesheet">
        <link href="{{asset('plugins/select2/css/select2.css')}}" rel="stylesheet">
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
               
           
                
    
<div class="row mt-4">
  <div class="col">
      <div class="card">
          <div class="card-header d-flex justify-content-between">
          <h5 class="card-title">Historias</h5>

          

          
          <!--<input class="btn btn-primary btn-sm" type="button" onclick="history.back()" name="volver atrás" value="Enviar Campaña ">
-->
          <div class="d-flex">
          
            <form action="{{route('campaigns.delete.all')}}" method="POST">
              @method('delete')
              @csrf
              <button type="submit" class="btn btn-danger btn-sm">Eliminar todo</button>
            </form>
          </div>
             
          </div>
          <div class="card-body">
              <table id="datatable1" class="display" style="width:100%">
                  <thead>
                      <tr>
                          <th>Remitente</th>
                          <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Receptor</th>
                            <th>Mensaje</th>
                            <th>Calendario</th>
                          <th>Estado</th>
                          {{-- <th class="d-flex justify-content-center">Action</th> --}}
                      </tr>
                  </thead>
                  <tbody>
                     @foreach ($campaigns as $campaign)
                         
                     <tr>
                            <td>{{$campaign->sender}}</td>
                            <td>{{$campaign->name}}</td>
                            <td><span class="badge badge-secondary badge-sm text-warning">{{$campaign->type}}</span></td>
                            <td>
                                {{$campaign->blasts_count}} <span class="badge badge-primary">Total</span>
                                <br>
                                {{$campaign->blasts_success}} <span class="badge badge-success">Éxito</span>
                                <br>
                                {{$campaign->blasts_failed}} <span class="badge badge-danger">Fallido</span>
                                <br>
                                {{$campaign->blasts_pending}} <span class="badge badge-warning">Esperando</span>
                                {{-- button view blasts list --}}
                                <br>
                                <a href="{{route('blastHistories',$campaign->id)}}" class="btn btn-primary btn-sm">Ver todo</a>
                            </td>
                             <td><button class="btn btn-primary" onclick="viewCampaignMessage({{$campaign->id}})">Ver</button></td>
                                       
                            <td>{{$campaign->schedule ?? '-'}}</td>
                            <td >
                                {{-- if status success badge success, if waiting badge warning if failed badge danger --}}
                                <span class="badge badge-{{$campaign->status === 'finish' ? 'success' : ($campaign->status === 'waiting' ? 'warning' : ($campaign->status === 'failed' ? 'danger' : 'primary'))}}">{{$campaign->status}}</span>
                                {{--  icon pause --}}
                                @if ($campaign->status === 'processing' || $campaign->status === 'waiting')
                                <button onclick="pauseCampaign({{$campaign->id}})" class="btn btn-warning btn-sm"><i class="material-icons">pause</i></button>
                                @endif
                                {{-- icon play --}}
                                @if ($campaign->status === 'paused')
                                <button onclick="resumeCampaign({{$campaign->id}})" class="btn btn-success btn-sm"><i class="material-icons">play_arrow</i></button>
                                @endif
                                {{-- icon delete --}}

                            </td>
                                
                            {{-- <td class="d-flex justify-content-center">
                                <a href="{{route('editBlast',$campaign->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                <form action="{{route('deleteBlast',$campaign->id)}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td> --}}
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
<div class="modal fade" id="modalView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Vista previa del mensaje</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body previewCampaignMessage">
                 </div>
        </div>
    </div>
</div>


    <script src="{{asset('js/pages/datatables.js')}}"></script>
    <script src="{{asset('js/pages/select2.js')}}"></script>
    <script src="{{asset('plugins/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
  <script src="{{asset('js/autoreply.js')}}"></script>
  <script>
    function viewCampaignMessage(id) {
    $.ajax({
        url: `/campaign/show/${id}`,
        type: 'GET',
        dataType: 'html',
        success: (result) => {

            $('.previewCampaignMessage').html(result);
            $('#modalView').modal('show')
        },
        error: (error) => {
            console.log(error);
        }
    })
    // 

    //
    
}
function pauseCampaign(id) {
$.ajax({
    url: `/campaign/pause/${id}`,
    type: 'POST',
    dataType: 'json',
    success: (result) => {
        location.reload();
    },
    error: (error) => {
        console.log(error);
    }
})
}

function resumeCampaign(id) {
$.ajax({
    url: `/campaign/resume/${id}`,
    type: 'POST',
    dataType: 'json',
    success: (result) => {
        location.reload();
    },
    error: (error) => {
        console.log(error);
    }
})
}

  </script>
</x-layout-dashboard>





