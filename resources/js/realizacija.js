const select = document.getElementById("search_param");
const inputElements = document.querySelectorAll("form input[type='text'],form input[type='date'],form select");

select.addEventListener("change", function() {
    const selectedValue = this.options[this.selectedIndex].value;

    inputElements.forEach(function(inputElement) {
        if (selectedValue === "Preces_ID") {
            if (inputElement.name !== "preces_ID" && inputElement.name !== "search_param") {
                inputElement.hidden = true;
            } else {
                console.log(inputElement.name);
                inputElement.hidden = false;
            }
        } else if (selectedValue === "Nosaukums") {
            if (inputElement.name !== "preces_nosaukums" && inputElement.name !== "search_param") {
                inputElement.hidden = true;
            } else {
                inputElement.hidden = false;
            }
        }else if (selectedValue === "Datums") {
            if (inputElement.name !== "datums" && inputElement.name !== "search_param") {
                inputElement.hidden = true;
            } else {
                inputElement.hidden = false;
            }
        } else if (selectedValue === "Termins") {
            if (inputElement.name !== "termins" && inputElement.name !== "search_param") {
                inputElement.hidden = true;
            } else {
                inputElement.hidden = false;
            }
        } else if (selectedValue === "Cena_Bez_PVN") {
            if (inputElement.name !== "cena_bez_PVN" && inputElement.name !== "search_param") {
                inputElement.hidden = true;
            } else {
                inputElement.hidden = false;
            }
        } else if (selectedValue === "PVN") {
            if (inputElement.name !== "pvn_izvele" && inputElement.name !== "search_param") {
                inputElement.hidden = true;
            } else {
                inputElement.hidden = false;
            }
        } else if (selectedValue === "Skaits") {
            if (inputElement.name !== "skaits" && inputElement.name !== "search_param") {
                inputElement.hidden = true;
            } else {
                inputElement.hidden = false;
            }
        } else if (selectedValue === "Pārdotais_daudzums") {
            if (inputElement.name !== "daudzums" && inputElement.name !== "search_param") {
                inputElement.hidden = true;
            } else {
                inputElement.hidden = false;
            }
        } else if (selectedValue === "Kategorijas_ID") {
            if (inputElement.name !== "preces_kategorija" && inputElement.name !== "search_param") {
                inputElement.hidden = true;
            } else {
                inputElement.hidden = false;
            }
        } else if (selectedValue === "Lietotaja_ID") {
            if (inputElement.name !== "lietotaja_ID" && inputElement.name !== "search_param") {
                inputElement.hidden = true;
            } else {
                inputElement.hidden = false;
            }
        }
    });
});


var addBtn = document.getElementById("add-btn");
addBtn.addEventListener("click", function() {
    var data = {};
    var inputElements = document.querySelectorAll("form input[type='text'],form input[type='date'],form select");
    inputElements.forEach(function(inputElement) {
        if (!inputElement.hidden) {
            data[inputElement.name] = inputElement.value;
        }
    });
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "filter/filter_realizacija.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
        }
    };
    xhr.send(JSON.stringify(data));
});

