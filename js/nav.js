
// Clear the subcategories column
function clearColumns() {
     var subcatColumn = document.getElementById('subcategories');
     subcatColumn.innerHTML = " ";
}


$(document).ready(function(){
    $(".category").on("mouseover", function(){
        var category_id = $(this).attr('data-attr-id');
        for (var i = 0; i < store.categories.length; i++){
            if (category_id == store.categories[i]['category_id']){
                var subcategories = store.categories[i]['subcategory'];
            }
        }
        // Fill subcategories div
        var innerText = "<ul>";
        for (var i=0; i<subcategories.length; i++) {
            innerText += "<a href='#'><li class='nav-subcategory' data-attr-id='" + subcategories[i]['subcategory_id'] + "'>" + subcategories[i]['subcategory_desc'] +"</li></a>";
        }
        innerText += "</ul>"
        $('#subcategories').html(innerText);
    });
})