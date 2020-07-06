<?php
echo '<h1>this is words page</h1>';
?>

<form action="{{route('words')}}" method="GET">
    <label for="wordsList">enter list of words</label>
    <textarea name="wordsList" id="wordsList" cols="30" rows="10" required>
     {{ old('name', isset($fields['wordsList']) ? $fields['wordsList']:null)}}
</textarea>
    <select name="method" id="method">
         <option value="{{ old('name', isset($fields['method']) ? $fields['method']:null)}}" selected>{{ old('name', isset($fields['method']) ? $fields['method']: 'choose method')}}</option>
        <option value="words_count">words_count</option>
        <option value="regular_search" name="regular search">regular_search</option>
    </select>
    <label for="symbol">enter symbol</label>
    <input type="text" name="symbol" id="symbol" required value="   {{ old('name', isset($fields['symbol']) ? $fields['symbol']:null)}}">
    <button name="submit" type="submit">send</button>

</form>
<hr>

<h1>Result</h1>

<h3>count of words with letter: {{$count}}</h3>
<h3>not unique words:</h3>
<ul>
@foreach( $countOfSameWords as $notUniq)
    <li>{!! $notUniq !!}</li>
    @endforeach
</ul>
<h3>count letter in text: {{$countLetter}}</h3>
<ul>
    @if($words != null)
    @foreach($words as $word)
        <li>{!!$word!!}</li>
    @endforeach
    @endif
</ul>
