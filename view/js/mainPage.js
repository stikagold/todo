$(function(){

    $.ajax({
        url: "/todos"
    }).done(function (response) {
        console.log("Response for todos", response);
    })

    $.ajax({
        url: "/"
    }).done(function (response) {
        console.log("Response for home", response);
    })
    // $('#todos').DataTable({
    //     "processing": true,
    //     "serverSide": true,
    //     ajax: 'todos'
    // });

});
