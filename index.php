<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <select id="select" onchange="displayholiday(this.value)">
        <option value="St013">johor</option>
        <option value="St002">kedah</option>
        <option value="St005">Kelantan</option>
        <option value="St012">Melaka</option>
        <option value="St011">Negeri Sembilan</option>
    </select>
    <table>
        <tr>
            <th>TARIKH</th>
            <th>RAMALAN</th>
        </tr>
        <tbody id="index">

        </tbody>
    </table>
</body>
</html>
<script>
function displayholiday(selectvalue) {
    fetch("https://www.met.gov.my/forecast/weather/state/"+selectvalue+"/")
    .then(response => response.text())
    .then(displaytext =>{
        const output=document.createElement("div")
        output.innerHTML=displaytext
        const disply = output.querySelectorAll("table tbody tr");
        if (disply) {
            document.getElementById("index").innerHTML=""
            disply.forEach(display => {
                let date=display.childNodes[1].innerHTML;
                let dates=display.childNodes[5].innerHTML;
                console.log(date);
                document.getElementById("index").innerHTML+="<td>"+date+"</td><td>"+dates+"</td>"
                //document.getElementById("index").innerHTML+=

            });
            
            /*for (let index = 0; index < disply.length; index++) {
                document.getElementById("index").innerHTML = disply[index].innerHTML;
                document.getElementsByTagName("img").src='https://www.met.gov.my/images/icon/observation/thunderstorm.png?nocache=1715221569311';
            }*/
        }else{
            document.getElementById("index").innerHTML ="<tr><td colspan='3'>Celender record are of "+display+" are not valid yet</td></tr>"
        }
    })
}
/*function fetchholiday(year){
    let a=year.toString();
    fetch("https://publicholidays.com.my/penang/"+a+"-dates/")
    .then(response => response.text())
        .then(html => {
            const tempElement = document.createElement("div");
            tempElement.innerHTML = html;
            const tableContent = tempElement.querySelectorAll(".publicholidays tbody tr");
            arr=[];
            if (tableContent) {
                tableContent.forEach(eachrow=>{
                let firstc=eachrow.firstChild.innerHTML;
                if(firstc.length<10){
                    arr.push(firstc);
                }
            })
        }
    })
}*/
displayholiday("St013")
</script>
<style>
    table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
}

th {
    background-color: #4CAF50;
    color: white;
}

td {
    background-color: #f9f9f9;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

select {
    padding: 10px;
    font-size: 16px;
    margin-bottom: 20px;
}

body {
    font-family: Arial, sans-serif;
    padding: 20px;
}

</style>