
function fillStateCode() {
    // Define a JavaScript object mapping state names to state codes
    var stateCodeMap = {
        "JAMMU AND KASHMIR": "01",
        "HIMACHAL PRADESH": "02",
        "PUNJAB": "03",
        "CHANDIGARH": "04",
        "UTTARAKHAND": "05",
        "HARYANA": "06",
        "DELHI": "07",
        "RAJASTHAN": "08",
        "UTTAR PRADESH": "09",
        "BIHAR": "10",
        "SIKKIM": "11",
        "ARUNACHAL PRADESH": "12",
        "NAGALAND": "13",
        "MANIPUR": "14",
        "MIZORAM": "15",
        "TRIPURA": "16",
        "MEGHALAYA": "17",
        "ASSAM": "18",
        "WEST BENGAL": "19",
        "JHARKHAND": "20",
        "ODISHA": "21",
        "CHATTISGARH": "22",
        "MADHYA PRADESH": "23",
        "GUJARAT": "24",
        "DADRA AND NAGAR HAVELI" : "26", 
        "DAMAN": "26",
        "DIU": "26",
        "MAHARASHTRA": "27",
        "ANDHRA PRADESH": "28",
        "KARNATAKA": "29",
        "GOA": "30",
        "LAKSHADWEEP": "31",
        "KERALA": "32",
        "TAMIL NADU": "33",
        "PUDUCHERRY": "34",
        "ANDAMAN AND NICOBAR ISLANDS": "35",
        "TELANGANA": "36",
        "ANDHRA PRADESH": "37",
        "LADAKH (NEWLY ADDED)": "38",
        "OTHER TERRITORY": "97",
        "CENTRE JURISDICTION": "99"
      };


    // Retrieve the selected state value
    var selectedState = $("#buyerState").val();

    // Check if the selected state exists in the mapping
    if (stateCodeMap.hasOwnProperty(selectedState)) {
        // Populate the state code input field with the corresponding state code
        $("#buyerCode").val(stateCodeMap[selectedState]);
    } else {
        // If the state is not found in the mapping, clear the state code input field
        $("#buyerCode").val('');
    }
}
