<script>

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
        document.getElementById("demo").innerHTML = myObj.rows[0].elements[0].distance.text;
    }
};
xmlhttp.open("GET", "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=Washington,DC&destinations=New+York+City,NY&key=AIzaSyBKNst9JE89f4lHuNXQFTUgZKh8VZpvR6M", true);
xmlhttp.send();

</script>
