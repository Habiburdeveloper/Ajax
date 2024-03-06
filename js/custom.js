$(document).ready(function () {
    

    // data insert
    $('#saveValue').click(function (e) { 
        e.preventDefault();
        let id = $('#update-id').val();
        let name = $('#name').val();
        let number = $('#number').val();
        let data = {id: id, name: name, phone_number: number};
        $.ajax({
           url: 'save-data.php',
           type: 'post',
           data: data,
           success:function(data){
            $('#msg').html(data);
            $('#personal_info').trigger("reset");
            $('#update-id').val();
            $('#name').focus();
            dataEdit();
           }

        });
        
       
    }); // data insert end ...

    

    // data delete...

    $('#myTable').on("click", "#btndelete", function () {
        let id = $(this).attr('data_id');
        let mydata = {id: id};
        let mythis = this;

        $.ajax({
            type: "POST",
            url: "delete.php",
            data: mydata,
            success: function (data) {
                $('#msg').html(data);
                $(mythis).closest('tr').fadeOut(50);
            }
        });
    }); // data delete End...

    // data edit..
function dataEdit(){
    $('#myTable').on("click", "#btnedit", function () {
        let id = $(this).attr('data_id');
        let mydata = {id: id};

        $.ajax({
            type: "POST",
            url: "edit.php",
            data: mydata,
            dataType: 'json',
            success: function (data) {
                $('#update-id').val(data.id);
                $('#name').val(data.name);
                $('#number').val(data.number);
            }
        });
    });
}
dataEdit();
    // data edit End ..

    // Aajx paginetion....
    function pagination(page) { 
        $result = '';
        $.ajax({
            type: "post",
            url: "data_show.php",
            data: {page_no: page},
            success: function (data) {
                $('#myTable').html(data);
               
            }
            
        });
    }
    pagination();

    // // // pagination code...
    $(document).on('click','#pagination a', function (e) {
        e.preventDefault();
        let page_id = $(this).attr('id');
        pagination(page_id );
    });
    


  
}); // JQ End.....


// serach..
function serachMy(){

    let serach = $('#serach').val();
    data = {name: serach};
    $.ajax({
        type: "post",
        url: "serach.php",
        data: data,
        success: function (data) {
            // console.log(data)
            $('#myTable').html(data);
        }
    });
}


// form Validation satrt .....
function Validation() {
    var name = document.getElementById('name');
    var number = document.getElementById('number');
    // name condition....
    if( name.value.trim() == '' ){
        document.getElementById('name_error_msg').innerHTML = 'Plese Enter your Name';
        return false;
    }
    else{
        document.getElementById('name_error_msg').innerHTML ='';
    }
    // number condition .....
    if( number.value.trim() == '' ){
        document.getElementById('number_error_msg').innerHTML = 'Plese Enter your Number';
        return false;
    }
    else if( number.value.trim().length <= 11 ){
        document.getElementById('number_error_msg').innerHTML = 'Plese Enter Correct Digite';
        return false;
    }
    else{
        document.getElementById('number_error_msg').innerHTML ='';
    }
}