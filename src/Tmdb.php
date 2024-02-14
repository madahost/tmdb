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

    public function seasons($tv, $seasonsNum)
    {
		$return = ['seasons' => []];
		$seasonsArray = range(1, $seasonsNum);
		
		for ($i = 0; $i < count($seasonsArray); $i += 20) {
		    $seasons[] = array_slice($seasonsArray, $i, 20);
		}
		foreach($seasons as $season) {
			$result = json_decode($this->id->result("tv", $tv, ['append_to_response' => 'season/'. join(',season/', $season)]), true);
			if(isset($result['seasons'])) {
				foreach($season as $key => $value) {
					if(isset($result['season/'.$key])) {
						$result['seasons'][$key]['episodes'] = $result['season/'.$key]['episodes'];
						unset($result['season/'.$key]);
					}
				}
				$return['seasons'] += $result['seasons'] ;
			}
		}
        return $return['seasons'];
    }

    public function collection($collection)
    {
        return $this->id->result("collection", $collection);
    }
	
	public function tv($tv)
	{
		$tvShow = $this->id->result("tv", $tv);
        return $tvShow;
	}
}
