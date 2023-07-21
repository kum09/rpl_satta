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
                    button_td.innerHTML = '<button class="btn btn-success" type="button" disabled>Updated</button>';

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

