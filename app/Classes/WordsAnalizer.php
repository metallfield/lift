<?php


namespace App\Classes;


class WordsAnalizer
{
    private $resultList;
    public $countLetter;
    public $notUniqueWords= [];

    public function chooseMethod($params)
    {
        if (isset($params['method']))
        {
            switch ($params['method']) {
                case 'words_count':
                    return $this->analize($params);
                    break;
                case 'regular_search':
                    return $this->findBy($params);
                    break;
            }
        }

    }

    public function findBy($params)
    {
        $wordsString = $params['wordsList'];
        $findBySymbols = $params['symbol'];
        switch ($findBySymbols){
            case $findBySymbols{0} === '*' || $findBySymbols{0} === '+':
                 $this->getWordsWithSymbols($findBySymbols, $wordsString);
                break;
            case $findBySymbols{0} === '?':
                 $this->getAfterFirstSymbols($findBySymbols, $wordsString);
                break;
            case $findBySymbols{-1} === '?':
                 $this->getBeforeLastSymbols($findBySymbols, $wordsString);
                break;
        }
    }

    public function getWordsWithSymbols($findBySymbols, $wordsString)
    {
        $pattern = substr($findBySymbols, 0,1);
        $find = substr($findBySymbols, 1);
        $wordsArr = explode(' ', $wordsString);
        foreach ($wordsArr as $word)
        {
            if (preg_match('/'.preg_quote($find).''.$pattern.'/', $word))
            {
                $this->resultList[] = $this->underline($find, $word);
            }
        }
    }

    public function getAfterFirstSymbols($findBySymbols, $wordsString)
    {
        $find = substr($findBySymbols, 1);
        $wordsArr = explode(' ', $wordsString);
        foreach ($wordsArr as $word)
        {
            if (preg_match('/^'.preg_quote($find).'/', $word))
            {
                $this->resultList[] =  $this->underline($find, $word);
            }
        }
    }
        public function getBeforeLastSymbols($findBySymbols, $wordsString)
        {
            $find = substr($findBySymbols, 0,-1);
            $wordsArr = explode(' ', $wordsString);
            foreach ($wordsArr as $word) {
                if (preg_match('/'.preg_quote($find).'$/', $word)) {
                    $this->resultList[] =  $this->underline($find, $word);
                }
            }
        }


        private function underline($find, $word)
        {
        return    preg_replace('~' . preg_quote($find) . '~iu', '<span style="color:red">$0</span>', $word);
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
