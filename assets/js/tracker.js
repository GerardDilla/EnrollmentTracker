$(document).ready(function(){

    $('.success-check').hide();
    getStatus(1);

})

function getStatus(firstload = 0){

    tabs = {
        ExamStatus: {
            check:$('#examination_tab .success-check'),
            icon:$('#examination_tab .icon-circle'),
            iconselect:$('#examination_tab'),
            progressbar:'12.5%',
            content:$('#Examination'),
        },
        AdvisingStatus: {
            check:$('#advising_tab .success-check'),
            icon:$('#advising_tab .icon-circle'),
            iconselect:$('#advising_tab'),
            progressbar:'37.5%',
            content:$('#Advising'),
        },
        PaymentStatus: {
            check:$('#payment_tab .success-check'),
            icon:$('#payment_tab .icon-circle'),
            iconselect:$('#payment_tab'),
            progressbar:'62.5%',
            content:$('#Payment'),
        }
    };
    
    
    $.ajax({
        
        url: $("#trackerform").attr('action'),
        type: $("#trackerform").attr('method'),
        data: {
            Reference:$('#StudentInfo').data('ref'),
            Semester:$('#StudentInfo').data('sem'),
            SchoolYear:$('#StudentInfo').data('sy'),
        },
        success: function(response){

            response = JSON.parse(response);
            $active = 0;
            $complete = 1;
            
            $('.icon-circle').removeClass("checked");
            $.each(tabs,function(data,tab){

                if(response[data] == 1){

                    tab['check'].show();
                    tab['icon'].addClass("checked");
                    if(firstload == 1){
                        tab['content'].removeClass("active");
                        tab['iconselect'].removeClass("active");
                    }

                }else{
                    tab['check'].hide();
                    if(firstload == 1){
                        //$('.wizard-navigation ul li').removeClass("active");
                        //$('.content_tab').removeClass("active");
                        //Sets the first uncompleted step as active
                        if($active == 0){
                            $('.progress-bar').width(tab['progressbar']);
                            tab['content'].addClass("active");
                            tab['iconselect'].addClass("active");
                            $active++;
                        }
                        $complete = 0;
                    }

                }

            });
            if(firstload == 1){
                if($complete == 1){
                    $('.wizard-navigation ul li').removeClass("active");
                    $('.content_tab').removeClass("active");
                    $('.progress-bar').width('87.5%');
                    $('#done_tab .success-check').show();
                    $('#DONE').addClass("active");
                    $('#done_tab').addClass("active");
                }
            }
            console.log(response);

        },
        fail: function(){
            alert('Error Connecting to Server');
        },
        complete: setTimeout(function(){
            getStatus()
        }, 10000),
        timeout: 2000

    });

}