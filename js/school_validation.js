var error_spnscode = false;
var error_spnsname = false;
var error_spnheadname = false;
var error_spnphno = false;
var error_spnaddress = false;
var flag = 0;
$(function() {
  $("#spnscode").hide();
  $("#spnsname").hide();
  $("#spnheadname").hide();
  $("#spnphno").hide();
  $("#spnaddress").hide();

  $("#scode").focusout(function() {
    check_scode();
  });

  $("#sname").focusout(function() {
    check_sname();
  });

  $("#date").focusout(function() {
    document.querySelector("#date").style.background = "rgb(144, 245, 131)";
  });

  $("#headname").focusout(function() {
    check_headname();
  });

  $("#phno").focusout(function() {
    check_phno();
  });

  $("#address").focusout(function() {
    check_address();
  });

  $("#form").submit(function() {
    error_spnscode = false;
    error_spnsname = false;
    error_spnheadname = false;
    error_spnphno = false;
    error_spnaddress = false;

    check_scode();
    check_sname();
    check_headname();
    check_phno();
    check_address();

    if (
      error_spnscode == false &&
      error_spnsname == false &&
      error_spnheadname == false &&
      error_spnphno == false &&
      error_spnaddress == false
    ) {
      flag = 0;
      return true;
    } else {
      flag = 1;
      return false;
    }
  });
});

function check_scode() {
  var jscode = $("#scode").val();
  if (/^[0-9]+$/.test(jscode) == false || jscode == "") {
    document.querySelector("#scode").style.background = "rgb(255, 154, 154)";
    document.querySelector("#spnscode").style.display = "block";
    $("#spnscode").html("Not a valid school code");
    $("#spnscode").show();
    error_spnscode = true;
  } else {
    $("#spnscode").hide();
    document.querySelector("#scode").style.background = "rgb(144, 245, 131)";
  }
}

function check_sname() {
  var jsname = $("#sname").val();
  if (/^[A-z ]+$/.test(jsname) == false || jsname == "") {
    document.querySelector("#sname").style.background = "rgb(255, 154, 154)";
    document.querySelector("#spnsname").style.display = "block";
    $("#spnsname").html("Not a valid school name");
    $("#spnsname").show();
    error_spnsname = true;
  } else {
    $("#spnsname").hide();
    document.querySelector("#sname").style.background = "rgb(144, 245, 131)";
  }
}

function check_headname() {
  var jheadname = $("#headname").val();
  if (/^[A-z ]+$/.test(jheadname) == false || jheadname == "") {
    document.querySelector("#headname").style.background = "rgb(255, 154, 154)";
    document.querySelector("#spnheadname").style.display = "block";
    $("#spnheadname").html("Not a valid name");
    $("#spnheadname").show();
    error_spnheadname = true;
  } else {
    $("#spnheadname").hide();
    document.querySelector("#headname").style.background = "rgb(144, 245, 131)";
  }
}

function check_phno() {
  var jphno = $("#phno").val();
  if (/^[0-9]+$/.test(jphno) == false || jphno == "") {
    document.querySelector("#phno").style.background = "rgb(255, 154, 154)";
    document.querySelector("#spnphno").style.display = "block";
    $("#spnphno").html("Not a valid phone number");
    $("#spnphno").show();
    error_spnphno = true;
  } else {
    $("#spnphno").hide();
    document.querySelector("#phno").style.background = "rgb(144, 245, 131)";
  }
}

function check_address() {
  var jaddress = $("#address").val();
  if (jaddress == "") {
    document.querySelector("#address").style.background = "rgb(255, 154, 154)";
    document.querySelector("#spnaddress").style.display = "block";
    $("#spnaddress").html("Not a valid address");
    $("#spnaddress").show();
    error_spnaddress = true;
  } else {
    $("#spnaddress").hide();
    document.querySelector("#address").style.background = "rgb(144, 245, 131)";
  }
}

function validate() {
  return flag;
}
