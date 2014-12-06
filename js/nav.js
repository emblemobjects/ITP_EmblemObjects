// Clear the subcategories column
function clearColumns() {
    var subcatColumn = document.getElementById('subcategories');
    subcatColumn.innerHTML = " ";
}

// Adjust the position of the divs to line up with their columns
function adjustPosition() {
    var navHeaders = document.querySelectorAll(".nav > li > a");
    var navColumns = document.querySelectorAll(".nav > li > div");

    $(navColumns[0]).css("height", "240px");

    var newPositionNav1 = parseInt($(navHeaders[0]).css("width").slice(0, -2)) + 40;
    $(navColumns[1]).css("left", newPositionNav1 + "px");
    $(navColumns[1]).css("width", "230px");
    $(navColumns[1]).css("background-color", $("#categories").css("background-color"));

    var newPositionNav2 = newPositionNav1 + parseInt($(navHeaders[1]).css("width").slice(0, -2)) + 40;
    $(navColumns[2]).css("left", newPositionNav2 + "px");
    $(navColumns[2]).css("width", "200px");
    $(navColumns[2]).css("background-color", $("#categories").css("background-color"));
}

function highlightSubcategory(cat) {
     $('.nav-subcategory').css('color', 'white');
     $(cat).css('color', 'orange');
}

$(document).ready(function () {
    $(".category").on("mouseover", function () {
        var category_id = $(this).attr('data-attr-id');
        for (var i = 0; i < store.categories.length; i++) {
            if (category_id == store.categories[i]['category_id']) {
                var subcategories = store.categories[i]['subcategory'];
            }
        }
        // Fill subcategories div
        var innerText = "<ul>";
        for (var i = 0; i < subcategories.length; i++) {
            innerText += "<a href='" + directory + "/home/index.php?subcategory_id= " + subcategories[i]['subcategory_id'] + "'><li class='nav-subcategory' onmouseover='highlightSubcategory(this)' data-attr-id='" + subcategories[i]['subcategory_id'] + "'>" + subcategories[i]['subcategory_desc'] + "</li></a>";
        }
        innerText += "</ul>";
        $('#subcategories').html(innerText);
        //Changes the color
        $('.category').css('color', 'white');
        $(this).css('color', 'orange');
    });
    $(".nav-btn").on("click", function () {
        $(".nav-btn").removeClass('nav-btn-active');
        $(this).addClass('nav-btn-active');
        console.log("changed");
    });
    
    adjustPosition();
});