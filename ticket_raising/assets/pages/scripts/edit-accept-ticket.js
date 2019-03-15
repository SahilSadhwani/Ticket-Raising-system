var Save = function() {

    //document.alert("hi");
    var handleSave = function() {
//        $("#edit_save").click(function(){
//            alert("hello");
//        });
        
    
        $('.edit-save-form').validate({
            errorElement: 'span',
            
            errorClass: 'help-block', 
            
            focusInvalid: false, 
            
            rules: {
                ticket_id: {
                    required: true,
                    
                },
                ticket_subject: {
                    required: true
                },
                software_name: {
                    required: true,
                    
                },
                date_of_ticket_issue: {
                    required: true,
                },
                timestamp_of_ticket: {
                    required: true,
                }
            },

            messages: {
                ticket_subject: {
                    required: "subject is required."
                    
                }
               
            },

            invalidHandler: function(event, validator) {   
                $('.alert-danger', $('.edit-save-form')).show();
            },

            highlight: function(element) { 
                $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

        
            submitHandler: function(form) {
                error.hide();
                form[0].submit(); //if success calling ajax 
            }
        });
        
    }
    return {
        
        //main function to initiate
        init: function() {
            
            handleSave();
            
        }

    };

}();

jQuery(document).ready(function() {
    Save.init();
});