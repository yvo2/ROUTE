function focusEvent(id) {
  if (id === 0) {
    $("#rt-via1").css("display", "block")
  }

  if (id === 1) {
    $("#rt-via2").css("display", "block")
  }

  if (id === 2) {
    $("#rt-via3").css("display", "block")
  }

  if (id === 3) {
    $("#rt-via4").css("display", "block")
  }
}

function blurEvent(id) {
  if (id === 0 && $("#rt-via0").val() === "") {
    $("#rt-via1").css("display", "none")
  }

  if (id === 1 && $("#rt-via1").val() === "") {
    $("#rt-via2").css("display", "none")
  }

  if (id === 2 && $("#rt-via2").val() === "") {
    $("#rt-via3").css("display", "none")
  }

  if (id === 3 && $("#rt-via3").val() === "") {
    $("#rt-via4").css("display", "none")
  }
}

function clickEvent(id) {
  if ($("#rt-via0").val() !== "") {
    $("#rt-via0").css("display", "block")
    $("#rt-via1").css("display", "block")
  }

  if ($("#rt-via1").val() !== "") {
    $("#rt-via1").css("display", "block")
    $("#rt-via2").css("display", "block")
  }

  if ($("#rt-via2").val() !== "") {
    $("#rt-via2").css("display", "block")
    $("#rt-via3").css("display", "block")
  }

  if ($("#rt-via3").val() !== "") {
    $("#rt-via3").css("display", "block")
    $("#rt-via4").css("display", "block")
  }
}

function emLength() {
  if ($("#rt-email").val().length <= 5 || !($("#rt-email").val().includes("@") && $("#rt-email").val().includes("."))) {
     $("#rt-email").css('border', 'solid 1px red');
     $("#validation-email").text("Bitte eine valide Email-Addresse eingeben.")
     $("#validation-email2").text("Bitte eine valide Email-Addresse eingeben.")
   } else {
     $("#rt-email").css('border', 'solid 1px rgba(0,0,0,0.15)');
     $("#validation-email").text("")
     $("#validation-email2").text("")
   }
}

function pwLength() {
  if ($("#rt-password").val().length <= 7) {
     $("#rt-password").css('border', 'solid 1px red');
     $("#validation-password").text("Bitte Passwort eingeben, welches mindestens 8 Zeichen lang ist.")
   } else {
     $("#rt-password").css('border', 'solid 1px green');
     $("#validation-password").text("")
   }
}

function pwCompare() {
  if ($("#rt-password").val() === $("#rt-password-repeat").val()) {
    $("#rt-password-repeat").css('border', 'solid 1px green');
    $("#validation-password-repeat").text("")
  } else {
    $("#rt-password-repeat").css('border', 'solid 1px red');
    $("#validation-password-repeat").text("Bitte das Passwort korrekt wiederholen.")

  }
}

function cmdcreateCheck() {
  if ($("#createtext").val().length <= 3) {
    $("#createtext").css('border', 'solid 1px red');
  } else {
    $("#createtext").css('border', 'solid 1px green');
  }
}

function cmdeditCheck() {
  if ($("#edittext").val().length <= 3) {
    $("#edittext").css('border', 'solid 1px red');
  } else {
    $("#edittext").css('border', 'solid 1px green');
  }
}

function onSearchButtonMouseOver() {
  $("#mainbutton").children().fadeOut(100, function() {
    $("#mainbutton").html("<span>Los geht's!</span>");
    $("#mainbutton").children().hide();
    $("#mainbutton").children().fadeIn(200);
  });
}

function onSearchButtonMouseOut() {
  $("#mainbutton").children().fadeOut(100, function() {
    $("#mainbutton").html('<i class="fa fa-subway" aria-hidden="true"></i>');
    $("#mainbutton").children().hide();
    $("#mainbutton").children().fadeIn(200);
  });
}

clickEvent();
