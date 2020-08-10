<?php

require_once 'db.php';

class User {
    private $conn;

    // Constructor OK
    public function __construct(){
      $database = new Database();
      $db = $database->dbConnection();
      $this->conn = $db;
    }


    // Execute queries SQL OK
    public function runQuery($sql){
      $stmt = $this->conn->prepare($sql);
      return $stmt;
    }

    // Insert banco OK
    public function insert($data, $descricao, $id_fracao, $id_despesa, $id_receita, $valor, $tipo){
      try{
        $stmt = $this->conn->prepare("INSERT INTO banco (data, descricao, id_fracao, id_despesa, id_receita, valor, tipo) VALUES (:data, :descricao, :id_fracao, :id_despesa, :id_receita, :valor, :tipo)");
        $stmt->bindparam(":data", $data);
        $stmt->bindparam(":descricao", $descricao);
        $stmt->bindparam(":id_fracao", $id_fracao);
        $stmt->bindparam(":id_despesa", $id_despesa);
        $stmt->bindparam(":id_receita", $id_receita);
        $stmt->bindparam(":valor", $valor);
        $stmt->bindparam(":tipo", $tipo);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
        echo $e->getMessage();
      }
    }

    // Insert Condomino OK
    public function insertCond($nif, $tratamento, $nome, $representante, $morada, $tlm, $email, $status){
      try{
        $stmt = $this->conn->prepare("INSERT INTO condominos (nif, tratamento, nome, representante, morada, tlm, email, status) VALUES (:nif, :tratamento, :nome, :representante, :morada, :tlm, :email, :status)");
        $stmt->bindparam(":nif", $nif);
        $stmt->bindparam(":tratamento", $tratamento);
        $stmt->bindparam(":nome", $nome);
        $stmt->bindparam(":representante", $representante);
        $stmt->bindparam(":morada", $morada);
        $stmt->bindparam(":tlm", $tlm);
        $stmt->bindparam(":email", $email);
        $stmt->bindparam(":status", $status);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
        echo $e->getMessage();
      }
    }

        // Insert Fracoes OK
        public function insertFrac($letra, $piso, $permilagem, $id_condomino, $aquisicao){
          try{
            $stmt = $this->conn->prepare("INSERT INTO fracoes (letra, piso, permilagem, id_condomino, aquisicao) VALUES (:letra, :piso, :permilagem, :id_condomino, :aquisicao)");
            
            $stmt->bindparam(":letra", $letra);
            $stmt->bindparam(":piso", $piso);
            $stmt->bindparam(":permilagem", $permilagem);
            $stmt->bindparam(":id_condomino", $id_condomino);
            $stmt->bindparam(":aquisicao", $aquisicao);
            $stmt->execute();
            return $stmt;
          }catch(PDOException $e){
            echo $e->getMessage();
          }
        }


        
        // Insert Categoria Receita OK
        public function insertCatReceita($categoria, $nome, $statusR){
          try{
            $stmt = $this->conn->prepare("INSERT INTO receita (categoria, nome, statusR) VALUES (:categoria, :nome, :statusR)");
            
            $stmt->bindparam(":categoria", $categoria);
            $stmt->bindparam(":nome", $nome);
            $stmt->bindparam(":statusR", $statusR);
            $stmt->execute();
            return $stmt;
          }catch(PDOException $e){
            echo $e->getMessage();
          }
        }

        // Insert Categoria Despesa OK
        public function insertCatDespesa($categoria, $nome, $statusD){
          try{
            $stmt = $this->conn->prepare("INSERT INTO despesa (categoria, nome, statusD) VALUES (:categoria, :nome, :statusD)");
            
            $stmt->bindparam(":categoria", $categoria);
            $stmt->bindparam(":nome", $nome);
            $stmt->bindparam(":statusD", $statusD);
            $stmt->execute();
            return $stmt;
          }catch(PDOException $e){
            echo $e->getMessage();
          }
        }

    // Update Banco
    public function update($data, $descricao, $id_condomino, $id_despesa, $id_receita, $valor, $tipo, $id){
        try{ 
          $stmt = $this->conn->prepare("UPDATE banco SET data = :data, descricao = :descricao, id_condomino = :id_condomino, id_despesa = :id_despesa, id_receita = :id_receita, valor = :valor, tipo = :tipo WHERE id_banco=:id");
          $stmt->bindparam(":data", $data);
          $stmt->bindparam(":descricao", $descricao);
          $stmt->bindparam(":id_condomino", $id_condomino);
          $stmt->bindparam(":id_despesa", $id_despesa);
          $stmt->bindparam(":id_receita", $id_receita);
          $stmt->bindparam(":valor", $valor);
          $stmt->bindparam(":tipo", $tipo);
          $stmt->bindparam(":id", $id);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
    }
        // Update Condominos
        public function updateCond($nif, $tratamento, $nome, $representante, $morada, $tlm, $email, $status, $id){
          try{ 
            $stmt = $this->conn->prepare("UPDATE condominos SET nif = :nif, tratamento = :tratamento, nome = :nome, representante = :representante, morada =:morada, tlm = :tlm, email = :email, status = :status WHERE id_condomino=:id");
            $stmt->bindparam(":nif", $nif);
            $stmt->bindparam(":tratamento", $tratamento);
            $stmt->bindparam(":nome", $nome);
            $stmt->bindparam(":representante", $representante);
            $stmt->bindparam(":morada", $morada);
            $stmt->bindparam(":tlm", $tlm);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":status", $status);
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return $stmt;
          }catch(PDOException $e){
            echo $e->getMessage();
          }
      }

      // Update Frações 
      public function updateFrac($letra, $piso, $permilagem, $id_condomino, $aquisicao, $venda, $id){
        try{ 
          $stmt = $this->conn->prepare("UPDATE fracoes SET letra = :letra, piso = :piso, permilagem = :permilagem, id_condomino =:id_condomino, aquisicao = :aquisicao, venda = :venda WHERE fracoes.id=:id");
          $stmt->bindparam(":letra", $letra);
          $stmt->bindparam(":piso", $piso);
          $stmt->bindparam(":permilagem", $permilagem);
          $stmt->bindparam(":id_condomino", $id_condomino);
          $stmt->bindparam(":aquisicao", $aquisicao);
          $stmt->bindparam(":venda", $venda);
          $stmt->bindparam(":id", $id);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
    }
    public function updateFracVenda($letra, $piso, $permilagem, $id_condomino, $aquisicao, $id){
      try{ 
        $stmt = $this->conn->prepare("UPDATE fracoes SET letra = :letra, piso = :piso, permilagem = :permilagem, id_condomino =:id_condomino, aquisicao = :aquisicao WHERE fracoes.id=:id");
        $stmt->bindparam(":letra", $letra);
        $stmt->bindparam(":piso", $piso);
        $stmt->bindparam(":permilagem", $permilagem);
        $stmt->bindparam(":id_condomino", $id_condomino);
        $stmt->bindparam(":aquisicao", $aquisicao);
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
        echo $e->getMessage();
      }
  }


    // Delete OK
    public function delete($id){
      try{
        $stmt = $this->conn->prepare("DELETE FROM banco WHERE id_banco = :id");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
          echo $e->getMessage();
      }
    }

    // Delete OK
    public function deleteCond($id){
      try{
        $stmt = $this->conn->prepare("DELETE FROM condominos WHERE id_condomino = :id");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
          echo $e->getMessage();
      }
    }

    // Delete OK 
    public function deleteFrac($id){
      try{
        $stmt = $this->conn->prepare("DELETE FROM fracoes WHERE letra = :id");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
          echo $e->getMessage();
      }
    }

    // Delete OK  
    public function deleteCatReceita($id){
      try{
        $stmt = $this->conn->prepare("DELETE FROM receita WHERE id_receita = :id");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
          echo $e->getMessage();
      }
    }
        // Delete OK 
    public function deleteCatDespesa($id){
      try{
        $stmt = $this->conn->prepare("DELETE FROM despesa WHERE id_despesa = :id");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
          echo $e->getMessage();
      }
    }


    // Redirect URL method 
    public function redirect($url){
      header("Location: $url");
    }
}
?>
