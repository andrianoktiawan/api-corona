<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <!-- CSS -->
    <link rel="stylesheet" href="styles/main.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">


    <title>Pantau Penyebaan Virus Covid-19</title>
  </head>
  <body>
    <div class="jumbotron jumbotron-fluid text-center jmbtrn ">
      <div class="container">
        <h1 class="display-4 header">Corona Virus</h1>
        <div class="lead text-dark">
          <h4>PANTAU PENYEBARAN VIRUS <strong>COVID-19</strong> DI DUNIA
          <br>SECARA REAL-TIME
          <br>Mari bersama menjaga kebersihan diri kita.
          </h4>
        </div>
      </div>
    </div>


    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="bg-danger box text-white">
            <div class="row">
              <div class="col-md-6">
                <h5>Positif</h5>
                <h2 id="data-kasus">1234</h2>
                <h5>orang</h5>
              </div>
              <div class="col-md-4">
                <img src="img/sad.svg" style="width: 100px;">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="bg-info box text-white">
            <div class="row">
              <div class="col-md-6">
                <h5>Meniggal</h5>
                <h2 id="data-mati">1234</h2>
                <h5>orang</h5>
              </div>
              <div class="col-md-4">
                <img src="img/cry.svg" style="width: 100px;">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="bg-success box text-white">
            <div class="row">
              <div class="col-md-6">
                <h5>Sembuh</h5>
                <h2 id="data-sembuh">1234</h2>
                <h5>orang</h5>
              </div>
              <div class="col-md-4">
                <img src="img/happy.svg" style="width: 100px;">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-6"><br>
          <div class="bg-secondary box text-white">
            <div class="row">
              <div class="col-md-7">
                <h2>INDONESIA</h2>
                <h5 id="data-id">Positif : 1234 orang
                  <br> Meninggal : 58 orang
                  <br> Sembuh : 31 orang</h5>
              </div>
              <div class="col-md-5">
                <img src="img/indonesia.svg" style="width: 150px;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <h5>Find Us On Maps</h5>
          <iframe class src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15863.698259735098!2d106.99605351429449!3d-6.273649519959019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x33c78b11a9941359!2sMartabak%20Jeffry!5e0!3m2!1sen!2sid!4v1607437877274!5m2!1sen!2sid" width="480" height="400" frameborder="0" style="border-radius:15px" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <div class="col-md-3"></div>
      </div>  
    </div>

    <footer class="bg-dark text-white text-center mt-4 pt-3 pb-2">
      Created by. Andrian Oktiawan
    </footer>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>

<script>
  $(document).ready(function(){

    //panggil fungsi menampilkan data global
    semuaData();
    dataNegara();

    //untuk refresh otomatis
    setInterval(function(){
      semuaData();
      dataNegara();
    }, 3000);

      function semuaData(){
        $.ajax({
          url : 'https://coronavirus-19-api.herokuapp.com/all',
          success : function(data){
            try{
              var json = data;
              var kasus = data.cases;
              var meninggal = data.deaths;
              var sembuh = data.recovered;

              $('#data-kasus').html(kasus);
              $('#data-mati').html(meninggal);
              $('#data-sembuh').html(sembuh);

            }catch{
              alert('error');
            }
          }
        });
      }
      
      function dataNegara(){
        $.ajax({
          url : 'https://coronavirus-19-api.herokuapp.com/countries',
          success : function(data)
          {
            try{
              var json = data;
              var html = [];

              if(json.length > 0){
                var i;
                for(i = 0; i < json.length; i++){
                  var dataNegara = json[i];
                  var namaNegara = dataNegara.country;

                  if(namaNegara === 'Indonesia'){
                    var kasus = dataNegara.cases;
                    var mati = dataNegara.deaths;
                    var sembuh = dataNegara.recovered;

                    $('#data-id').html('Positif : '+kasus+
                    ' orang <br> Meninggal : '+mati+
                    ' orang <br> Sembuh : '+sembuh+' orang')
                  }
                }
              }
            }catch{
              alert('error');
            }
          }
        });
      }
  });
</script>