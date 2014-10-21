
// Searches the DB to retrieve rows containing the search input
function searchDB() {
    
    // Get the search input
    var input = document.forms["search-field"]["search-input"].value;
    console.log(input);
    if (input == "") {
        document.getElementById("objects-display").innerHTML="There were no results for your search.";
    }
    
    if (window.XMLHttpRequest) {
    // Code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
        } else { // Code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            
            // Parse the JSON string returned from the php script
            var result = JSON.parse(xmlhttp.responseText);
            console.log(result);
            var allObjects = "";
            if (result.length == 0) {
                allObjects = "There were no results for your search."
            } else {
                
                /************/
                
                // Here's where you determine what to do with each object returned
                // I'm currently calling displayObject to print out the object's name, category, & subcategory
                
                // Display each result
                for (var i=0; i<result.length; i++){
                    var obj = result[i];
                    allObjects += displayObject(obj.item_name, obj.category_desc, obj.subcategory_desc);
                }
            }
            document.getElementById("objects-display").innerHTML= allObjects;
            
            
            
        }
    }
    xmlhttp.open("GET","../php/json-search-db.php?q=" + input, true);
    xmlhttp.send();
    
    return false;
    
}


// Temp function that displays the name, category, & subcategory of the relevant rows retrieved
function displayObject(objectName, category, subcategory ) {
    var object = "";
    object += "<div>";
    object += "<p>Name: " + objectName + ", Category: " + category + ", Subcategory: " + subcategory + "</p>";
    object += "</div>";
    return object;
}