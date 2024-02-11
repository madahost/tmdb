<?php

namespace madahost\tmdb;

class Tmdb
{
    private $id;

    public function __construct(ClientInterface $client)
    {
        $this->id = $client;
    }

    public function movie($movie)
    {
       return $this->id->result("movie", $movie);

    }
    public function people($people)
    {
        return $this->id->result('person', $people);
    }

    public function keyword($keyword)
    {
        return $this->id->result("keyword", $keyword);
    }

    public function network($network)
    {
        return $this->id->result("network", $network);
    }

    public function review($review)
    {
        return $this->id->result("review", $review);
    }

    public function tvOld($tv)
    {
        return $this->id->result("tv", $tv);
    }

    public function collection($collection)
    {
        return $this->id->result("collection", $collection);
    }
	public function tv($tv)
   	 {
		$result = []
        	$tvShow = $this->id->result("tv", $tv);
		$tvShow = json_decode($tvShow);
		$sesNum = range(1, $tvShow->number_of_seasons);
		$seasons = array();
		for ($i = 0; $i < count($sesNum); $i += 20) {
		    $seasons[] = array_slice($sesNum, $i, 20);
		}
		 
		 foreach($seasons as $season) {
			$result[] = ;
		 }
	    
		define('APPEND_TO_RESPONSE', 'season/'. join(',season/', $sesNum));
        return $this->id->result("tv", $tv);
    	}
}
