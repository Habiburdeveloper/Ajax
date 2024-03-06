<?php
require('link.php');
require('all-script.php');

?>


<body>
    <!-- Insert Data Start -->
    <form id="personal_info" onsubmit=" return Validation()">
    <input type="hidden" id="update-id">
        <div class="name">
            <label class="lebel">Name :</label>
                <input type="text" id="name" class="input" placeholder="Full name">
            <span id="name_error_msg" style="color: red;"></span>
        </div>
        <div class="number">
            <label class="lebel">Number :</label>
                <input type="text" id="number" class="input" placeholder="Enter Your Number">
            <span id="number_error_msg" style="color: red;"></span>
        </div>
        
        <button id="saveValue" type="submit">Save</button>
        <h3 id="msg" style="color: red;"></h3>
    </form> <!-- Insert Data End -->
 
    
    <!-- Search Field -->
    <div class="input-group">
        <i class="fa-solid fa-magnifying-glass" id="serach_icon"></i>
        <input type="text" id="serach" placeholder="serach" onkeyup="serachMy();">
    </div><!-- Search Field end -->

    <!-- Select Data -->
    <div id="myTable">
    </div> <!-- Select Data End -->
     
        
    
    





<script src="js/custom.js"></script>
</body>
</html>