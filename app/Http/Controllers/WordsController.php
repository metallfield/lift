<?php


namespace App\Http\Controllers;


use App\Classes\WordsAnalizer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class WordsController extends BaseController
{
    public function index(Request $request, WordsAnalizer $wordsListAnalizer)
    {
        $fields = $request->all();
        $wordsListAnalizer->chooseMethod($fields);
        $words = $wordsListAnalizer->getResultList();
        $countOfSameWords = $wordsListAnalizer->getNotUniqueWords();
        $count = $wordsListAnalizer->CountOfWords();
        $countLetter = $wordsListAnalizer->countLetter;
        return view('words/index', compact(['fields', 'words', 'count', 'countLetter', 'countOfSameWords']));
    }
}
