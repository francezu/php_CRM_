/**
 * Created by Tatar on 27-Mar-17.
 */
/*TODO*/
$(document).ready(function(){

    $('.edit_td').on('dblclick',function(){
                var id=$(this).attr('id');
                $("#span_"+id).hide();
                $("#input_"+id).show();
    }).change(function(){
        var ID=$(this).attr('id');
        var new_value=$("#input_"+ID).val();
        var dataString = 'id='+ ID +'&new_value='+new_value;

        if(new_value.length>0 && new_value.length<10){
            $.ajax({
                type: "POST",
                url: "./index.php",
                data: dataString,
                cache: false,
                success: function(html)
                {
                    $("#span_"+ID).html(new_value);
                    if(new_value=="ok"||new_value=="online")
                    {
                        $("#tr_"+ID).attr('class',"success");
                        $("#panel_"+ID).attr('class',"panel panel-green");
                    }
                    else if(new_value=="annule"){
                        $("#tr_"+ID).attr('class',"danger");
                        $("#panel_"+ID).attr('class',"panel panel-red");
                    }
                    else if(new_value=="okpv"){
                        $("#tr_"+ID).attr('class',"warning");
                        $("#panel_"+ID).attr('class',"panel panel-warning");
                    }
                }
            });
        }else {
            alert('Enter something.');
        }

    });


    $(".editbox").mouseup(function()
    {
        return false
    });
    // Outside click action
    $(document).mouseup(function()
    {
        $(".editbox").hide();
        $(".text").show();
    });

    $(document).on('keypress',function(e)
    {   var key =e.which;
        if(key==13 ){
            $(".editbox").hide();
            $(".text").show();
        }

    });
});
