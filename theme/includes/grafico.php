    <!-- Despesa-->
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_receita>0, 0, valor)),2) as despesa from banco where MONTH(data) = MONTH(current_date()) and year(data) = year(current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="des">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
            if ($rowUser['despesa'] == null){
              echo "0,00";  
            } print($rowUser['despesa']);
            }
        }
        ?>  
    </h5>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_receita>0, 0, valor)),2) as despesa from banco where MONTH(data) = MONTH(INTERVAL -1 month + current_date()) and year(data) = year(INTERVAL -1 month + current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="des2">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
              if ($rowUser['despesa'] == null){
                echo "0,00";  
              } print($rowUser['despesa']);
              }
        }
        ?>  
    </h5>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_receita>0, 0, valor)),2) as despesa from banco where MONTH(data) = MONTH(INTERVAL -2 month + current_date()) and year(data) = year(INTERVAL -2 month + current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="des3">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
              if ($rowUser['despesa'] == null){
                echo "0,00";  
              } print($rowUser['despesa']);
              }
        }
        ?>  
    </h5>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_receita>0, 0, valor)),2) as despesa from banco where MONTH(data) = MONTH(INTERVAL -3 month + current_date()) and year(data) = year(INTERVAL -3 month + current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="des4">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
              if ($rowUser['despesa'] == null){
                echo "0,00";  
              } print($rowUser['despesa']);
              }
        }
        ?>  
    </h5>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_receita>0, 0, valor)),2) as despesa from banco where MONTH(data) = MONTH(INTERVAL -4 month + current_date()) and year(data) = year(INTERVAL -4 month + current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="des5">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
              if ($rowUser['despesa'] == null){
                echo "0,00";  
              } print($rowUser['despesa']);
              }
        }
        ?>  
    </h5>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_receita>0, 0, valor)),2) as despesa from banco where MONTH(data) = MONTH(INTERVAL -5 month + current_date()) and year(data) = year(INTERVAL -5 month + current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="des6">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
              if ($rowUser['despesa'] == null){
                echo "0,00";  
              } print($rowUser['despesa']);
              }
        }
        ?>  
    </h5>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_receita>0, 0, valor)),2) as despesa from banco where MONTH(data) = MONTH(INTERVAL -6 month + current_date()) and year(data) = year(INTERVAL -6 month + current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="des7">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
              if ($rowUser['despesa'] == null){
                echo "0,00";  
              } print($rowUser['despesa']);
              }
        }
        ?>  
    </h5>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_receita>0, 0, valor)),2) as despesa from banco where MONTH(data) = MONTH(INTERVAL -7 month + current_date()) and year(data) = year(INTERVAL -7 month + current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="des8">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
              if ($rowUser['despesa'] == null){
                echo "0,00";  
              } print($rowUser['despesa']);
              }
        }
        ?>  
    </h5>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_receita>0, 0, valor)),2) as despesa from banco where MONTH(data) = MONTH(INTERVAL -8 month + current_date()) and year(data) = year(INTERVAL -8 month + current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="des9">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
              if ($rowUser['despesa'] == null){
                echo "0,00";  
              } print($rowUser['despesa']);
              }
        }
        ?>  
    </h5>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_receita>0, 0, valor)),2) as despesa from banco where MONTH(data) = MONTH(INTERVAL -9 month + current_date()) and year(data) = year(INTERVAL -9 month + current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="des10">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
              if ($rowUser['despesa'] == null){
                echo "0,00";  
              } print($rowUser['despesa']);
              }
        }
        ?>  
    </h5>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_receita>0, 0, valor)),2) as despesa from banco where MONTH(data) = MONTH(INTERVAL -10 month + current_date()) and year(data) = year(INTERVAL -10 month + current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="des11">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
              if ($rowUser['despesa'] == null){
                echo "0,00";  
              } print($rowUser['despesa']);
              }
        }
        ?>  
    </h5>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_receita>0, 0, valor)),2) as despesa from banco where MONTH(data) = MONTH(INTERVAL -11 month + current_date()) and year(data) = year(INTERVAL -11 month + current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="des12">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
              if ($rowUser['despesa'] == null){
                echo "0,00";  
              } print($rowUser['despesa']);
              }
        }
        ?>  
    </h5>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_receita>0, 0, valor)),2) as despesa from banco where MONTH(data) = MONTH(INTERVAL -12 month + current_date()) and year(data) = year(INTERVAL -12 month + current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="des13">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
              if ($rowUser['despesa'] == null){
                echo "0,00";  
              } print($rowUser['despesa']);
              }
        }
        ?>  
    </h5>
    <!-- FIM DESPESA-->
    <!-- RECEITA-->
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_despesa>0, 0, valor)),2) as receita from banco where MONTH(data) = MONTH(current_date()) and year(data) = year(current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="rec">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
            if ($rowUser['receita'] == null){
              echo "0,00";  
            } print($rowUser['receita']);
            }
        }
        ?>  
    </h5>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_despesa>0, 0, valor)),2) as receita from banco where MONTH(data) = MONTH(INTERVAL -1 month + current_date()) and year(data) = year(INTERVAL -1 month + current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="rec2">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
              if ($rowUser['receita'] == null){
                echo "0,00";  
              } print($rowUser['receita']);
              }
        }
        ?>  
    </h5>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_despesa>0, 0, valor)),2) as receita from banco where MONTH(data) = MONTH(INTERVAL -2 month + current_date()) and year(data) = year(INTERVAL -2 month + current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="rec3">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
              if ($rowUser['receita'] == null){
                echo "0,00";  
              } print($rowUser['receita']);
              }
        }
        ?>  
    </h5>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_despesa>0, 0, valor)),2) as receita from banco where MONTH(data) = MONTH(INTERVAL -3 month + current_date()) and year(data) = year(INTERVAL -3 month + current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="rec4">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
              if ($rowUser['receita'] == null){
                echo "0,00";  
              } print($rowUser['receita']);
              }
        }
        ?>  
    </h5>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_despesa>0, 0, valor)),2) as receita from banco where MONTH(data) = MONTH(INTERVAL -4 month + current_date()) and year(data) = year(INTERVAL -4 month + current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="rec5">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
              if ($rowUser['receita'] == null){
                echo "0,00";  
              } print($rowUser['receita']);
              }
        }
        ?>  
    </h5>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_despesa>0, 0, valor)),2) as receita from banco where MONTH(data) = MONTH(INTERVAL -5 month + current_date()) and year(data) = year(INTERVAL -5 month + current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="rec6">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
              if ($rowUser['receita'] == null){
                echo "0,00";  
              } print($rowUser['receita']);
              }
        }
        ?>  
    </h5>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_despesa>0, 0, valor)),2) as receita from banco where MONTH(data) = MONTH(INTERVAL -6 month + current_date()) and year(data) = year(INTERVAL -6 month + current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="rec7">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
              if ($rowUser['receita'] == null){
                echo "0,00";  
              } print($rowUser['receita']);
              }
        }
        ?>  
    </h5>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_despesa>0, 0, valor)),2) as receita from banco where MONTH(data) = MONTH(INTERVAL -7 month + current_date()) and year(data) = year(INTERVAL -7 month + current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="rec8">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
              if ($rowUser['receita'] == null){
                echo "0,00";  
              } print($rowUser['receita']);
              }
        }
        ?>  
    </h5>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_despesa>0, 0, valor)),2) as receita from banco where MONTH(data) = MONTH(INTERVAL -8 month + current_date()) and year(data) = year(INTERVAL -8 month + current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="rec9">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
              if ($rowUser['receita'] == null){
                echo "0,00";  
              } print($rowUser['receita']);
              }
        }
        ?>  
    </h5>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_despesa>0, 0, valor)),2) as receita from banco where MONTH(data) = MONTH(INTERVAL -9 month + current_date()) and year(data) = year(INTERVAL -9 month + current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="rec10">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
              if ($rowUser['receita'] == null){
                echo "0,00";  
              } print($rowUser['receita']);
              }
        }
        ?>  
    </h5>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_despesa>0, 0, valor)),2) as receita from banco where MONTH(data) = MONTH(INTERVAL -10 month + current_date()) and year(data) = year(INTERVAL -10 month + current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="rec11">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
              if ($rowUser['receita'] == null){
                echo "0,00";  
              } print($rowUser['receita']);
              }
        }
        ?>  
    </h5>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_despesa>0, 0, valor)),2) as receita from banco where MONTH(data) = MONTH(INTERVAL -11 month + current_date()) and year(data) = year(INTERVAL -11 month + current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="rec12">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
              if ($rowUser['receita'] == null){
                echo "0,00";  
              } print($rowUser['receita']);
              }
        }
        ?>  
    </h5>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_despesa>0, 0, valor)),2) as receita from banco where MONTH(data) = MONTH(INTERVAL -12 month + current_date()) and year(data) = year(INTERVAL -12 month + current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="rec13">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
              if ($rowUser['receita'] == null){
                echo "0,00";  
              } print($rowUser['receita']);
              }
        }
        ?>  
    </h5>
    <!-- FIM RECEITA-->

    <p id="demo"></p>
    <p id="demo2"></p>
    <p id="demo3"></p>
    <p id="demo4"></p>
    <p id="demo5"></p>
    <p id="demo6"></p>
    <p id="demo7"></p>
    <p id="demo8"></p>
    <p id="demo9"></p>
    <p id="demo10"></p>
    <p id="demo11"></p>
    <p id="demo12"></p>
    <p id="demo13"></p>

    <script>
      var month = new Array();
      month[0] = "jan";
      month[1] = "fev";
      month[2] = "mar";
      month[3] = "abr";
      month[4] = "mai";
      month[5] = "jun";
      month[6] = "jul";
      month[7] = "ago";
      month[8] = "set";
      month[9] = "out";
      month[10] = "nov";
      month[11] = "dez";
      month[-1] = "dez";
      month[-2] = "nov";
      month[-3] = "out";
      month[-4] = "set";
      month[-5] = "ago";
      month[-6] = "jul";
      month[-7] = "jun";
      month[-8] = "mai";
      month[-9] = "abr";
      month[-10] = "mar";
      month[-11] = "fev";
      month[-12] = "jan";
    
      var d = new Date();
      var n = month[d.getMonth()];
      document.getElementById("demo").innerHTML = n;
      var d1= Number(d.getMonth());
      var d2 = d1-1;
      var n12 = month[d2];
      document.getElementById("demo2").innerHTML = n12;
      var d3 = d1-2;
      var n11 = month[d3];
      document.getElementById("demo3").innerHTML = n11;
      var d4 = d1-3;
      var n10 = month[d4];
      document.getElementById("demo4").innerHTML = n10;
      var d5 = d1-4;
      var n9 = month[d5];
      document.getElementById("demo5").innerHTML = n9;
      var d6 = d1-5;
      var n8 = month[d6];
      document.getElementById("demo6").innerHTML = n8;
      var d7 = d1-6;
      var n7 = month[d7];
      document.getElementById("demo7").innerHTML = n7;
      var d8 = d1-7;
      var n6 = month[d8];
      document.getElementById("demo8").innerHTML = n6;
      var d9 = d1-8;
      var n5 = month[d9];
      document.getElementById("demo9").innerHTML = n5;
      var d10 = d1-9;
      var n4 = month[d10];
      document.getElementById("demo10").innerHTML = n4;
      var d11 = d1-10;
      var n3 = month[d11];
      document.getElementById("demo11").innerHTML = n3;
      var d12 = d1-11;
      var n2 = month[d12];
      document.getElementById("demo12").innerHTML = n2;
      var d13 = d1-12;
      var n1 = month[d13];
      document.getElementById("demo13").innerHTML = n1;



    </script>
