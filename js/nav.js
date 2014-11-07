
// Shows the given category's subccategorys in the second column
function showSubcategories(category_id) {
    
    // Highlight only the category selected
    var allCategories = document.getElementsByClassName("category");
    for (var i=0; i<allCategories.length; i++){
        allCategories[i].style.color = "white";
    }
    var currentCategory = document.getElementById(category_id);
    currentCategory.style.color = "orange";    
    
    // Get index in categories
    for (var i = 0; i < store.categories.length; i++){
        if (category_id == store.categories[i]['category_id']){
            var subcategories = store.categories[i]['subcategory'];
        }
    }
    
    // Fill subcategories div
    var subcatColumn = document.getElementById('subcategories');
    var innerText = "<ul>";
    for (var i=0; i<subcategories.length; i++) {
        innerText += "<a href='#'><li class='nav-subcategory' id='" + subcategories[i]['subcategory_id'] + "' onmouseover='highlightSubcategory(\"" + subcategories[i]['subcategory_id'] + "\")'>" + subcategories[i]['subcategory_desc'] +"</li></a>"
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