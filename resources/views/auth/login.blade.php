<x-layout-auth>
    @slot('title','Login')
        
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">
    
        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="/">APPCHAT</a>
            </div>
           @if (session()->has('alert'))
              <x-alert>
                  @slot('type',session('alert')['type'])
                  @slot('msg',session('alert')['msg'])
              </x-alert>
           @endif
            <p class="auth-description">¿No tienes una cuenta? ? <a href="register">Registro</a></p>
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="auth-credentials m-b-xxl">
                    <label for="username" class="form-label">Nombre usuario</label>
                    <input type="text" name="username" class="form-control m-b-md" id="username" aria-describedby="username">
    
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-control" id="password" aria-describedby="password" >
                </div>
    
                <div class="auth-submit">
                    <button type="submit" name="login" class="btn btn-primary">Iniciar sesión</button>
                    {{-- <a href="#" class="auth-forgot-password float-end">¿Se te olvidó tu contraseña?</a> --}}
                </div>
            </form>
            <div class="divider"></div>
           
        </div>
    </div>
</x-layout-auth>