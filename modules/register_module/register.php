<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!DOCTYPE html>
<html>
<head>
    <title>D CODE</title>
<link rel="stylesheet" href="../../css/register.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
    <div class="container register">
                <form class="row" autocomplete="off">
                    <div class="col-md-3 register-left">
                        <h3>Welcome!!</h3>
                        <p>D Code is an intiative to maintain random things in clg!! Please register your clg here</p>
                        <p>if not done yet, the approval and required services will be enabled within 48hrs!!</p>
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                                <h3 class="register-heading">Register your college here!!</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Administrator Username *" value="" />
                                        </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" placeholder="Contact Number *" value="" />
                                    </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"  placeholder="Confirm Password *" value="" />
                                        </div>
                                       <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Contact Email *" value="" />
                                            <label for="email">Mail ID will be used only for updates and communication regarding queries!!</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <input type="college" id="collegeName" class="form-control" placeholder="College name *" value="" />
                                        </div>
                                        <div class="form-group" id="selectBranchess">
                                        </div>
                                        <div class="form-group">
                                            <p>Select progammes offered</p>&nbsp
                                            <input type="checkbox" name="ug">UG &nbsp
                                            <input type="checkbox" name="pg">PG
                                        </div>
                                        <div class="form-group" id="selectEngDepts">
                                        </div>
                                        <input type="submit" id="register" class="btnRegister"  value="Register"/>
                                    </div>
                                </div>
                    </div>
                </div>

            </form>
</body>
<script type="text/javascript">
    $("#selectBranchess").load("../../src/data/branches.html");
    $(document).ready(function(){
        $("#eng").change(function() {
            if(this.checked) {
                 $("#selectEngDepts").load("../../src/data/engdepts.html");
                  $("#selectEngDepts").show();
            }
            else
                $("#selectEngDepts").hide();
        });
    });
    $("#register").click(function() {
        var isValid=true;
        $("input").each(function() {
           var element = $(this);
           if (element.val() == "") {
               console.log(element.id);
               isValid=false;
           }
        if(isValid)
            alert("Congo");
        else
            alert("bye");
});
    });
</script>
</html>


