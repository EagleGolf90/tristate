function displayMessage(msg) { alert(msg); }

function removeOptions(tagName) {
  var options = document.querySelectorAll(tagName + ' option');
  options.forEach(o => o.remove());
}

function showGolfers(tagName, orgNo) {
  if (tagName == "#playerID") {
    removeOptions(tagName);
  }

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var newOptions = this.responseText;
      $('#playerID').append(newOptions);
    }
  }

  xmlhttp.open("GET","../handicap/get_data.php?p1=" + orgNo, true);
  xmlhttp.send();
}

function changeGroup(optionValue) { removeOptions("#playerID", 0); }

function calculateHandicap() {
  var course_rating = parseFloat($('#course_rating').val());
  var slope_rating = parseInt($('#slope_rating').val());
  var score = parseInt($('#score').val());
  var handicap = (((score - course_rating) * 113) / slope_rating);
  $('#handicap').text(handicap.toFixed(2));
}

$(document).ready(function () {
  $("#groupID").change(function () {
    if ($(this).val() != "") {
      showGolfers("#playerID", $(this).val());
    }
  });

  $('#slope_rating').change(function () {
    calculateHandicap();
  });
});
