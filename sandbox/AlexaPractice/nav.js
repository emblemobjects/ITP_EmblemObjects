var categoriesArray = ["Accessories", "Art", "Gadgets", "Home", "Jewelry", "Novelty"];
var subcategoriesArray = [["Cases", "Keychains", "Belts & Buckles"], // Accessories
                     ["Sculpture", "Parametics", "Themed"], // Art
                     ["Parts", "Props"], // Gadgets
                     ["Placements", "Holders", "Vases", "Lighting", "Desktop"], // Home
                     ["Rings", "Pendants", "Necklaces", "Bracelets", "Earrings", "Cufflinks", "Watches"], // Jewelry
                     ["Desk Toys", "Puzzles"] // Novelty
                     ];



// Shows the given category's subccategorys in the second column
function showSubcategories(category) {
    
    // Highlight only the category selected
    var allCategories = document.getElementsByClassName("category");
    for (var i=0; i<allCategories.length; i++){
        allCategories[i].style.color = "white";
    }
    var currentCategory = document.getElementById(category);
    currentCategory.style.color = "orange";    
    
    // Get index in categories
    var index = categoriesArray.indexOf(category);
    var subcategories = subcategoriesArray[index];
    
    // Fill subcategories div
    var subcatColumn = document.getElementById('subcategories');
    var innerText = "<ul>";
    for (var i=0; i<subcategories.length; i++) {
        innerText += "<a href='#'><li class='nav-subcategory' id='" + subcategories[i] + "' onmouseover='highlightSubcategory(\"" + subcategories[i] + "\")'>" + subcategories[i] +"</li></a>"
    }
    innerText += "</ul>"
    subcatColumn.innerHTML = innerText;
}

function clearColumns() {  
    unHightlightCategories();
    clearSubcategories();
    console.log("Cleared");
}

// Make sure no categories are highlighted
function unHightlightCategories() {
    var allCategories = document.getElementsByClassName("category");
    for (var i=0; i<allCategories.length; i++){
        allCategories[i].style.color = "white";
    }
}


// Clear the subcategories column
function clearSubcategories() {
     var subcatColumn = document.getElementById('subcategories');
     subcatColumn.innerHTML = " ";
}


function highlightSubcategory(subcategory){
    var allCategories = document.getElementsByClassName("nav-subcategory");
    for (var i=0; i<allCategories.length; i++){
        allCategories[i].style.color = "white";
    }
    var currentSubcategory = document.getElementById(subcategory);
    currentSubcategory.style.color = "orange";
}