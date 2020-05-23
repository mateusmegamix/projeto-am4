<?php

namespace App\model;

class Noticia{

	private $id, $titulo, $descricao, $data;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getTitulo(){
		return $this->titulo;
	}

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}
	
	public function getDescricao(){
		return $this->descricao;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}
	
	public function getArquivo(){
		return $this->arquivo;
	}

	public function setArquivo($arquivo){
		$this->arquivo = $arquivo;
	}

	public function getData(){
		return $this->data;
	}

	public function setData($data){
		$this->data = $data;
	}

}