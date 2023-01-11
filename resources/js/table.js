/*Filtrs*/////////////////////////////////////////////////////////////////////////////////
function sortTableByColumn(table, column, asc = true) {
	const dirModifier = asc ? 1 : -1;
	const tBody = table.tBodies[0];
	const rows = Array.from(tBody.querySelectorAll("tr"));

	// Sort each row
	const sortedRows = rows.sort((a, b) => {
		const aColText = a.querySelector(`td:nth-child(${column + 1})`).textContent.trim();
		const bColText = b.querySelector(`td:nth-child(${column + 1})`).textContent.trim();

		return aColText > bColText ? (1 * dirModifier) : (-1 * dirModifier);
	});

	// Remove all existing TRs from the table
	while (tBody.firstChild) {
		tBody.removeChild(tBody.firstChild);
	}

	// Re-add the newly sorted rows
	tBody.append(...sortedRows);

	// Remember how the column is currently sorted
	table.querySelectorAll("th").forEach(th => th.classList.remove("th-sort-asc", "th-sort-desc"));
	table.querySelector(`th:nth-child(${column + 1})`).classList.toggle("th-sort-asc", asc);
	table.querySelector(`th:nth-child(${column + 1})`).classList.toggle("th-sort-desc", !asc);
}

document.querySelectorAll(".table-sortable th").forEach(headerCell => {
	if (headerCell.innerHTML !== "Rediģēt") {
        headerCell.addEventListener("click", () => {
            const tableElement = headerCell.parentElement.parentElement.parentElement;
            const headerIndex = Array.prototype.indexOf.call(headerCell.parentElement.children, headerCell);
            const currentIsAscending = headerCell.classList.contains("th-sort-asc");

            sortTableByColumn(tableElement, headerIndex, !currentIsAscending);
        });
    }
});

/*Pievieot datus darbība*///////////////////////////////////////////////////////////////
document.getElementById("add-btn").addEventListener("click", function() {
    document.getElementById("add-pop").style.display = "block";
    document.getElementById("add-btn").style.display = "none";
    document.getElementById("veiksmigi").style.display = "none";
});

/*Atcelt pievienošanu*//////////////////////////////////////////////////////////////////
document.getElementById("close-btn").addEventListener("click", function() {
    let getValue = document.getElementsByClassName("input");
    for (const element of getValue) {
        element.value = "";
    }
    document.getElementById("add-pop").style.display = "none";
    document.getElementById("add-btn").style.display = "block";
});

