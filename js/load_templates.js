$( document ).ready(function() {
    
    // Loads the html templates - header, navigation, footer on the page
    $(function() {
        $("#header").load("http://localhost:8080/itp460/ITP_EmblemObjects/templates/header.html");
        $("#navigation").load("http://localhost:8080/itp460/ITP_EmblemObjects/templates/navigation.html");
        $("#footer").load("http://localhost:8080/itp460/ITP_EmblemObjects/templates/footer.html");
 
    });
    
});
