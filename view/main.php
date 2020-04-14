<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Dashboard - SB Admin</title>
    <link href="view/css/styles.css" type="text/css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
          crossorigin="anonymous"/>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.15.0/css/mdb.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
            crossorigin="anonymous"></script>
    <style>
        .contextMenu {
            display: none;
            z-index: 100;
            position: absolute;
            background: #fff;
            box-shadow: 3px 3px 10px #5a5a5a;
            padding: 5px;
        }

        .menu {
            cursor: pointer;
        }

        .contextMenu div {
            display: block;
            /*width: 200px;*/
        }

        .contextMenu div:hover {
            background: lightgray;
            cursor: pointer;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <div class="col-10">
        <a class="navbar-brand" href="#">BeeJee ToDo</a>
    </div><!-- Navbar Search-->
    <!-- Navbar-->
    <div class="col-2" style="float: right">
        <div>
            <button type="button" class="btn btn-primary btn-sm active"  data-toggle="modal" data-target="#loginModal" data-whatever="@getbootstrap">Login</button>
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="loginModalLabel">Создать задачу</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="/todos" id="sign-in-form">

                            <div class="modal-body">
                                <div class="alert alert-danger" role="alert" id="message">

                                </div>

                                <div class="form-group">
                                    <label for="user-name" class="col-form-label">Имя пользователя</label>
                                    <input type="text" class="form-control" id="user-name" required>
                                </div>
                                <div class="form-group">
                                    <label for="user-password" class="col-form-label">Пароль</label>
                                    <input type="password" class="form-control" id="user-password" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="sign-in">Sign in</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>

            <div class="container-fluid">
                <h1 class="mt-4">Todos</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Todos</li>
                </ol>
                <div>
                    <button type="button" class="btn btn-primary btn-sm active"  data-toggle="modal" data-target="#createModal" data-whatever="@getbootstrap">Создать задачу</button>
                    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createModalLabel">Создать задачу</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" action="/todos" id="create-task-form">

                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">имя пользователя</label>
                                            <input type="text" class="form-control" id="recipient-name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-email" class="col-form-label">Email</label>
                                            <input type="email" class="form-control" id="recipient-email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Текст задачи</label>
                                            <textarea class="form-control" id="message-text" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="create-task">Создать задачу</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="todos" width="100%" cellspacing="0">
                                <thead>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2019</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
    <script src="/view/js/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="/view/assets/demo/datatables-demo.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
        $(function () {
            const signInForm = $("#sign-in-form");
            const taskTable = $('#todos').DataTable({
                searching: false,
                bLengthChange: false,
                pageLength:3,
                ordering: true,
                "processing": true,
                "serverSide": true,
                ajax: 'todos',
                columns: [
                    {title: '#', data: 'id'},
                    {title: 'имя пользователя', data: 'username'},
                    {title: 'email', data: 'email'},
                    {title: 'текст задачи', data: 'task'},
                    {title: 'статус', data: 'status'},
                ],
                columnDefs: [
                    {
                        orderable: false,
                        targets: 0,
                        "render": function (data, type, row) {
                            return row.id
                        },
                    },
                    {
                        orderable: true,
                        targets: 1,
                        "render": function (data, type, row) {
                            return row.username
                        },
                    },
                    {
                        orderable: true,
                        targets: 2,
                        "render": function (data, type, row) {
                            return row.email
                        },
                    },
                    {
                        orderable: true,
                        targets: 3,
                        "render": function (data, type, row) {
                            return row.task
                        },
                    },
                    {
                        orderable: true,
                        targets: 4,
                        "render": function (data, type, row) {
                            let contText = row.status ? "выполнено" : "не выполнено"
                            if (row.is_modified) {
                                contText += ", отредактировано администратором";
                            }
                            return contText
                        },
                    },
                ]
            });
            $("#message").hide();
            $("#create-task-form").submit(function (e) {
                e.preventDefault();
                let data = {
                    username:$("#recipient-name").val(),
                    email:$("#recipient-email").val(),
                    task: $("#message-text").val()
                }
                $.ajax({
                    method:"post",
                    url:"/todos",
                    data: data
                }).done(function (response) {
                    alert("Задача успешно добавлено");
                    window.location = "/";
                })
            })

            $(signInForm).submit(function (e) {
                e.preventDefault();
                let data = {
                    login: $(signInForm).find("#user-name").val(),
                    password: $(signInForm).find("#user-password").val(),
                    action: "login"
                };
                $.ajax({
                    method: "POST",
                    url: "user",
                    data: data
                }).done(function (response) {
                    response = JSON.parse(response);

                    if(response.status){
                        window.location.href = "admin"
                    }
                    else{
                        $("#message").text(response.message);
                        $("#message").show();
                    }
                })
            })
        })
    </script>
</body>
</html>
