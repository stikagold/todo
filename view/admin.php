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
<nav class="sb-topnav navbar navbar-dark bg-dark">
    <div class="col-4">
        <a class="navbar-brand" href="#">BeeJee ToDo</a>
    </div><!-- Navbar Search-->
    <!-- Navbar-->
    <div class="col-8">
        <ul class="navbar-nav ml-auto ml-md-0" style="float: right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="/" id="logout">Logout</a>
                </div>
            </li>
        </ul>
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
    <div id="task-context" data-id="" class="contextMenu">
        <div data-context-action="edit">
            <button type="button" class="btn btn-primary btn-sm active" data-toggle="modal" data-target="#editModal"
                    data-whatever="@getbootstrap">Редактировать задачу
            </button>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
         aria-hidden="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Редактировать задачу</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="/todos" id="edit-task-form">

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Текст задачи</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="edit-task">Редактировать задачу</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
    <script src="/view/js/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="/view/assets/demo/datatables-demo.js"></script>

    <script>
        $(function () {

            var taskContext = $("#task-context");
            var currentTask = null;
            var editModal = $("#editModal");
            const taskTable = $('#todos').DataTable({
                ordering: true,
                "processing": true,
                "serverSide": true,
                ajax: 'todos',
                columns: [
                    {title: '#', data: 'id'},
                    {title: 'User name', data: 'username'},
                    {title: 'Email', data: 'email'},
                    {title: 'ToDo', data: 'task'},
                    {title: 'Status', data: 'status'},
                    {title: 'Edit', data: ''},
                    {title: 'Done', data: 'is_modified'},
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
                    {
                        orderable: false,
                        targets: 5,
                        "render": function (data, type, row) {
                            return '<button type = "button" class="btn btn-primary btn-sm active edit-message"  data-toggle="modal" data-target="#editModal" data-whatever="@getbootstrap">Отредактировать задачу </button>'
                        },
                    },
                    {
                        orderable: false,
                        targets: 6,
                        "render": function (data, type, row) {
                            if (!row.status)
                                return '<input type="checkbox" class="status_checkbox" data-id=' + row.id + '>';
                            else return ""
                        },

                    },
                ]
            });

            $('#todos').on('click', '.edit-message', function (event) {
                //get row data and populate 'id' menu item
                const rowData = taskTable.row($(this).closest('tr')).data();
                currentTask = rowData;
            });

            $(taskContext).on('mouseleave', function () {
                $(this).hide();
            });

            $('#editModal').on('shown.bs.modal', function () {
                $('#message-text').val(currentTask.task)
            })

            $("#edit-task-form").submit(function (e) {
                e.preventDefault();
                let data = {
                    id: currentTask.id,
                    task: $(this).find("#message-text").val(),
                    action: "update"
                }
                $.ajax({
                    method: "POST",
                    url: "/todos",
                    data: data
                }).done(function (response) {
                    window.location = "/admin"
                })
            })

            $(document).on("click", ".status_checkbox", function (e) {
                let data = {
                    action: "complete",
                    id: $(this).attr("data-id")
                };

                $.ajax({
                    method: "POST",
                    url: '/todos',
                    data: data
                }).done(function (response) {
                    window.location = "/admin";
                })
            })

            $("#logout").on("click", function () {
                $.ajax({
                    method: "POST",
                    url: "/user",
                    data:{
                        action:"logout"
                    }
                }).done(function () {
                    window.location.href = "/"
                })
            })
        })

    </script>
</body>
</html>
