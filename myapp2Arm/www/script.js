function fillSelect(file,ele) {
 var client = new XMLHttpRequest();
    client.open('GET', file);
    client.onreadystatechange = function() {
        var select = document.getElementById(ele),
            options = client.responseText.split("\n"),
            i,
            _html = "";
        for ( i = 0; i < options.length; i++ ) {
            _html += "<div id=" + "yourDivId" + ">" + "<option value=" + options[i] +">" + options[i] + "</option>" + "</div>";
        }
        select.innerHTML = _html;
    }
client.send();}
