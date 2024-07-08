<?php


namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Rap2hpoutre\RemoveStopWords\remove_stop_words;

use Illuminate\Database\Eloquent\Collection;

class CategoryController extends Controller
{
    public $a;


    public function match()
    {

        $a = new \Atomescrochus\StringSimilarities\Compare();

        $userQuery = "course";

        $databaseKeywords = DB::table('categories')->get();

        $count = DB::table('categories')->count();

        $i = 1;

        foreach($databaseKeywords as $keywords) {
   $keywords->similar = similar_text($userQuery, $keywords->body);
            while ($i <= $count) {

                    $A = DB::table('categories')->where('id', $i)->update(['similar' => $keywords->similar]);

                    echo $keywords->similar ."   a   ";

                    $i++;
                    break;
            }


         }

      //  echo $category = DB::table('categories')->orderBy('similar', 'desc')->get();

    }
}






/*    $sortedKeywords = $databaseKeywords->map(function ($keyword) use ($userQuery) {
            return [
                'keyword' => $keyword,
                'similarity' => DB::select("SELECT SIMILARITY(?, ?) AS similarity", [$keyword, $userQuery])[0]->similarity
            ];
        })->sortByDesc('similarity')->pluck('body')->toArray();

        $highestMatchedKeyword = $sortedKeywords[0];
        $highestMatchedData = DB::table('data')->where('keyword', $highestMatchedKeyword)->get();

        // Return the highest matched data
        return $highestMatchedData;


    }*/



    /* public function match() {

         $a = new \Atomescrochus\StringSimilarities\Compare();
         $v = array();
         $data = DB::table('categories')->get();
         $userQuery = "password lost course";
         $i = 0;
             foreach($data as $x) {

                $v[$i] = similar_text($userQuery, $x->body, $percent);
                 echo "persernt ". $i. "=====>".  $percent;
                echo "+++++++++++++:".   $v[$i]."......" ;
                 $i++;

             }
             echo "maximum" . $v.indexOf(max($v));

             foreach($v as $a) {
                 echo "---------------- ".$a;
             }
     }
*/


















    /*
        public function match() {
    $comparison = new \Atomescrochus\StringSimilarities\Compare();

        //return view('practice')->with('categories', Category::all());
        $userQuery = "password lost course";
        $keywords = DB::table('categories')
        ->select('body')
        ->where(function ($categories) use ($userQuery) {
            $keywords = explode(' ', $userQuery);
             foreach ($categories as $keyword) {
                $comparison->similarText($userQuery, $keyword);
            }
         //
        })
        ->get();

        return $keywords;
        }
    */
