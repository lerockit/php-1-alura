<?php  

    class Categoria 
    {

        // Attributtes

        private $id, $nome;

        // Magic Methdos

        public function getId() {
          return $this->id;
        }

        public function setId($id) {
          $this->id=$id;
        }

        public function getNome() {
          return $this->nome;
        }

        public function setNome($nome) {
          $this->nome=$nome;
        }

    }