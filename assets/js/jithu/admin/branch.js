(function($, window, undefined) {
    "use strict";
    $(document).ready(function() {
var opts = {
"closeButton": true,
"debug": false,
"positionClass": "toast-top-right",
"onclick": null,
"showDuration": "300",
"hideDuration": "1000",
"timeOut": "5000",
"extendedTimeOut": "1000",
"showEasing": "swing",
"hideEasing": "linear",
"showMethod": "fadeIn",
"hideMethod": "fadeOut"
};
//toastr.success("So me by marianne admitted speaking.", "This is a title", opts);
        var $btn = $(".add_btn");
        $btn.on("click", function() {

            //alert($(this).attr('data'));
            var username=$(this).attr('data');
            var url = baseurl+'index.php/admin/verify_user/'+ $(this).attr('table')+'/accept/';
            $.ajax({
                data: {
                   'jithu_csrf_token':  $.cookie('jithu_csrf_cookie'),
                    'username': username
                },
                type: 'POST',
                url: url,
                dataType: 'json',
                success: function(result) {
                    if (result.status == "success") {
                        $("#"+username).remove();
                        //$('#result').html(ok);
                        toastr.success("User accepted", "Success", opts);
                    } else {
                        //$('#result').html(fail);
                        toastr.error("Oops something unfortunate happend", "Error", opts);
                    }
                },
                error: function(result) {
                    //$('#result').html(result);
                     toastr.error("Oops something unfortunate happend", "Error", opts);
                }
            });

            return false;
        });

        var $btn1 = $(".remove_btn");
        $btn1.on("click", function() {
            var url = baseurl+'index.php/admin/verify_user/'+ $(this).attr('table')+'/reject/';
            var username=$(this).attr('data');
            $.ajax({
                data: {
                   'jithu_csrf_token':  $.cookie('jithu_csrf_cookie'),
                    
                    'username': username
                
                },
                type: 'POST',
                url: url,
                dataType: 'json',
                success: function(result) {
                    if (result.status == "success") {
                        $("#"+username).remove();
                         toastr.success("User rejected", "Success", opts);
                    } else {
                         toastr.error("Oops something unfortunate happend", "Error", opts);
                    }
                },
                error: function(result) {
                     toastr.error("Oops something unfortunate happend", "Error", opts);

                }
            });
            return false;
        });
    });
})(jQuery, window);