<nav id="sidebar" class="sidebar" >
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="">
          <span class="align-middle">MyTicket</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                {{__('text.pages')}}
            </li>
            <li class="sidebar-item">
                <a href="#dashboard" data-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
                <ul id="dashboard" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{URL::to('/home')}}">Live Dashboard</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="">Finanças</a></li>
                </ul>
            </li>
           
            <li class="sidebar-header">
               Gestão
            </li>
            
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('user.index')}}">
                <i class="align-middle" data-feather="users"></i> <span class="align-middle">Usuários</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('events.index')}}">
                <i class="align-middle" data-feather="users"></i> <span class="align-middle">Eventos</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('category.index')}}">
                <i class="align-middle" data-feather="users"></i> <span class="align-middle">Categoria</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#config" data-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Configurações</span>
                </a>
                <ul id="config" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('city.index')}}">Cidades</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('province.index')}}">Províncias</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('gender.index')}}">Sexo</a></li>
                </ul>
            </li>
       

                  
          

            

          
        </ul>

        <!--<div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <strong class="d-inline-block mb-2">Upgrade to Pro</strong>
                <div class="mb-3 text-sm">
                    Are you looking for more components? Check out our premium version.
                </div>
                <a href="https://adminkit.io/pricing" target="_blank" class="btn btn-primary btn-block">Upgrade to Pro</a>
            </div>
        </div>-->
    </div>
</nav>