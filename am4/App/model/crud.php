<?php

namespace App\model;

class Crud {
	public function create(Noticia $n){

		$sql = 'INSERT INTO noticia(titulo, descricao, arquivo, data) VALUES (?,?,?,NOW())';

		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $n->getTitulo());
		$stmt->bindValue(2, $n->getDescricao());
		$stmt->bindValue(3, $n->getArquivo());

		$stmt->execute();

	}
	public function read() {

		$sql = 'SELECT * FROM noticia';

		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->execute();

		if($stmt->rowCount() > 0):
			$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $resultado;
		else:
			return [];
		endif;

	}

	public function update(Noticia $n) {

		$sql = 'UPDATE noticia SET titulo = ?, descricao = ?, arquivo = ?, data = NOW() WHERE id = ?';

		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $n->getTitulo());
		$stmt->bindValue(2, $n->getDescricao());
		$stmt->bindValue(3, $n->getArquivo());
		//$stmt->bindValue(4, $n->getData());
		$stmt->bindValue(4, $n->getId());

		$stmt->execute();


	}

	public function delete($id) {

		$sql = 'DELETE FROM noticia WHERE id = ?';

		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id);
		$stmt->execute();

	}
}