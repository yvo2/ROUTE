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

clickEvent();
