@extends('user')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Painel</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Painel</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Usuários
            </div>
            <li class="nav-item">
                <a class="nav-link" href="{{route('usuarios.index')}}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Todos Usuários</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('usuarios.create')}}">
                    <i class="fas fa-fw fa-user-plus"></i>
                    <span>Novo Usuário</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
          

            <!-- Nav Item - Utilities Collapse Menu -->
           

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Clientes
            </div>
            <li class="nav-item">
                <a class="nav-link" href="{{route('clientes.index')}}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Todos Clientes</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('clientes.create')}}">
                    <i class="fas fa-fw fa-folder-plus"></i>
                    <span>Novo Cliente</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
          

            <!-- Nav Item - Charts -->
          
            <!-- Nav Item - Tables -->
           

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    
                        <!-- Nav Item - Alerts -->
                       

                        <!-- Nav Item - Messages -->
                     
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <img class="img-profile rounded-circle" src="../img/user.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                
                                <a class="dropdown-item" href="/logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Clientes</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de Clientes</h6>
                            @include('flash::message')
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>CPF</th>
                                            <th>RG</th>
                                            <th>Data/Hora Cadastro</th>
                                            <th>Nascimento</th>
                                            <th>Telefone</th>
                                            <th>Natural de:</th>
                                            <th>Criado Por:</th>
                                            <th>Data/Hora Atualização</th>
                                            <th>Atualizado Por:</th>
                                            <th>Editar:</th>
                                            <th>Excluir:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($clientes as $cliente)
                                        <tr>
                                            <td>{{$cliente->name}}</td>
                                            <td>{{$cliente->cpf}}</td>
                                            <td>{{$cliente->rg}}</td>
                                            <td>{{$cliente->created_at->format('d-m-Y h:i')}}</td>
                                            <td>{{$cliente->data_nascimento}}</td>
                                            <td>{{$cliente->telefone}}</td>
                                            <td>{{$cliente->local_nascimento}}</td>
                                            <td>{{$cliente->usuario_cadastro}}</td>
                                            <td>{{$cliente->updated_at->format('d-m-Y h:i')}}</td>
                                            <td>{{$cliente->usuario_update}}</td>
                                            <td><a href="{{route('clientes.show', ['cliente' => $cliente->id])}}" class="btn btn-info">Editar</a></td>
                                            <td>
                                                <form action="{{route('clientes.destroy', ['cliente' => $cliente->id])}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">EXCLUIR</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        @endforelse

                                    </tbody>
                                </table>
                                {{$clientes->links()}}
                                <a href="{{route('clientes.create')}}" class="btn btn-info"> Novo Cliente</a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy;</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->

</body>



</html>