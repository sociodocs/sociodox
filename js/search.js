function Search() {
    var str = document.getElementById("search").value;
        if (str.length == 0) {
            document.getElementById("ts").innerHTML = "";
            return;
        }else{
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ts").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "search.php?s=" + str, true);
        xmlhttp.send();
    }
}