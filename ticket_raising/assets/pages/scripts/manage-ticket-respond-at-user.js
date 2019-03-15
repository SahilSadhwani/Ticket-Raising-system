var TableDatatables = function(){
    var handleCustomerTable = function(){
        var customerTable = $("#respond_ticket_at_user");
//        alert("ok");
        var oTable = customerTable.dataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                url:
                "http://localhost/ticket_raising/pages/scripts/user/manage-respond.php",
                type: "POST",
            },
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 25, "All"]
            ],
            "pageLength": 15, //set the default length
            "order":[
                [0, "desc"]
            ],
            "columnDefs":[{
                'orderable': false,
                'targets':[-1, -2]
            }]
        });
        customerTable.on('click', '.edit', function(e) {
           
            $id = $(this).attr('id');
            $("#ticket_id").val($id);
            
            
            $.ajax({
                url: "http://localhost/ticket_raising/pages/scripts/user/fetch-respond.php",
                method: "POST",
                data: {ticket_id: $id},
                dataType: "json",
                success: function(data){
                    $("#ticket_id").val(data.ticket_id);
                    $("#ticket_subject").val(data.ticket_subject);
                    $("#ticket_message").val(data.ticket_message);
                    $("#software_name").val(data.software_name);
                    $("#date_of_ticket_issue").val(data.date_of_ticket_issue);
                    $("#issue_status").val(data.issue_status);
                    $("#date_of_solved").val(data.date_of_solved);
//                    $("#editModal").modal('show');
                    
                        window.location.href="http://localhost/ticket_raising/pages/scripts/resolver/respond-answer-at-user.php";
                    
                },
            });

        });
//        customerTable.on('click', '.delete', function(e){
//           $id = $(this).attr('id');
//           $("#recordID").val ($id);
//        });
    }
    return{
        
        //main function in javascript to handle all the initialization part
        init: function(){
            handleCustomerTable();
        }
        
    };
}();
jQuery(document).ready(function(){
    TableDatatables.init();
});
