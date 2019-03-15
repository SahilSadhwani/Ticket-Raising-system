var TableDatatables = function(){
    var handleCategoryTable = function(){
        var categoryTable = $("#accept_ticket_at_resolver");
        
        var oTable = categoryTable.dataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                url:
                "http://localhost/ticket_raising/pages/scripts/resolver/manage-accept-ticket.php",
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
                'targets':[-1,-2]
            }]
        });
        var s=0;
        categoryTable.on('click', '.edit', function(e) {
            $id = $(this).attr('id');
            $("#ticket_id").val($id);
//            alert("$id"+$id);
//            alert("$id"+$id);
//            s=$id;
            
            $.ajax({
                url: "http://localhost/ticket_raising/pages/scripts/resolver/fetch.php",
                method: "POST",
                data: {ticket_id: $id},
                dataType: "json",
                success: function(data){
//                    alert(data.ticket_id);
//                    s=data.ticket_id;
//                    alert(s);
                    $("#ticket_id").val(data.ticket_id);
                    $("#ticket_subject").val(data.ticket_subject);
                    $("#software_name").val(data.software_name);
                    $("#date_of_ticket_issue").val(data.date_of_ticket_issue);
                    $("#timestamp_of_ticket").val(data.timestamp_of_ticket);
//                    $("#editModal").modal('show');
                    //message
                    //photod
                    //specification
                    
                    window.location.href="http://localhost/ticket_raising/pages/accept.php";
                },
            });

        });
//        alert(s);
        
        
        
        
        
//        alert("hi");
//        categoryTable.on('click', '.delete', function(e){
//           $id = $(this).attr('id');
//           $("#recordID").val($id);
//        });
    }
    return{
        
        //main function in javascript to handle all the initialization part
        init: function(){
            handleCategoryTable();
        }
    };
}();
jQuery(document).ready(function(){
    TableDatatables.init();
    
});