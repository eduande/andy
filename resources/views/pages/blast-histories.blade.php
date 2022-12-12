<x-layout-dashboard title="Auto Replies">
  
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

         
             
          </div>
          <div class="card-body">
              <table id="datatable1" class="display" style="width:100%">
                  <thead>
                      <tr>
                          <th>Receptor</th>
                          <th>Estado</th>
                        <th>Última actualización</th>
                          {{-- <th class="d-flex justify-content-center">Acción</th> --}}
                      </tr>
                  </thead>
                  <tbody>
                     @foreach ($histories as $history)
                         
                     <tr>
                        <td>{{$history->receiver}}</td>
                        <td>
                            @php
                                if($history->status == 'pending')
                                {
                                    echo '<span class="badge badge-warning">Pendiente</span>';
                                }
                                elseif($history->status == 'success')
                                {
                                    echo '<span class="badge badge-success">Éxito</span>';
                                }
                                elseif($history->status == 'failed')
                                {
                                    echo '<span class="badge badge-danger">Fallido</span>';
                                }
                            @endphp
                            </td>
                        <td>{{$history->updated_at}}</td>
                       
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



    <script src="{{asset('js/pages/datatables.js')}}"></script>
    <script src="{{asset('js/pages/select2.js')}}"></script>
    <script src="{{asset('plugins/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
  <script src="{{asset('js/autoreply.js')}}"></script>
</x-layout-dashboard>





