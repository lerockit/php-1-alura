<?php 

    class ProdutoDao
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

        public function insereProduto(Produto $produto) 
        {
            $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()->getId()}, {$produto->getUsado()})";
            $result = mysqli_query($this->getConexao(), $query);
            return $result;
        }

        public function listaProdutos() 
        {
            $produtos = array();
            $query = "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id";
            $resultado = mysqli_query($this->getConexao(), $query);

            while ( $produto_array = mysqli_fetch_assoc($resultado) ) {
                $categoria = new Categoria();
                $categoria->setNome($produto_array['categoria_nome']);
                $categoria->setId($produto_array['categoria_id']);

                $nome = $produto_array['nome'];
                $preco = $produto_array['preco'];
                $descricao = $produto_array['descricao'];
                $usado = $produto_array['usado'];

                $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
                $produto->setId($produto_array['id']);

                array_push($produtos, $produto);
            }

            return $produtos;
        }

        public function removeProduto($id) 
        {
            $query = "delete from produtos where id = {$id}";
            return mysqli_query($this->getConexao(), $query);
        }

        public function buscaProduto($id) 
        {
            $query = "select * from produtos where id = {$id}";
            $result = mysqli_query($this->getConexao(), $query);

            $produto_array = mysqli_fetch_assoc($result);

            $categoria = new Categoria();

            $nome = $produto_array['nome'];
            $preco = $produto_array['preco'];
            $descricao = $produto_array['descricao'];
            $usado = $produto_array['usado'];

            $categoria->setId($produto_array['categoria_id']);

            $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
            $produto->setId($produto_array['id']);

            return($produto);
        }

        public function alteraProduto(Produto $produto) 
        {
            $query = "update produtos set nome = '{$produto->getNome()}', preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}', categoria_id = {$produto->getCategoria()->getId()}, usado = '{$produto->getUsado()}' where id = '{$produto->getId()}' ";
            return mysqli_query($this->getConexao(), $query);
        }
}
