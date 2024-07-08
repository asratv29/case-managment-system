<?php
/*
use function Rap2hpoutre\RemoveStopWords\remove_stop_words;


$u = remove_stop_words('The quick was her brown in the fox jumps over the lazy dog');
//echo "removed stop word -----$u ";
// quick brown fox jumps   lazy dog
$comparison = new \Atomescrochus\StringSimilarities\Compare();

// the functions returns similarity percentage between strings
$jaroWinkler = $comparison->jaroWinkler('first string', 'second string'); // JaroWinkler comparison
//echo "----jaroWinkler" . $jaroWinkler ."\n";
$levenshtein = $comparison->levenshtein('first string', 'second string'); // Levenshtein comparison
//echo "-----levenshtein" . $levenshtein ."\n";
$smg = $comparison->smg('first string', 'second string'); // Smith Waterman Gotoh comparison
//echo "-----smg" . $smg ."\n";
$similar = $comparison->similarText('first string', 'second string'); // Using "similar_text()"
//echo "----Similar comparison" . $similar ."\n";

// This next one will return an array containing the results of all working comparison methods
// plus an array of 'data' that includes the first and second string, and the time in second it took to run all
// comparison. BE AWARE that comparing long string can results in really long compute time!
$all = $comparison->all('first string', 'second string');

$user = "i have forget lost my password";
$u = remove_stop_words($user);

echo "   user input $u     ";

$c = new \Atomescrochus\StringSimilarities\Compare();

?>
@foreach ($categories as $category)
 <?php
        echo $comparison->smg($category->body, $u) ;

 ?>
@endforeach


<!--

/*
use Skyeng\Lemmatizer;
use Skyeng\Lemma;

// Require Composer's autoloader
//require_once __DIR__ . "/vendor/autoload.php";

$lemmatizer = new Lemmatizer();

// retrieve a lemma with a part of speech.
// you can assign Lemma::POS_VERB or Lemma::POS_NOUN or Lemma::POS_ADJECTIVE or
// POS_ADVERB as a part of speech.
$lemmas = $lemmatizer->getLemmas('desks', Lemma::POS_NOUN); // => [ new Lemma('desk', Lemma::POS_NOUN) ]
//var_dump($lemmas);

// of course, available for irregular inflected form words.
$lemmas = $lemmatizer->getLemmas('went', Lemma::POS_VERB); // => [ new Lemma('go', Lemma::POS_VERB) ]

$lemmas = $lemmatizer->getLemmas('better', Lemma::POS_ADJECTIVE); // => [ new Lemma('better', Lemma::POS_ADJECTIVE), new Lemma('good', Lemma::POS_ADJECTIVE) ]

// when multiple base forms are found, return all of them.
$lemmas = $lemmatizer->getLemmas('leaves', Lemma::POS_NOUN); // => [ new Lemma('leave', Lemma::POS_NOUN), new Lemma('leaf', Lemma::POS_NOUN) ]

// retrieve a lemma without a part of speech.
$lemmas = $lemmatizer->getLemmas('sitting'); // => [ new Lemma('sit', Lemma::POS_VERB), new Lemma('sitting', Lemma::POS_ADJECTIVE) ]

// retrieve only lemmas not including part of speeches in the returned value.
$lemmas = $lemmatizer->getOnlyLemmas('desks', Lemma::POS_NOUN); // => [ 'desk' ]
$lemmas = $lemmatizer->getOnlyLemmas('coded', Lemma::POS_VERB); // => [ 'code' ]
$lemmas = $lemmatizer->getOnlyLemmas('leaves'); // => [ 'leave', 'leaf' ]

// Lemmatizer leaves alone a word not included in it's dictionary index.
$lemmas = $lemmatizer->getLemmas('MacBooks'); // => [ new Lemma('MacBooks', Lemma::POS_NOUN) ]
*/


/*use writecrow\Lemmatizer\Lemmatizer;
print Lemmatizer::getLemma('leaves');
// Will print 'leaf'

print Lemmatizer::getWordsFromLemma('leaf');
// Will print 'leaves,leafing,leafed,leafs'
*/
/*
use Wamania\Snowball\StemmerFactory;

// use ISO_639 (2 or 3 letters) or language name in english
$stemmer = StemmerFactory::create('fr');
$stemmer = StemmerFactory::create ('english');
$text = "it is raining";
$x = explode(" ", $text);
//var_dump($x);

// then
/*
for ($name = 0; $name < 3; $name++) {
    $stem = $stemmer->stem($x[$name]);
    echo $stem;
}

*/

/*
use function Rap2hpoutre\RemoveStopWords\remove_stop_words;


$u = remove_stop_words('The quick was her brown in the fox jumps over the lazy dog');
echo $u;
// quick brown fox jumps   lazy dog
$comparison = new \Atomescrochus\StringSimilarities\Compare();

// the functions returns similarity percentage between strings
$jaroWinkler = $comparison->jaroWinkler('first string', 'second string'); // JaroWinkler comparison
echo "jaroWinkler" . $jaroWinkler ."\n";
$levenshtein = $comparison->levenshtein('first string', 'second string'); // Levenshtein comparison
echo "levenshtein" . $levenshtein ."\n";
$smg = $comparison->smg('first string', 'second string'); // Smith Waterman Gotoh comparison
echo "smg" . $smg ."\n";
$similar = $comparison->similarText('first string', 'second string'); // Using "similar_text()"
echo "Similar comparison" . $similar ."\n";

// This next one will return an array containing the results of all working comparison methods
// plus an array of 'data' that includes the first and second string, and the time in second it took to run all
// comparison. BE AWARE that comparing long string can results in really long compute time!
$all = $comparison->all('first string', 'second string');

*/

?>
@foreach ($data as $o )
{{   $o  }}
@endforeach

