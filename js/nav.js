
// Clear the subcategories column
function clearColumns() {
     var subcatColumn = document.getElementById('subcategories');
     subcatColumn.innerHTML = " ";
}


$(document).ready(function(){
    $(".category").on("mouseover", function(){
        var category_id = $(this).attr('data-attr-id');
        var subcategories = [];
        for (var i = 0; i < store.categories.length; i++){
            if (category_id == store.categories[i]['category_id']){
               subcategories = store.categories[i]['subcategory'];
            }
        }
        // Fill subcategories div
        var innerText = "<ul>";
        for (var i=0; i<subcategories.length; i++) {
            innerText += "<a href='" + directory + "/home/index.php?subcategory_id= "+ subcategories[i]['subcategory_id'] + "'><li class='nav-subcategory' data-attr-id='" + subcategories[i]['subcategory_id'] + "'>" + subcategories[i]['subcategory_desc'] +"</li></a>";
        }
        innerText += "</ul>"
        $('#subcategories').html(innerText);
        //Changes the color
        $('.category').css('color', 'white');
        $(this).css('color', 'orange')
        console.log(this);
    });
    $(".nav-btn").on("click", function(){
        $(".nav-btn").removeClass('nav-btn-active');
        $(this).addClass('nav-btn-active');
    })
})