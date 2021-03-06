<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAO_Produto
 *
 * @author Codification
 */
require_once 'connection.php';
require_once 'Marca.php';
require_once 'DAO.php';

class MarcaDAO  extends DAO {

 

 

    function insert(Marca $marca) {


        $stmt = $this->con->stmt_init();

        $stmt->prepare("INSERT INTO MARCA (nome) VALUES (?)");
        if ($stmt) {


            $stmt->bind_param("s", $marca->get('nome'));

            $stmt->execute();
            $err = $stmt->errno;
            $stmt->close();

            return $err;
        }
    }

    function  selectAll() {
        $stmt = $this->con->stmt_init();
        $stmt->prepare("SELECT * FROM marca");

        $stmt->execute();

        $stmt->bind_result($codmarc, $nome);

        $result = array();



        while ($stmt->fetch()) {

            $p = new marca();


            $p->set('nome', $nome);
            $p->set('codmarc', $codmarc);
       

            $result[] = $p;

        }


        $stmt->close();

        return $result;
    }
    
    
    function  selectByCod($cod) {
        $stmt = $this->con->stmt_init();
        $stmt->prepare("SELECT * FROM marca WHERE codmarc = ?");
$stmt->bind_param("i", $cod);
        
        $stmt->execute();

         $stmt->bind_result($codmarc, $nome);

       



        while ($stmt->fetch()) {

            $p = new marca();


            $p->set('nome', $nome);
            $p->set('codmarc', $codmarc);
       

            $result[] = $p;

        }


        $stmt->close();

        return $p;
    }

    
   
    
}

?>
