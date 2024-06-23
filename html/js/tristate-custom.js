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

$(document).ready(function () {
  $("#groupID").change(function () {
    if ($(this).val() != "") {
      showGolfers("#playerID", $(this).val());
    }
  });
});
