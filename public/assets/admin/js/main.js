$(".card").click(function ()
{
    $(this).toggleClass("selected");
});
function openSideNav()
{
    document.getElementById("sidebar").style.width = "200px";
    document.getElementById("closeBtn").style.display = "block"
}

/* Set the width of the side navigation to 0 */
function closeNav()
{
    document.getElementById("sidebar").style.width = "57px";
    document.getElementById("closeBtn").style.display = "none"
} 

// click Add Result button and make row editable starts
function makeEditable(time){ 
    var td = document.getElementById(time);
    var input = document.createElement('input');
    input.type = "text";
    input.name = "result";
    td.innerHTML = '<input class="form-control" type="number" name="result" placeholder="Enter result" id="result_'+time+'" min="1" max="100" /><p style="color:red;" id="error_'+time+'"></p>'
    document.getElementById('result_'+time).focus();
    var button_td = document.getElementById('add_result_btn_'+time);
    button_td.innerHTML = '<button class="btn btn-success" type="button" onclick="UpdateResult(\'' + time + '\')">Update Result</button>';
}
// click Add Result button and make row editable ends

// add result starts
function UpdateResult(time){
      var tr = document.getElementById('table_row_'+time); 
    var value = document.getElementById('result_'+time).value;
    var error = document.getElementById('error_'+time);
    var date = document.getElementById('date_'+time).value;
    
    if(value == ''){ 
        error.innerHTML = 'Plese insert result before update';
    }else if(value > 100){
        error.innerHTML = 'Result should be smaller than 100';
    }else{
        error.innerHTML = '';
        var token = $("input[name=_token]").val();
        var form_data = new FormData();
        form_data.append('time', time);
        form_data.append('date', date),
        form_data.append('result', value);
 
        $.ajax({
            headers: {
                    "X-CSRF-TOKEN": token,
            },
            url: "result/store",
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function(response){
                var error = document.getElementById('error_'+time);
                var td = document.getElementById(time);
                var tr = document.getElementById('table_row_'+time); 
                var button_td = document.getElementById('add_result_btn_'+time);
                if(response.status == 'success'){
                    td.innerHTML = response.result;
                    tr.style.backgroundColor  = "#daffda";
                    button_td.innerHTML = '<button class="btn btn-success" type="button" onclick="makeEditable(\'' + time + '\')">Edit</button>';

                }else{
                    error.innerHTML = "Something Went Wrong";
                }
            }

        });
    }
    
}
// add result ends 

// make advertisement editable starts
function makeAdsEditable(){ 
    $('#mobile_number').removeAttr("disabled")
    $('#email_id').removeAttr("disabled")
    $('#edit_btn').hide();
    $('#update_btn').show(); 
}
// make advertisement editable ends



// date filter on admin dashboard starts
var filter_date = document.getElementById('filter_date_dashboard');
filter_date.addEventListener("change", function (){
    var date_value = filter_date.value;
    $.ajax({
        url:'dashboard-filter-request',
        data:{date_value: date_value},
        type:'GET',
        success:function(response){ 
          
            var append_to_html_time= "<li>Time</li>";
            var append_to_html_result= "<li>Number</li>";
           response.forEach(function (item){
             var timeParts = item.result_time.split(":");
            var hours = parseInt(timeParts[0]);
            var minutes = timeParts[1];
            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // Handle 0 as 12 AM
            var formattedTime = hours + ':' + minutes + ' ' + ampm;

            append_to_html_time = append_to_html_time + '<li>'+formattedTime+'</li>';
            append_to_html_result = append_to_html_result + '<li>'+item.result+'</li>';
           });
           $('#filter_result_time').html(append_to_html_time)
           $('#filter_result_result').html(append_to_html_result)
        },
    }); 
});
// date filter on admin dashboard ends


