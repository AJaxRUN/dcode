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
                <form class="row" autocomplete="off" method="POST" id="register-form">
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
                                            <input type="text" class="form-control"  name="username" placeholder="Administrator Username *" value="" />
                                        </div>
                                    <div class="form-group">
                                        <input type="number" name="contactnumber" class="form-control" maxLength="10" oninput="javascript:if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeydown="javascript: return event.keyCode == 69 ? false : true" placeholder="Contact Number *" value="" />
                                        <div id="invalid_contactnumber" class="alert-danger"></div><br>
                                    </div>
                                        <div class="form-group">
                                            <input name="password" id="password" type="password" class="form-control" placeholder="Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" id="cnfpassword" name="cnfpassword" class="form-control"  placeholder="Confirm Password *" value="" />
                                            <div id="passworderror" class="alert-danger"></div><br>
                                        </div>
                                       <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Contact Email *" value="" />
                                            <label for="email">Mail ID will be used only for updates and communication regarding queries!!</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <input type="college" id="clgname" name="clgname" class="form-control" placeholder="College name *" value="" />
                                        </div>
                                        <div class="form-group" name="selectBranches" id="selectBranchess">
                                        </div>
                                        <div class="form-group">
                                            <p>Select progammes offered</p>&nbsp
                                            <input type="checkbox" name="ug">UG &nbsp
                                            <input type="checkbox" name="pg">PG
                                        </div>
                                        <div class="form-group" id="selectDepts">
                                        </div>
                                        <div id="errormsg" class="alert-danger"></div><br>
                                        <input type="submit" id="register" class="btn btn-primary" value="Register"/>
                                    </div>
                                </div>
                    </div>
                </div>
            </form>
</body>
<script type="text/javascript">
    var errormsg="";
    //To load all the branches available from branch.html
    $("#selectBranchess").load("../../src/data/branches.html");

    //To load respective departments
    $(document).ready(function(){
        $("#errormsg").hide();
        $("#invalid_contactnumber").hide();
        $("#passworderror").hide();
        $("#eng").change(function() {
            if(this.checked) {
                 $("#selectDepts").load("../../src/data/engdepts.html");
                  $("#selectDepts").show();
            }
            else
                $("#selectDepts").hide();
        });
    });
    $("#register").click(function(event) {
        event.preventDefault();
        $("#passworderror").text("").hide();
        var isValid=true;
        if(!($("#password").val()===$("#cnfpassword").val())) {
            isValid=false;
            errormsg=" Passwords don't match!";
            $("#passworderror").text(errormsg).show();
        }
        else {
            $("input").each(function() {
                var element = $(this);
                if (element.val() == "") {
                   isValid=false;
                   element.addClass("is-invalid");
                }
                else
                    element.removeClass("is-invalid");
                if(element.is("checkbox"))
                    isValid=true;
            });
        }
        if(!($("#selectDepts input[type=checkbox]:checked").length>0))
            isValid=false;
        if(!($("#selectBranchess input[type=checkbox]:checked").length>0))
            isValid=false;
        if(isValid) {
            $("#errormsg").text("").hide();
            data=$("form").serialize();
            $.ajax({
                type:"POST",   
                url:"registerajax.php?"+data,
                success:function(data)
                {
                    if(data=="success")
                        alert("Done");
                        // window.location.href="../login_module/login.php";
                    else
                        alert("Some error occured");
                }

            });
        }
        else
            $("#errormsg").text(" Please fill all the input fields!!").show();
    });


</script>
</html>


