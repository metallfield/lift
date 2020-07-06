<?php


namespace App\Classes;


class WordsAnalizer
{
    private $resultList;
    public $countLetter;
    public $notUniqueWords = [];

    public function chooseMethod($params)
    {
        if (isset($params['method']))
        {
            switch ($params['method']) {
                case 'words_count':
                      $this->analize($params);
                    break;
                case 'regular_search':
                      $this->findByRegular($params);
                    break;
            }
        }
    }

    private function findByRegular($params)
    {
        $wordsString = explode(' ', $params['wordsList']);
        $findBySymbols = $params['symbol'];
        foreach ($wordsString as $word) {
        $matches = $this->wildcards($word, $findBySymbols);
            foreach ($matches as $match) {
                $this->resultList[] = $this->underline($match, $word);
            }
        }
    }

    private function wildcards($word, $findBySymbols)
    {
        $special_chars = "\.^$[]()|{}/'#";
        $special_chars = str_split($special_chars);
        foreach ($special_chars as $char) $escape[$char] = preg_quote($char);
        $pattern = strtr($findBySymbols, $escape);
        $search = ['*', '+', '?'];
        $replace = ['.*', '.+', '.'];
        $pattern = str_replace($search, $replace, $pattern);
        preg_match("/$pattern/", $word, $match);
        return $match;
    }

    private function underline($find, $word)
    {
        return str_replace( $find, '<span style="color:red">'.$find.'</span>', $word);
    }

    public function analize($params)
    {
        $wordsString = $params['wordsList'];
        $findSymbol = $params['symbol'];
        $wordsArr = explode(' ', $wordsString);
        foreach ($wordsArr as $word) {
            if (stristr($word, $findSymbol))
            {
                $this->resultList[] = $word.' |letter count: ' .mb_substr_count($word, $findSymbol);
                $this->countLetter += mb_substr_count($word, $findSymbol);
            }
        }
    }

    private function countOfSameWords()
    {
        if ($this->resultList)
        {
            $words = array_count_values($this->resultList);
            foreach ($words as $k => $v)
            {
                if ($v > 1)
                {
                    $this->notUniqueWords[] = $k.' word meets in text: '.$v;
                }
            }
        }
        else{
            return false;
        }

    }

    public function getNotUniqueWords()
    {
        $this->countOfSameWords();
        return $this->notUniqueWords;
    }
    public function CountOfWords()
    {
        if ($this->resultList != null) {
            return count($this->resultList) . ' |count of not unique words:' . count($this->notUniqueWords);
        }
        else{
            return false;
        }
    }

    public function getResultList()
    {
        if ($this->resultList) {
            return $this->resultList;
        }else
        {
            return false;
        }
    }
}
