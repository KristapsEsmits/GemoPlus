const select = document.getElementById("filter_param");
const inputElements = document.querySelectorAll("form input[type='text'],form input[type='date'],form select");

select.addEventListener("change", function() {
    const selectedValue = this.options[this.selectedIndex].value;

    inputElements.forEach(function(inputElement) {
        if (selectedValue === "Preces_ID") {
            if (inputElement.id !== selectedValue && inputElement.name !== "filter_param") {
                inputElement.hidden = true;
            } else {
                inputElement.hidden = false;
            }
        } else if (selectedValue === "Nosaukums") {
            if (inputElement.id !== selectedValue && inputElement.name !== "filter_param") {
                inputElement.hidden = true;
            } else {
                inputElement.hidden = false;
            }
        }else if (selectedValue === "Datums") {
            if (inputElement.id !== selectedValue && inputElement.name !== "filter_param") {
                inputElement.hidden = true;
            } else {
                inputElement.hidden = false;
            }
        } else if (selectedValue === "Termins") {
            if (inputElement.id !== selectedValue && inputElement.name !== "filter_param") {
                inputElement.hidden = true;
            } else {
                inputElement.hidden = false;
            }
        } else if (selectedValue === "Cena_Bez_PVN") {
            if (inputElement.id !== selectedValue && inputElement.name !== "filter_param") {
                inputElement.hidden = true;
            } else {
                inputElement.hidden = false;
            }
        } else if (selectedValue === "PVN") {
            if (inputElement.id !== selectedValue && inputElement.name !== "filter_param") {
                inputElement.hidden = true;
            } else {
                inputElement.hidden = false;
            }
        } else if (selectedValue === "Skaits") {
            if (inputElement.id !== selectedValue && inputElement.name !== "filter_param") {
                inputElement.hidden = true;
            } else {
                inputElement.hidden = false;
            }
        } else if (selectedValue === "Pārdotais_daudzums") {
            if (inputElement.id !== selectedValue && inputElement.name !== "filter_param") {
                inputElement.hidden = true;
            } else {
                inputElement.hidden = false;
            }
        } else if (selectedValue === "Kategorijas_ID") {
            if (inputElement.id !== selectedValue && inputElement.name !== "filter_param") {
                inputElement.hidden = true;
            } else {
                inputElement.hidden = false;
            }
        } else if (selectedValue === "Lietotaja_ID") {
            if (inputElement.id !== selectedValue && inputElement.name !== "filter_param") {
                inputElement.hidden = true;
            } else {
                inputElement.hidden = false;
            }
        }
    });
});


// Get the select field
var selectField = document.querySelector("select[name='filter_param']");

// Add an event listener that listens for changes to the selected option
selectField.addEventListener("change", function() {
  // Get the selected parameter
  var selectedParam = this.value;
  
  // Get the value of the corresponding form element
  var selectedParamValue = document.querySelector("#" + selectedParam).value;
  
  
  // Assign the value to the hidden input field
  document.querySelector("#selected_param_value").value = selectedParamValue;
});


// Get the form element
var form = document.querySelector("form");

// Add an event listener that listens for the submit event
form.addEventListener("submit", function(event) {
    event.preventDefault();

    // Get the selected parameter
    var selectedParam = document.querySelector("select[name='filter_param']").value;
    // Get the value of the corresponding form element
    var selectedParamValue = document.querySelector("#" + selectedParam).value;
    console.log(selectedParam);

    // Create a new XHR object
    var xhr = new XMLHttpRequest();

    // Open a connection to the server-side script
    xhr.open("POST", "filter/filter_realizacija.php", true);

    // Set the request headers
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Send the request
    xhr.send("selected_param=" + selectedParam + "&selected_param_value=" + selectedParamValue);

    // Handle the response
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Get the response from the server
            var response = xhr.responseText;
            // Perform some action with the response
            // ...
        }
    }
});
