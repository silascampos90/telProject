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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name}}</span>
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
                            <h6 class="m-0 font-weight-bold text-primary">Novo Cliente</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="col-md-4" style="margin: auto">


                                    <div class="card card-container">
                                        <p id="profile-name" class="profile-name-card"></p>
                                        <form action="{{route('clientes.store')}}" method="post">
                                            <div class="form-group">
                                                @csrf
                                                <input type="hidden" name="usuario_cadastro" value="{{Auth::user()->id}}">
                                                <label for="">Nome</label>
                                                <input type="text" class="form-control" name="name" required>
                                                <label for="">CPF</label>
                                                <input type="text" class="form-control" name="cpf" required>
                                                <label for="">RG</label><span id="rg-span" style="color:brown"> - Campo Obrigatório*</span>
                                                <input id="idRg" type="text" class="form-control" name="rg" >
                                                <label for="">Naturalidade:</label>
                                                <select id="idNascimento" class="form-control" name="local_nascimento" required>
                                                    <option value="ba">BA</option>
                                                    <option value="sp">SP</option>
                                                </select>
                                               
                                                <label for="">Data de Nascimento</label>
                                                <input id="idDate" type="date" class="form-control" name="data_nascimento" required>
                                                <label for="">Telefone</label>
                                                <input type="text" class="form-control" name="telefone" required>
                                                
                                            </div>
                                            <button type="submit" class="btn btn-success">Criar Cliente</button>
                                        </form>
                                    </div>
                                </div>
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


    <!-- Bootstrap core JavaScript-->

</body>



</html>