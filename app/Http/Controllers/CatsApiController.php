<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class CatsApiController extends Controller
{

    protected $url = 'https://cat-fact.herokuapp.com/facts';

    public  function getUrl (){
        return $this->url;
    }

    public function getJson($url)
    {
        $response = file_get_contents($url, false);
        $jsonToObject = (object) json_decode($response, true);
        return $jsonToObject;
    }

    public  function getFactsData(){

        $allCatsFacts = $this->getJson($this->url);
        $newFactsArray = array();
        foreach ( $allCatsFacts->all as $key => $value){
           $fName =  ( isset($value['user']['name']['first'])) ? $value['user']['name']['first'] : '';
           $lName = ( isset($value['user']['name']['last'])) ? $value['user']['name']['last'] : '';
           $value['fName'] = $fName;
           $value['lName'] = $lName;
           $newFactsArray[$key] = $value;
        }
        return $newFactsArray;
    }


    public function paginate($items, $perPage = 12, $page = null)
    {
        $pageName = 'page';
        $page     = $page ?: (Paginator::resolveCurrentPage($pageName) ?: 1);
        $items    = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator(
            $items->forPage($page, $perPage)->values(),
            $items->count(),
            $perPage,
            $page,
            [
                'path'     => Paginator::resolveCurrentPath(),
                'pageName' => $pageName,
            ]
        );
    }

    public  function index(){
        $allFactsCat = collect($this->getFactsData());
        $countFacts = $allFactsCat->count();
        $paginateFactsCat = $this->paginate($allFactsCat);
        return view('home', ['countFacts' => $countFacts, 'paginateFactsCat' => $paginateFactsCat, ]);
    }

}
