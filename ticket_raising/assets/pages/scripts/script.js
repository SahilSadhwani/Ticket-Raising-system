$(function(){
    
//   alert("hi"); 

    
    $(".color-blue").click(function(){
       $(".submit-ticket").css("display","block");
       $(".view-ticket").css("display","none");
       $(".respond-to-issues").css("display","none");
    });
    
    $(".color-yellow").click(function(){
       $(".view-ticket").css("display","block"); 
       $(".respond-to-issues").css("display","none");
       $(".submit-ticket").css("display","none");
    });
    
    $(".color-red").click(function(){
       $(".respond-to-issues").css("display","block"); 
       $(".submit-ticket").css("display","none");
       $(".view-ticket").css("display","none");
        window.open("http://localhost/ticket_raising/pages/index-respond-at-user.php","_self")
    });
    
    
    
    
     var flag1 = false;

    $(document).on('click','#find-out-common-bug', function(e){
        
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'includes/software-common-bug-ajax.php', true);
        
        xhr.onprogress = function(){

        }
        
        xhr.onload = function(){

            if(this.status == 200 && flag1 == false){
                console.log(this.responseText);
                document.getElementById('common-bug-software-name').innerHTML = this.responseText;
                flag1 = true;
                
            }else if(this.status = 404){
                document.getElementById('common-bug-software-name').innerHTML = '';
                
            }else if(flag1 == true){
                flag1 = false;
                xhr.close();
                
            }
        }
        xhr.onerror = function(){
        }
        
        xhr.send();
        });
    
    
    
    
    
    
        
jQuery(document).ready(function() {
   
    $("#select-software").select2({
        placeholder: 'Select...',
    });
});
    
    
    
    $("#op").change(function(){

        var v = this.value;

        if(v=="user"){
            $(".company").css("display","block");
            $(".languages").css("display","none");
        }else if(v=="resolver"){
            $(".languages").css("display","block");
             $(".company").css("display","none");
        }
    });
    
    
    $(".view-accepted-ticket-at-resolver").click(function(){
         window.open("http://localhost/ticket_raising/pages/view-accepted-ticket.php");
    });
    
//    alert("ok");
    
    
    $(".edit-details").click(function(){
       $(".details-retrieve").css("display","none");
       $(".details-save").css("display","block");
    });
    
    $(".save-details").click(function(){
       $(".details-retrieve").css("display","block");
       $(".details-save").css("display","none");
    });
    
    $("#issue_solved").click(function(){
       $(".ratings-form").css("display","block"); 
    });
    
});