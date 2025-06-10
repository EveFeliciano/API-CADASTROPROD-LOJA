<?php
    class Brinquedo {
        public $id;
        public $nome;
        public $categoria;
        public $preco;
        public $promocao;
        public $descricao;
        public $idadeRecomendada;
        public $marca;
        public $estoque;

        public function __construct(array $data) {
            foreach ($data as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }
        }

        public function validate() {
            $errors = [];
            if (empty($this->nome)) {
                $errors[] = "O nome do brinquedo é obrigatório.";
            }
            if (!is_numeric($this->preco) || $this->preco <= 0) {
                $errors[] = "O preço deve ser um número positivo.";
            }
            if (empty($this->categoria)) {
                $errors[] = "A categoria do brinquedo é obrigatória.";
            }

            return $errors;
        }
    }

?>