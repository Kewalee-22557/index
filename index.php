<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Weather</title>
</head>
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
 <style> 
 
 </style>

<body>
    <style>  

        .card {
            background-color: rgb(247, 208, 229);
        }
        
            </style>
            <div class ="card "  >
            <div class= "container">
                <div align = "center">
            <h1>ข้อมูลสภาพอากาศ </h1>
                <div class="temp">
                        <h3>อุณหภูมิ (TEMP)</h3>
                        <span id="temperature"></span>
                        <iframe  width="450" height="260" style="border: 5px solid #eba346;" src="https://thingspeak.com/channels/1654128/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=240&title=TEMP&type=line"></iframe>
                </div>
        
                <div class="Hum">
                        <h3>ความชื้น (HUMI)</h3>
                        <span id="hum"></span>
                        <iframe width="450" height="260" style="border: 5px solid #dc2eff ;" src="https://thingspeak.com/channels/1654128/charts/3?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=240&title=HUMP&type=line"></iframe>
                </div>
        
                <div class="light">
                        <h3>LED</h3>
                        <span id="LEDState"></span>
                        <iframe width="450" height="260" style="border: 5px solid #0ff087;" src="https://thingspeak.com/channels/1654128/charts/5?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=240&title=LED&type=line"></iframe>
                </div>
            </div>
        
        </body>
        </div>
<script>
    function loadvalue(){
        var stutus; 
        var url = "API Thingspeak"

        $.getJSON(url)
            .done((done)=>{
                console.log(data)

                var temperature = data.feeds[0].field1;
                var showtemp = parseFloat(temperature).toFixed(2);

                var hum = data.feeds[0].field2;
                var showhum = parseFloat(hum).toFixed(2);

                var LEDState = data.feeds[0].field4;

                if(LEDState == 0){
                    state = "OFF"
                }else if (LEDState == 1){
                    state = "ON"
                }

                $("#temperature").text(showtemp);
                $("#hum").text(showhum)
                $("#LEDState").text(state);
            }).fail((xhr, status, err)=>{
                console.log("ERROR")
            })
    }
        $(()=>{
            loadvalue();
        })
</script>
