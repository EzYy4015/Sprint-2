function validateForm() {
    let x = document.forms["AddBanner"]["banner"].value;
    if (x == "") {
      alert("Name must be filled out");
      return false;
    }
  }