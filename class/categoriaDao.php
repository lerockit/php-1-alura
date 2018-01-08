<?php 

    class CategoriaDao 
    {

        // Attributtes

        private $conexao;

        // Magical Methods

        public function __construct($conexao)
        {
            $this->setConexao($conexao);
        }

        public function getConexao()
        {
            return $this->conexao;
        }

        public function setConexao($conexao)
        {
            $this->conexao = $conexao;
            return $this;
        }

        // Methods

        function listaCategorias() 
        {
            $categorias = array();
            $query = "select * from categorias";
            $result = mysqli_query($this->getConexao(), $query);

            while ($categoria_array = mysqli_fetch_assoc($result)) {
                $categoria = new Categoria();
                $categoria->setId($categoria_array['id']);
                $categoria->setNome($categoria_array['nome']);
                array_push($categorias, $categoria);
            }

            return $categorias;
        }
    }