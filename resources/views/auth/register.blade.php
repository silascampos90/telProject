@extends('user')


<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Novo Usuário !</h1>
                                    </div>
                                    <form action="{{route('register')}}" method="post">
                                        <div class="form-group">
                                            @csrf
                                            <label for="">Nome</label>
                                            <input type="text" class="form-control" name="name" required>
                                            <label for="">E-mail</label>
                                            <input type="email" class="form-control" name="email" required>
                                            <label for="">Senha</label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                        <button type="submit" class="btn btn-success">Criar Usuário</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->

</body>

</html>