// $(document).on("click", "#done_student_number_submit" ,function(){
//     var std_num = $(done_student_number).val();
//     if(!std_num || std_num != "" || std_num != null){
//       $.ajax({
//         url: "http://localhost/enrollmenttracker/index.php/status/ajax_done_student_number",
//         type:"post",
//         dataType:"json",
//         data:{student_number:std_num},
//         success: function(data){
//             alert(data);
//         }
//       });
//     }else{

//     }
// });
$(document).ready(function () {
    $("#done_student_number_submit").click(function(){
        var std_num = $("#done_student_number_text").val();
        if(std_num.length > 0){
            // console.log('arf');
            $.ajax({
                url: "http://localhost/enrollmenttracker/index.php/status/ajax_done_student_number",
                type:"post",
                dataType:"json",
                data:{student_number:std_num},
                success: function(data){
                    // $("#done_student_number_errmsg").html("Im in").show().fadeOut("slow");
                    if(data){
                        $( "#done_student_number" ).addClass( "display_none");
                        $( "#done_welcome" ).removeClass( "display_none");
                    }else{
                        $("#done_student_number_errmsg").html("<h5>No DATA for Student Number: "+std_num+"</h5>").show().fadeOut("slow");
                    }
                }
            });
        }else if(!std_num || std_num != "" || std_num != null || std_num != 0){
            console.log("No Input");
            // alert('No Input');
            $("#done_student_number_errmsg").html("<h5>No Input</h5>").show().fadeOut("slow");
            return false;
        }else{
            console.log('No Input');
            // alert('No Input');
            $("#done_student_number_errmsg").html("<h5>No Input</h5>").show().fadeOut("slow");
            return false;
        }
    });
    $("#done_student_number").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#done_student_number_errmsg").html("<h5>NUMBERS ONLY</h5>").show().fadeOut("slow");
        return false;
        }
    });
});