<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/alerta.php";
session_start();

class Usuario
{
    protected $db;
    protected $table = "usuario";

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }

    public function buscar($id_usuario)
    {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE id_usuario = :id_usuario";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro ao buscar!" . $e->getMessage();
            return null;
        }
    }

    public function cadastrar($dados)
    {
        try {
            $sql = "INSERT INTO {$this->table} (nome, senha, cpf, email, telefone, cep, rua, numerocasa, cidade, estado, perfil)
                VALUES (:nome, :senha, :cpf, :email, :telefone, :cep, :rua, :numerocasa, :cidade, :estado , :perfil)";
            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':senha', $dados['senha']);
            $stmt->bindParam(':cpf', $dados['cpf']);
            $stmt->bindParam(':email', $dados['email']);
            $stmt->bindParam(':telefone', $dados['telefone']);
            $stmt->bindParam(':cep', $dados['cep']);
            $stmt->bindParam(':rua', $dados['rua']);
            $stmt->bindParam(':numerocasa', $dados['numerocasa']);
            $stmt->bindParam(':cidade', $dados['cidade']);
            $stmt->bindParam(':estado', $dados['estado']);
            $stmt->bindParam(':perfil', $dados['perfil']);

            if ($dados['perfil'] === 'Técnico') {
                $perfilExperiencia = isset($dados['perfilExperiencia']) ? $dados['perfilExperiencia'] : null;
                $stmt->bindParam(':perfilExperiencia', $perfilExperiencia);
            } else {
                $perfilExperiencia = null;
                $stmt->bindParam(':perfilExperiencia', $perfilExperiencia);
            }
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro Ao Cadastrar: " . $e->getMessage();
            return false;
        }
    }

    public static function autenticarLogin($email, $senha)
    {
        try {
            $query = "SELECT id_usuario, email, senha FROM usuario WHERE email = :email";
            $conexao = DBConexao::getConexao();

            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() === 1) {
                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($senha, $usuario["senha"])) {
                    return $usuario;
                } else {
                    $_SESSION['erro'] = "E-mail ou senha incorretos!";
                    return false;
                }
            } else {
                $_SESSION['erro'] = "E-mail ou senha incorretos!";
                return false;
            }
        } catch (PDOException $e) {
            echo "Erro na inserção" . $e->getMessage();
            return false;
        }
    }

    public function buscaId($id)
    {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE id_usuario = :id_usuario";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id_usuario', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() === 1) {
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Erro na busca por ID: " . $e->getMessage();
            return false;
        }
    }

    public function listar()
    {
        try {
            $sql = "SELECT * FROM {$this->table}";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro Na Listagem:" . $e->getMessage();
            return null;
        }
    }

    public function excluir($id_usuario)
    {
        try {
            $sql = "DELETE FROM {$this->table} WHERE id_usuario=:id_usuario";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro na hora de deletar:" . $e->getMessage();
            return false;
        }
    }

    public function editar($id_usuario, $dados)
    {
        try {
            $sql = "UPDATE {$this->table} SET nome = :nome, senha = :senha, cpf = :cpf, email = :email, telefone = :telefone, perfil = :perfil WHERE id_usuario = :id_usuario";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':senha', $dados['senha']);
            $stmt->bindParam(':cpf', $dados['cpf']);
            $stmt->bindParam(':email', $dados['email']);
            $stmt->bindParam(':telefone', $dados['telefone']);
            $stmt->bindParam(':perfil', $dados['perfil']);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro Ao Editar:" . $e->getMessage();
            return false;
        }
    }
}

?>
