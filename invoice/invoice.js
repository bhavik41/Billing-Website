
function test() {

    var table = document.getElementById("mstrTable");
    var ishigh;

    table.onclick = function (e) {
        e = e || window.event;
        var td = e.target || e.srcElement
        var row = td.parentNode;
        if (ishigh && ishigh != row) {
            ishigh.className = '';
        }
        row.className = row.className === "highlighted" ? "" : "highlighted";
        ishigh = row;

        fillInputs();
        //fillTotal();

    }

    
    var removeButton = document.getElementById("removeButton");
    removeButton.addEventListener("click", function () {
        clearInputs();
    });

    function clearInputs() {
        // Clear the values of auto-filled fields
        document.getElementById("productId").value = "";
        document.getElementById("productName").value = "";
        document.getElementById("productCost").value = "";
        document.getElementById("hsnCode").value = "";
        document.getElementById("igst").value = "";
        document.getElementById("cgst").value = "";
        document.getElementById("sgst").value = "";

        // Clear the values of auto-filled fields
        var quantityInput = document.getElementById("quantity");
        var igsValueInput = document.getElementById("igstValue");
        var cgsValueInput = document.getElementById("cgstValue");
        var sgstValueInput = document.getElementById("sgstValue");
        var tCost = document.getElementById("tCost");
        var pCost = document.getElementById("pCost");

        if (quantityInput) quantityInput.value = "";
        if (igsValueInput) igsValueInput.value = "";
        if (cgsValueInput) cgsValueInput.value = "";
        if (sgstValueInput) sgstValueInput.value = "";
        if (pCost) pCost.value = "";
        if (tCost) tCost.value = "";

        // ... other fields
        return false;

    }

    function fillInputs() {
        var selectedRow = document.querySelector("#mstrTable tr.highlighted");
        if (selectedRow) {
            var cells = selectedRow.cells;

            document.getElementById("productId").value = cells[0].innerText;
            document.getElementById("productName").value = cells[1].innerText;
            document.getElementById("productCost").value = cells[2].innerText;
            document.getElementById("hsnCode").value = cells[3].innerText;
            document.getElementById("igst").value = cells[4].innerText;
            document.getElementById("cgst").value = cells[5].innerText;
            document.getElementById("sgst").value = cells[6].innerText;

           
        }
    }

    function calculateValues() {
        // Get the quantity entered by the user
        var quantityElement = document.getElementById("quantity");
        var costElement = document.getElementById("productCost");
        var igstElement = document.getElementById("igst");
        var cgstElement = document.getElementById("cgst");
        var sgstElement = document.getElementById("sgst");
    
        // Check if the elements exist in the DOM
        if (!quantityElement || !costElement || !igstElement || !cgstElement || !sgstElement) {
            console.error("One or more elements not found");
            return;
        }
    
        var quantity = parseFloat(quantityElement.value) || 0;
        var cost = parseFloat(costElement.value) || 0;
    
        // Get the IGST, CGST, SGST percentages
        var igstPercentage = parseFloat(igstElement.value) || 0;
        var cgstPercentage = parseFloat(cgstElement.value) || 0;
        var sgstPercentage = parseFloat(sgstElement.value) || 0;
    
        // Calculate IGST, CGST, SGST values
        var igstValue = (igstPercentage / 100) * quantity * cost;
        var cgstValue = (cgstPercentage / 100) * quantity * cost;
        var sgstValue = (sgstPercentage / 100) * quantity * cost;
        
        var pCost = quantity * cost; 
    
        // Calculate total product cost
        var totalProductCost = quantity * cost + igstValue + cgstValue + sgstValue;
    console.log(totalProductCost);
        // Set the calculated values in the respective fields
        setValue("igstValue", igstValue.toFixed(2));
        setValue("cgstValue", cgstValue.toFixed(2));
        setValue("sgstValue", sgstValue.toFixed(2));
        setValue("pCost", pCost.toFixed(2));
        setValue("tCost", totalProductCost.toFixed(2));
    }
    
    // Function to safely set the value of an element
    function setValue(elementId, value) {
        var element = document.getElementById(elementId);
        if (element) {
            element.value = value;
        } else {
            console.error("Element not found: " + elementId);
        }
    }
    
    

    document.getElementById("quantity").addEventListener("input", function() {
        console.log("Quantity input changed");
        calculateValues();
    });
    


}






