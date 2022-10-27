<?php

namespace SRC;

class Funcoes
{
    /*

    Desenvolva uma função que receba como parâmetro o ano e retorne o século ao qual este ano faz parte. O primeiro século começa no ano 1 e termina no ano 100, o segundo século começa no ano 101 e termina no 200.

	Exemplos para teste:

	Ano 1905 = século 20
	Ano 1700 = século 17

     * */
    public function SeculoAno(int $ano): int 
    {
        if($ano <= 0) 
            throw new \Exception("valor inválido");

        return floor( $ano / 100) + ( $ano % 100 ? 1 : 0 ) ;
    }

    
	
	
	
	
	
	
	
	/*

    Desenvolva uma função que receba como parâmetro um número inteiro e retorne o numero primo imediatamente anterior ao número recebido

    Exemplo para teste:

    Numero = 10 resposta = 7
    Número = 29 resposta = 23

     * */
    public function PrimoAnterior(int $numero): int 
    {
        if($numero <= 1) 
            throw new \Exception("valor inválido");

        if($numero === 2) 
            throw new \Exception("valor inválido, 2 é primo, mas não possui nenhum numero anterior ao 2 que seja primo");

        for($i = $numero - 1; $i > 1; $i--)
            if($this->primo($i))
                return $i;
        
    }

    private function primo(int $numero): bool
    {
        $primo = true;

        for($i = 2; $i < $numero; $i++)
            if($i !== $numero && $numero % $i === 0)
                $primo = false;
        
        return $primo;
    }









    /*

    Desenvolva uma função que receba como parâmetro um array multidimensional de números inteiros e retorne como resposta o segundo maior número.

    Exemplo para teste:

	Array multidimensional = array (
	array(25,22,18),
	array(10,15,13),
	array(24,5,2),
	array(80,17,15)
	);

	resposta = 25

     * */
    public function SegundoMaior(array $arr): int
    {
        $valores = $this->lista($arr);
        sort($valores);
        $valores = array_unique($valores);
        array_pop($valores);
        return end($valores);
    }

    private function lista(array $arr): array
    {
        $valores = array();

        foreach ($arr as $item)
            if(is_array($item))
                array_push($valores, ...$this->lista($item));
            else           
                array_push($valores, $item);

        return $valores;
    }

	
	
	
	
	
	
	

    /*
   Desenvolva uma função que receba como parâmetro um array de números inteiros e responda com TRUE or FALSE se é possível obter uma sequencia crescente removendo apenas um elemento do array.

	Exemplos para teste 

	Obs.:-  É Importante  realizar todos os testes abaixo para garantir o funcionamento correto.
         -  Sequencias com apenas um elemento são consideradas crescentes

    [1, 3, 2, 1]  false
    [1, 3, 2]  true
    [1, 2, 1, 2]  false
    [3, 6, 5, 8, 10, 20, 15] false
    [1, 1, 2, 3, 4, 4] false
    [1, 4, 10, 4, 2] false
    [10, 1, 2, 3, 4, 5] true
    [1, 1, 1, 2, 3] false
    [0, -2, 5, 6] true
    [1, 2, 3, 4, 5, 3, 5, 6] false
    [40, 50, 60, 10, 20, 30] false
    [1, 1] true
    [1, 2, 5, 3, 5] true
    [1, 2, 5, 5, 5] false
    [10, 1, 2, 3, 4, 5, 6, 1] false
    [1, 2, 3, 4, 3, 6] true
    [1, 2, 3, 4, 99, 5, 6] true
    [123, -17, -5, 1, 2, 3, 12, 43, 45] true
    [3, 5, 67, 98, 3] true

     * */
    
	public function SequenciaCrescente(array $arr): bool 
    {
        if(count($arr) === 1)
            return true;

        for($i = 0; $i < count($arr); $i++)
        {
            $array = $arr;
            unset($array[$i]);
            if($this->sequencia([...$array]))
                return true;
        }

        return false;
    }

    private function sequencia(array $arr): bool
    {
        for($i = 0; $i < count($arr); $i++)
            for($j = 0; $j < count($arr); $j++)
                if($arr[$i] >= $arr[$j] && $i < $j)
                    return false;
        return true;
    }
}