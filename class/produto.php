<?php 

    interface ProdutoInterface 
    {
        public function precoComDesconto();
    }

    class Produto implements ProdutoInterface 
    {

        // Attributtes

        private $id, $nome, $preco, $descricao, $categoria, $usado;

        // Methods

        public function precoComDesconto($desconto = 0.1) 
        {
            if($desconto > 0 && $desconto < 0.5){
              return $this->preco -= $this->preco * $desconto;
            }
            return "(Desconto invalido)";
        }

        // Magical Methods

        public function __construct($nome, $preco, $descricao, $categoria, $usado) 
        {

        $this->setNome($nome);
        $this->setPreco($preco);
        $this->setDescricao($descricao);
        $this->setCategoria($categoria);
        $this->setUsado($usado);

        }

        public function getId() 
        {
            return $this->id;
        }

        public function setId($id) 
        {
            $this->id=$id;
        }

        public function getNome() 
        {
            return $this->nome;
        }

        public function setNome($nome) 
        {
            $this->nome=$nome;
        }

        public function getPreco() 
        {
            return $this->preco;
        }

        public function setPreco($preco) 
        {
            $this->preco=$preco;
        }

        public function getDescricao() 
        {
            return $this->descricao;
        }

        public function setDescricao($descricao) 
        {
            $this->descricao=$descricao;
        }

        public function getCategoria() 
        {
            return $this->categoria;
        }

        public function setCategoria($categoria) 
        {
            $this->categoria=$categoria;
        }

        public function getUsado() 
        {
            return $this->usado;
        }

        public function setUsado($usado) 
        {
            $this->usado=$usado;
        }

    }
