<?php  
include 'connect.php';
 $query = "SELECT status, count(*) as number FROM booths GROUP BY status" ;    
 $result = mysqli_query($con, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>   
      <head>
          <title>หน้าหลัก</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <link rel="stylesheet" href="css/back-top.css">
          <link rel="stylesheet" href="css/main.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
          <script src="js/back-top.js"></script>  
          
         <!--  555555 -->
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  

          <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Sex', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["status"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'จำนวนเพศชายและหญิงที่มาใช้งาน',    
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }
           </script>    

         <!--  555555 -->

      </head>  
      <body> <div id="pagewrap">
        <div class="container" id="conta">
            <img class="td-retina-data" data-retina="pic/logo.jpg" src="pic/logo.gif" alt="" / width="140" height="180" style="margin-left:40px">
            <img class="td-retina-data" data-retina="pic/logo.jpg" src="pic/logo3.png" alt="" / width="600" height="120" style="margin-top:50px">

            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header"></div>
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="main.html" id="active1">หน้าหลัก</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="daibete.html" id="active1">ความรู้เกี่ยวกับเบาหวาน
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="list-group-item">
                                    <a href="daibete.html" id="active1">เบาหวานคืออะไร?</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="daibete.html#เบาหวานเกิดได้อย่างไร?" id="active1">เบาหวานเกิดได้อย่างไร?</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="daibete.html#ใครบ้างมีปัจจัยเสี่ยงเป็นเบาหวาน?" id="active1">ใครบ้างมีปัจจัยเสี่ยงเป็นเบาหวาน?</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="daibete.html#เบาหวานมีอาการอย่างไร?" id="active1">เบาหวานมีอาการอย่างไร?</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="daibete.html#แพทย์วินิจฉัยเบาหวานได้อย่างไร?" id="active1">แพทย์วินิจฉัยเบาหวานได้อย่างไร?</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="daibete.html#รักษาเบาหวานได้อย่างไร?" id="active1">รักษาเบาหวานได้อย่างไร?</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="daibete.html#เบาหวานรุนแรงไหม? มีผลข้างเคียงอย่างไร?" id="active1">เบาหวานรุนแรงไหม? มีผลข้างเคียงอย่างไร?</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="daibete.html#ดูแลตนเองอย่างไรเมื่อเป็นเบาหวาน? ควรพบแพทย์เมื่อไร?" id="active1">ดูแลตนเองอย่างไรเมื่อเป็นเบาหวาน? ควรพบแพทย์เมื่อไร?</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="daibete.html#ป้องกันเบาหวานได้อย่างไร?" id="active1">ป้องกันเบาหวานได้อย่างไร?</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" id="active">ประเมินความเสี่ยง</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row content">
                    <div class="col-sm-9">
                      <div style="width:900px;">  
                          <h3 align="left">เพศ</h3>   

         <!--  555555 -->

                          <div id="piechart" style="width: 900px; height: 500px;"></div>            
                          
         <!--  555555 -->

                      </div>
                       
                    </div>

                    <div class="col-sm-3 sidenav" id="bor">
                        <div class="panel-heading">
                            <h4>บทความน่ารู้เกี่ยวกับโรคเบาหวาน</h4>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li>
                                    <a href="know1.html" id="active2">
                                        <p class="rcolor">
                                            <img src="pic/png/01.png">&nbsp;&nbsp;ภาวะน้ำตาลในเลือดต่ำ ในผู้ป่วยเบาหวาน</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="know2.html">
                                        <p class="rcolor">
                                            <img src="pic/png/02.png">&nbsp;&nbsp;เบาหวานในเด็กและวัยรุ่น </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="know3.html">
                                        <p class="rcolor">
                                            <img src="pic/png/03.png">&nbsp;&nbsp;เบาหวานกับการตั้งครรภ์ </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="know4.html">
                                        <p class="rcolor">
                                            <img src="pic/png/04.png">&nbsp;&nbsp;เบาหวานขึ้นตา เบาหวานกินตา </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="know5.html">
                                        <p class="rcolor">
                                            <img src="pic/png/05.png">&nbsp;&nbsp;การดูแลเท้าในโรคเบาหวาน </p>
                                    </a>
                                </li>
                            </ul>
                            <br>
                            <img src="pic/13.jpg" id="img" class="img-thumbnail" height="180" width="180">
                        </div>
                    </div>
                </div>
                <p id="back-top">
                    <a href="#top">
                        <span></span>
                    </a>
                </p>
            </div>
        </div>
    </div>


    <footer class="container-fluid">
        <div class="container">
            <img src="pic/ph.png">
            <p style="font-size:12px; color: white; font-weight: normal;">
                &nbsp;&nbsp;&nbsp;&nbsp;ต.ตลาดขวัญ อ.เมือง จ.นนทบุรี 11000
                <br> &nbsp;&nbsp;&nbsp;&nbsp;โทร.02-590-1000
                <br> &nbsp;&nbsp;&nbsp;&nbsp;e-mail : webmaster@health.moph.go.th</p>
        </div>
    </footer>  
          
           
           
      </body>  
 </html>  