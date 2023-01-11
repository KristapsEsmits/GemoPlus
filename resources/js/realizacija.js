// meklesana
//definejam drop-down list un elementus, kurus jaslepj/japarada mainigajos
const select = document.getElementById("search_param");

const precesID = document.getElementById("Preces_ID");
const nosaukums = document.getElementById("Nosaukums");
const datums = document.getElementById("Datums");
const termins = document.getElementById("Termins");
const cenaBezPVN = document.getElementById("Cena_Bez_PVN");
const skaits = document.getElementById("Skaits");
const pardotaisDaudzums = document.getElementById("Pārdotais_daudzums");

const elements = [precesID, nosaukums, datums, termins, cenaBezPVN, skaits, pardotaisDaudzums];

// pievienojam klikska event-listener
select.addEventListener("change", function() {
    const selectedValue = this.options[this.selectedIndex].value;

    for (let i = 0; i < elements.length; i++) {
        if (selectedValue == "Preces_ID") {
            
        }
    }
});