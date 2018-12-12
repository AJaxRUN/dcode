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
                        <p>DCode is an intiative to maintain quality of the college by ensuring discipline!! Please register your clg here</p>
                        <p>if not done yet, the approval and required services will be enabled within 48hrs!!</p>
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                                <h3 class="register-heading">Register your college here!!</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <input type="text" class="form-control"  name="name" placeholder="Administrator Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Administrator Employee Code *" value="" />
                                        </div>
                                    <div class="form-group">
                                        <input type="number" name="contactnumber" class="form-control" maxLength="12" oninput="javascript:if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeydown="javascript: return event.keyCode == 69 ? false : true" placeholder="Contact Number *" value="" />
                                        <div id="invalid_contactnumber" class="alert-danger"></div><br>
                                    </div>
                                        <div class="form-group">
                                            <input name="password" id="password" type="password" class="form-control" placeholder="Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" id="cnfpassword" class="form-control"  placeholder="Confirm Password *" value="" />
                                            <div id="passworderror" class="alert-danger"></div><br>
                                        </div>
                                       <div class="form-group">
                                            <input id="email" type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Contact Email *" value="" />
                                            <small id="emailHelp">Mail ID will be used only for updates and communication regarding queries!!</small>
                                            <div id="emailerror" class="alert-danger"></div><br>
                                        </div>
                                        <p class="lead">
                                        <a class="btn btn-primary btn-sm" href="../../index.php" role="button">Go to back login page.</a></p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <input type="text" id="clgname" name="clgname" class="form-control" placeholder="College name *" value="" />
                                           <div id="clgnameerror" class="alert-danger"></div><br>
                                        </div>
                                        <div class="form-group" name="selectBranches" id="selectBranchess">
                                        </div>
                                        <div class="form-group" id="programmes">
                                            <p>Select progammes offered</p>&nbsp
                                            <input type="checkbox" name="ug">UG &nbsp
                                            <input type="checkbox" name="pg">PG
                                        </div>
                                        <div class="form-group" id="selectDepts">
                                        </div>
                                        <div class="form-group">
                                           <input type="password" id="keyCode" name="keyCode" class="form-control" placeholder="Key Code *" value="" />
                                           <small id="emailHelp">Key Code is the numeric code provided by the developers!!</small>
                                           <div id="keyCodeError" class="alert-danger"></div><br>
                                        </div>
                                        <div id="errormsg" class="alert-danger"></div><br>
                                        <input type="submit" id="register" class="btn btn-primary" value="Register"/>
                                    </div>
                                        
                                </div>
                    </div>
                </div>
            </form>
        </div>
</body>
<script type="text/javascript">
    var errormsg="";

    function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return pattern.test(emailAddress);
}
    //To load all the branches available from branch.html
    $("#selectBranchess").load("../../src/data/branches.html");

    //To load respective departments
    $(document).ready(function(){
        $("#keyCodeError").hide();
        $("#errormsg").hide();
        $("#emailerror").hide();
        $("#invalid_contactnumber").hide();
        $("#passworderror").hide();
        $("#selectDepts").hide();
        $("#eng").change(function() {
            if(this.checked) {
                 $("#selectDepts").load("../../src/data/engdepts.html");
                  $("#selectDepts").show();
            }
            else {
                $("#selectDepts").empty();
                $("#selectDepts").hide();
            }
        });
    });
    $("#register").click(function(event) {
        event.preventDefault();
        var isValid=true;
        if(!($.trim($("#email").val()).length>0)&&!isValidEmailAddress($("#email").val()))
        {
            $("#emailerror").text(" Please enter a valid email ID").show();
            isValid=false;
        }
        else {
            $("#emailerror").hide();
            isValid=true;
        }
        $("#passworderror").text("").hide();
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
        if(!($("#programmes input[type=checkbox]:checked").length>0))
            isValid=false;
        if(document.getElementById("eng").checked&&!($("#selectDepts input[type=checkbox]:checked").length>0))
            isValid=false;
        if(!($("#selectBranchess input[type=checkbox]:checked").length>0))
            isValid=false;
        if(isValid)
            $("#errormsg").text("").hide();
        $.ajax({
            type:"post",
            url:"validateajax.php?clgname="+$("#clgname").val(),
            async: false,
            cache: false,
            success: function(data) {
                if(!(data=="success")) {
                    $("#clgnameerror").text("College has been registered already!").show();
                    isValid=false;
                }
                else {
                    isValid=true;
                    $("#clgnameerror").hide();
                }
            }
        });
        if(isValid) {
            var code=$("#keyCode").val();
            $.ajax({
                type:"POST",   
                async: false,
                cache: false,
                url:"keyCodeAjax.php?code="+code,
                success:function(data)
                {
                    if(data=="success") {
                        isValid=true;
                        $("#keyCodeError").hide();
                    }
                    else {
                        isValid=false;
                        $("#keyCodeError").text(" Invalid Key Code").show();
                    }
                }

            });
        }
        if(isValid) {
            data=$("form").serialize();
            $.ajax({
                type:"POST",   
                async: false,
                cache: false,
                url:"registerajax.php?"+data,
                success:function(data)
                {
                    if(data=="success")
                        window.location.href="registerSuccessfull.php";
                    else
                        alert("Some error occured");
                }

            });
        }
        else
            $("#errormsg").text(" Please fill all the input fields(valid inputs)!!").show();
    });


</script>
</html>


