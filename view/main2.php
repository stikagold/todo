<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Hello, world!</title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        BeeJee
    </a>
    <button type="button" class="btn btn-primary btn-sm active"  data-toggle="modal" data-target="#loginModal" data-whatever="@getbootstrap">Авторизация</button>
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Авторизация</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="user-login" class="col-form-label">Recipient:</label>
                            <input type="text" class="form-control" id="user-login">
                        </div>
                        <div class="form-group">
                            <label for="user-password" class="col-form-label">Recipient:</label>
                            <input type="text" class="form-control" id="user-password">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <table id="todos" class="display mt-5" style="width:100%">
            <thead>
            <tr>
                <th>имя пользователя</th>
                <th>email</th>
                <th>текст задачи</th>
                <th>статус</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src=" https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<!--<script src="/view/js/mainPage.js" defer></script>-->
<script>
    $(function(){

        $('#todos').DataTable({
            "processing": true,
            "serverSide": true,
            ajax: 'todos'
        });

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
                window.location = "/";
            })
        })
    });

</script>

</body>
</html>
