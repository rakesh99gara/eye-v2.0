var error_spnidno = false;
var error_spnadno = false;
var error_spnname = false;
var error_spndob = false;
var error_spnage = false;
var error_spnfname = false;
var error_spnmname = false;
var error_spncno = false;
var error_spntextcomplaintright = false;
var error_spntextcomplaintleft = false;
var error_spnoldpgrightaxis = false;
var error_spnoldpgleftaxis = false;
var error_spnarrightaxis = false;
var error_spnarleftaxis = false;
var error_spndvrightaxis = false;
var error_spndvleftaxis = false;
var error_advice = false;
var flag = 0;

$(function () {
  $("#spnidno").hide();
  $("#spnadno").hide();
  $("#spnname").hide();
  $("#spndob").hide();
  $("#spnage").hide();
  $("#spnfname").hide();
  $("#spnmname").hide();
  $("#spncno").hide();
  $("#spntextcomplaintright").hide();
  $("#spntextcomplaintleft").hide();
  $("#spnarrightaxis").hide();
  $("#spnarleftaxis").hide();
  $("#spnoldpgrightaxis").hide();
  $("#spnoldpgleftaxis").hide();
  $("#spndvrightaxis").hide();
  $("#spndvleftaxis").hide();
  $("#spnadvice").hide();

  $("#idno").focusout(function () {
    check_idno();
  });

  $("#adno").focusout(function () {
    check_adno();
  });

  $("#name").focusout(function () {
    check_name();
  });

  $("#dob").focusout(function () {
    check_dob();
  });

  $("#age").focusout(function () {
    check_age();
  });

  $("#fname").focusout(function () {
    check_fname();
  });

  $("#mname").focusout(function () {
    check_mname();
  });

  $("#cno").focusout(function () {
    check_cno();
  });

  $("#textcomplaintright").focusout(function () {
    check_textcomplaintright();
  });

  $("#textcomplaintleft").focusout(function () {
    check_textcomplaintleft();
  });

  $("#oldpgrightaxis").focusout(function () {
    check_oldpgrightaxis();
  });

  $("#oldpgleftaxis").focusout(function () {
    check_oldpgleftaxis();
  });

  $("#arrightaxis").focusout(function () {
    check_arrightaxis();
  });

  $("#arleftaxis").focusout(function () {
    check_arleftaxis();
  });

  $("#dvrightaxis").focusout(function () {
    check_dvrightaxis();
  });

  $("#dvleftaxis").focusout(function () {
    check_dvleftaxis();
  });

  $("#advice").focusout(function () {
    check_advice();
  });

  $("#subbtn").click(function () {
    error_spnidno = false;
    error_spnadno = false;
    error_spnname = false;
    error_spndob = false;
    error_spnage = false;
    error_spnfname = false;
    error_spnmname = false;
    error_spncno = false;
    error_spntextcomplaintright = false;
    error_spntextcomplaintleft = false;
    error_spnoldpgrightaxis = false;
    error_spnoldpgleftaxis = false;
    error_spnarrightaxis = false;
    error_spnarleftaxis = false;
    error_spndvrightaxis = false;
    error_spndvleftaxis = false;
    error_advice = false;

    check_idno();
    check_adno();
    check_name();
    check_dob();
    check_age();
    check_fname();
    check_mname();
    check_cno();
    check_textcomplaintright();
    check_textcomplaintsleft();
    check_oldpgrightaxis();
    check_oldpgleftaxis();
    check_arrightaxis();
    check_arleftaxis();
    check_dvrightaxis();
    check_dvleftaxis();
    check_advice();

    if (
      error_spnidno == false &&
      error_spnadno == false &&
      error_spnname == false &&
      error_spndob == false &&
      error_spnage == false &&
      error_spnfname == false &&
      error_spnmname == false &&
      error_spncno == false &&
      error_spntextcomplaintright == false &&
      error_spntextcomplaintleft == false &&
      error_spnoldpgrightaxis == false &&
      error_spnoldpgleftaxis == false &&
      error_spnarrightaxis == false &&
      error_spnarleftaxis == false &&
      error_spndvrightaxis == false &&
      error_spndvleftaxis == false &&
      error_spnadvice == false
    ) {
      flag = 0;
      return true;
    } else {
      flag = 1;
      return false;
    }
  });
});


function check_idno() {
  var jid = $("#idno").val();
  if (jid == "") {
    document.querySelector("#idno").style.background = "rgb(255, 154, 154)";
    document.querySelector("#spnidno").style.display = "block";
    $("#spnidno").html("** enter valid id no");
    $("#spnidno").show();
    error_spnidno = true;
  } else {
    $("#spnidno").hide();
    document.querySelector("#idno").style.background = "rgb(144, 245, 131)";
  }
}

function check_adno() {
  var jadno = $("#adno").val();
  if (jadno == "" || jadno.length != 12 || /^[0-9]+$/.test(jadno) == false) {
    document.querySelector("#adno").style.background = "rgb(255, 154, 154)";
    document.querySelector("#spnadno").style.display = "block";
    $("#spnadno").html("**aadhar no with 12 digits");
    $("#spnadno").show();
    error_spnadno = true;
  } else {
    $("#spnadno").hide();
    document.querySelector("#adno").style.background = "rgb(144, 245, 131)";
  }
}

function check_name() {
  var jname = $("#name").val();
  if (/^[A-z ]+$/.test(jname) == false) {
    document.querySelector("#name").style.background = "rgb(255, 154, 154)";
    document.querySelector("#spnname").style.display = "block";
    $("#spnname").html("** enter valid name");
    $("#spnname").show();
    error_spnname = true;
  } else if (jname.length <= 2) {
    document.querySelector("#name").style.background = "rgb(255, 154, 154)";
    document.querySelector("#spnname").style.display = "block";
    $("#spnname").html("** name is too short(minimum 2 letters)");
    $("#spnname").show();
    error_spnname = true;
  } else {
    $("#spnname").hide();
    document.querySelector("#name").style.background = "rgb(144, 245, 131)";
  }
}

function check_dob() {
  var jdob = $("#dob").val();
  if (jdob == "") {
    document.querySelector("#dob").style.background = "rgb(255, 154, 154)";
    document.querySelector("#spndob").style.display = "block";
    $("#spndob").html("**enter valid dob");
    $("#spndob").show();
    error_spndob = true;
  } else {
    var birth = new Date(jdob);
    var today = new Date();
    var age = today.getFullYear() - birth.getFullYear();
    $("#age").val(age);
    $("#spndob").hide();
    document.querySelector("#dob").style.background = "rgb(144, 245, 131)";
  }
}

function check_age() {
  var jage = $("#age").val();
  if (
    /^[0-9]+$/.test(jage) == false ||
    jage.length == 0 ||
    jage <= 0 ||
    jage >= 20
  ) {
    document.querySelector("#age").style.background = "rgb(255, 154, 154)";
    document.querySelector("#spnage").style.display = "block";
    $("#spnage").html("** enter valid age");
    $("#spnage").show();
    error_spnage = true;
  } else {
    $("#spnage").hide();
    document.querySelector("#age").style.background = "rgb(144, 245, 131)";
  }
}

function check_fname() {
  var jname = $("#fname").val();
  if (/^[A-z ]+$/.test(jname) == false) {
    document.querySelector("#fname").style.background = "rgb(255, 154, 154)";
    document.querySelector("#spnfname").style.display = "block";
    $("#spnfname").html("** enter valid name");
    $("#spnfname").show();
    error_spnfname = true;
  } else if (jname.length <= 2) {
    document.querySelector("#fname").style.background = "rgb(255, 154, 154)";
    document.querySelector("#spnfname").style.display = "block";
    $("#spnfname").html("** minimum 3 characters");
    $("#spnfname").show();
    error_spnfname = true;
  } else {
    $("#spnfname").hide();
    document.querySelector("#fname").style.background = "rgb(144, 245, 131)";
  }
}

function check_mname() {
  var jname = $("#mname").val();
  if (/^[A-z ]+$/.test(jname) == false) {
    document.querySelector("#mname").style.background = "rgb(255, 154, 154)";
    document.querySelector("#spnmname").style.display = "block";
    $("#spnmname").html("** enter valid name");
    $("#spnmname").show();
    error_spnmname = true;
  } else if (jname.length <= 2) {
    document.querySelector("#mname").style.background = "rgb(255, 154, 154)";
    document.querySelector("#spnmname").style.display = "block";
    $("#spnmname").html("** minimum 2 letters");
    $("#spnmname").show();
    error_spnmname = true;
  } else {
    $("#spnmname").hide();
    document.querySelector("#mname").style.background = "rgb(144, 245, 131)";
  }
}

function check_cno() {
  var jcno = $("#cno").val();
  if (jcno == "" || jcno.length != 10 || /^[0-9]+$/.test(jcno) == false) {
    document.querySelector("#cno").style.background = "rgb(255, 154, 154)";
    document.querySelector("#spncno").style.display = "block";
    $("#spncno").html("** phone no with 10 digits");
    $("#spncno").show();
    error_spncno = true;
  } else {
    $("#spncno").hide();
    document.querySelector("#cno").style.background = "rgb(144, 245, 131)";
  }
}

function check_textcomplaintright() {
  var complaintright = $("#textcomplaintright").val();
  if (complaintright == "") {
    document.querySelector("#textcomplaintright").style.background =
      "rgb(255, 154, 154)";
    document.querySelector("#spntextcomplaintright").style.display = "block";
    $("#spntextcomplaintright").html("** complaints");
    $("#spntextcomplaintright").show();
    error_spntextcomplaintright = true;
  } else {
    $("#spntextcomplaintright").hide();
    document.querySelector("#textcomplaintright").style.background =
      "rgb(144, 245, 131)";
  }
}

function check_textcomplaintleft() {
  var complaintleft = $("#textcomplaintleft").val();
  if (complaintleft == "") {
    document.querySelector("#textcomplaintleft").style.background =
      "rgb(255, 154, 154)";
    document.querySelector("#spntextcomplaintleft").style.display = "block";
    $("#spntextcomplaintleft").html("** complaints");
    $("#spntextcomplaintleft").show();
    error_spntextcomplaintleft = true;
  } else {
    $("#spntextcomplaintleft").hide();
    document.querySelector("#textcomplaintleft").style.background =
      "rgb(144, 245, 131)";
  }
}

function check_oldpgrightaxis() {
  var joldpgrightaxis = $("#oldpgrightaxis").val();
  if (joldpgrightaxis == "" || /^[0-9]+$/.test(joldpgrightaxis) == false) {
    document.querySelector("#oldpgrightaxis").style.background =
      "rgb(255, 154, 154)";
    document.querySelector("#spnoldpgrightaxis").style.display = "block";
    $("#spnoldpgrightaxis").html("** fill this field with digits");
    $("#spnoldpgrightaxis").show();
    error_spnoldpgrightaxis = true;
  } else if (joldpgrightaxis < 0 || joldpgrightaxis > 180) {
    document.querySelector("#oldpgrightaxis").style.background =
      "rgb(255, 154, 154)";
    document.querySelector("#spnoldpgrightaxis").style.display = "block";
    $("#spnoldpgrightaxis").html("** it should be between 0 and 180");
    $("#spnoldpgrightaxis").show();
    error_spnoldpgrightaxis = true;
  } else {
    $("#spnoldpgrightaxis").hide();
    document.querySelector("#oldpgrightaxis").style.background =
      "rgb(144, 245, 131)";
  }
}

function check_oldpgleftaxis() {
  var joldpgleftaxis = $("#oldpgleftaxis").val();
  if (joldpgleftaxis == "" || /^[0-9]+$/.test(joldpgleftaxis) == false) {
    document.querySelector("#oldpglefttaxis").style.background =
      "rgb(255, 154, 154)";
    document.querySelector("#spnoldpgleftaxis").style.display = "block";
    $("#spnoldpgleftaxis").html("** fill this field with digits");
    $("#spnoldpgleftaxis").show();
    error_spnoldpgleftaxis = true;
  } else if (joldpgleftaxis < 0 || joldpgleftaxis > 180) {
    document.querySelector("#oldpglefttaxis").style.background =
      "rgb(255, 154, 154)";
    document.querySelector("#spnoldpgleftaxis").style.display = "block";
    $("#spnoldpgleftaxis").html("** it should be between 0 and 180");
    $("#spnoldpgleftaxis").show();
    error_spnoldpgleftaxis = true;
  } else {
    $("#spnoldpgleftaxis").hide();
    document.querySelector("#oldpgleftaxis").style.background =
      "rgb(144, 245, 131)";
  }
}

function check_arrightaxis() {
  var jarrightaxis = $("#arrightaxis").val();
  if (jarrightaxis == "" || /^[0-9]+$/.test(jarrightaxis) == false) {
    document.querySelector("#arrightaxis").style.background =
      "rgb(255, 154, 154)";
    document.querySelector("#spnarrightaxis").style.display = "block";
    $("#spnarrightaxis").html("** fill this field with digits");
    $("#spnarrightaxis").show();
    error_spnarrightaxis = true;
  } else if (jarrightaxis < 0 || jarrightaxis > 180) {
    document.querySelector("#arrightaxis").style.background =
      "rgb(255, 154, 154)";
    document.querySelector("#spnarrightaxis").style.display = "block";
    $("#spnarrightaxis").html("** it should be between 0 and 180");
    $("#spnarrightaxis").show();
    error_spnarrightaxis = true;
  } else {
    $("#spnarrightaxis").hide();
    document.querySelector("#arrightaxis").style.background =
      "rgb(144, 245, 131)";
  }
}

function check_arleftaxis() {
  var jarleftaxis = $("#arleftaxis").val();
  if (jarleftaxis == "" || /^[0-9]+$/.test(jarleftaxis) == false) {
    document.querySelector("#arleftaxis").style.background =
      "rgb(255, 154, 154)";
    document.querySelector("#spnarleftaxis").style.display = "block";
    $("#spnarleftaxis").html("** fill this field with digits");
    $("#spnarleftaxis").show();
    error_spnarleftaxis = true;
  } else if (jarleftaxis < 0 || jarleftaxis > 180) {
    document.querySelector("#arleftaxis").style.background =
      "rgb(255, 154, 154)";
    document.querySelector("#spnarleftaxis").style.display = "block";
    $("#spnarleftaxis").html("** it should be between 0 and 180");
    $("#spnarleftaxis").show();
    error_spnarleftaxis = true;
  } else {
    $("#spnarleftaxis").hide();
    document.querySelector("#arleftaxis").style.background =
      "rgb(144, 245, 131)";
  }
}

function check_dvrightaxis() {
  var jdvrightaxis = $("#dvrightaxis").val();
  if (jdvrightaxis == "" || /^[0-9]+$/.test(jdvrightaxis) == false) {
    document.querySelector("#dvrightaxis").style.background =
      "rgb(255, 154, 154)";
    document.querySelector("#spndvrightaxis").style.display = "block";
    $("#spndvrightaxis").html("** fill this field with digits");
    $("#spndvrightaxis").show();
    error_spndvrightaxis = true;
  } else if (jdvrightaxis < 0 || jdvrightaxis > 180) {
    document.querySelector("#dvrightaxis").style.background =
      "rgb(255, 154, 154)";
    document.querySelector("#spndvrightaxis").style.display = "block";
    $("#spndvrightaxis").html("** it should be between 0 and 180");
    $("#spndvrightaxis").show();
    error_spndvrightaxis = true;
  } else {
    $("#spndvrightaxis").hide();
    document.querySelector("#dvrightaxis").style.background =
      "rgb(144, 245, 131)";
  }
}

function check_dvleftaxis() {
  var jdvleftaxis = $("#dvleftaxis").val();
  if (jdvleftaxis == "" || /^[0-9]+$/.test(jdvleftaxis) == false) {
    document.querySelector("#dvleftaxis").style.background =
      "rgb(255, 154, 154)";
    document.querySelector("#spndvleftaxis").style.display = "block";
    $("#spndvleftaxis").html("** fill this field with digits");
    $("#spndvleftaxis").show();
    error_spndvleftaxis = true;
  } else if (jdvleftaxis < 0 || jdvleftaxis > 180) {
    document.querySelector("#dvleftaxis").style.background =
      "rgb(255, 154, 154)";
    document.querySelector("#spndvleftaxis").style.display = "block";
    $("#spndvleftaxis").html("** it should be between 0 and 180");
    $("#spndvleftaxis").show();
    error_spndvleftaxis = true;
  } else {
    $("#spndvleftaxis").hide();
    document.querySelector("#dvleftaxis").style.background =
      "rgb(144, 245, 131)";
  }
}

function check_advice() {
  var adv = $("#advice").val();
  if (adv == "") {
    document.querySelector("#advice").style.background = "rgb(255, 154, 154)";
    document.querySelector("#spnadvice").style.display = "block";
    $("#spnadvice").html("** advice");
    $("#spnadvice").show()
    error_advice = true;
  } else {
    $("#spnadvice").hide();
    document.querySelector("#advice").style.background =
      "rgb(144, 245, 131)";
  }
}

function studentValidate() {
  return flag;
}
