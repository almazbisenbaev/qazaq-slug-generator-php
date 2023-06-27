<?php

function slugify($text){
    

    // Replace cyrillic with latin

    $lettersCyr = array(
        "А", "а", "Ә", "ә", "Б", "б", "В", "в", "Г", "г", "Ғ", "ғ", "Д", "д", "Е", "е", "Ё", "ё", "Ж", "ж",
        "З", "з", "И", "и", "Й", "й", "К", "к", "Қ", "қ", "Л", "л", "М", "м", "Н", "н", "Ң", "ң", "О", "о", "Ө", "ө",
        "П", "п", "Р", "р", "С", "с", "Т", "т", "У", "у", "Ұ", "ұ", "Ү", "ү", "Ф", "ф", "Х", "х", "Һ", "һ",
        "Ц", "ц", "Ч", "ч", "Ш", "ш", "Ы", "ы", "І", "і", "Ъ", "ъ", "Ь", "ь", "Э", "э", "Ю", "ю", "Я", "я"
      );
      
    $lettersLat = [
        "A", "a", "A", "a", "B", "b", "V", "v", "G", "g", "G", "G", "D", "d", "E", "e", "YO", "yo", "ZH", "zh",
        "Z", "z", "I", "i", "Y", "y", "K", "k", "Q", "q", "L", "l", "M", "m", "N", "n", "N", "n", "O", "o", "O", "o",
        "P", "p", "R", "r", "S", "s", "T", "t", "U", "u", "U", "u", "U", "u", "F", "f", "KH", "kh", "H", "h",
        "TS", "ts", "CH", "ch", "SH", "sh", "Y", "y", "I", "i", "", "", "", "", "E", "e", "YU", "yu", "YA", "ya"
    ];
    
    $text = str_replace($lettersCyr, $lettersLat, $text);
    
    

    // Remove apostrophes
    $text = str_replace("'", '', $text);

    // replace symbols with dash
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    $text = trim($text, '-'); // trim
    $text = preg_replace('~-+~', '-', $text); // remove duplicated dashes

    // lowercase
    $text = strtolower($text);

    return $text;
}
