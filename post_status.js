$(document).ready(function(){
    $("#statusBtn").click(function(){
        var status = $("#statusBox").val();
        $.post("postStatus.php",
        {
            status: status,
            submit: "yes"
        },
        function(data, status){
            $("#statusError").html(data);
        });
    });
});