<?php

declare(strict_types=1);

class FileDataProvider implements DataProviderInterface
{

    function __construct($source)
    {
        $this->source = $source;
    }

    public function getTerms()
    {
        $data = $this->getData();

        return  json_decode($data, true);
    }

    // using union types in return value, PHP 8 feature
    public function getTerm($term)
    {
        $terms = $this->getTerms();
        foreach ($terms as $item) {

            if ($item['term'] == $term) {
                return $item;
            }
        }
        return false;
    }

    public function updateTerm($originalTerm, $newTerm, $definition)
    {
        $terms = $this->getTerms();

        foreach ($terms as $key => $item) {

            if ($item['term'] == $originalTerm) {

                $item['term'] = $newTerm;
                $item['definition'] = $definition;

                $terms[$key] = $item;
                break;
            }
        }

        $this->setData($terms);
    }

    public function searchTerms($search)
    {
        $terms = $this->getTerms();

        $results = array_filter($terms, function ($item) use ($search) {

            if (
                strpos($item['term'], $search) !== false ||
                strpos($item['definition'], $search) !== false
            ) {
                return  $item;
            }
        });

        return $results;
    }

    public function addTerm($term, $definition)
    {
        $items = $this->getTerms();

        $items[] =  [
            'term' => $term,
            'definition' => $definition
        ];

        $this->setData($items);
    }

    public function deleteTerm($term)
    {
        $terms = $this->getTerms();

        /* 
      my note: 
          this should not use in indexed array 
          only in assoc array
   
      note: 
          because of unset, you need to create new indexed array
          with correted sequence index values 
      */

        for ($i = 0; $i < count($terms); $i++) {
            if ($terms[$i]['term'] === $term) {

                unset($terms[$i]);
                break;
            }
        }

        $items = array_values($terms);

        $this->setData($items);
    }

    private function getData()
    {
        $data = '';

        if (!file_exists($this->source)) {
            file_put_contents($this->source, '');
        } else {
            $data = file_get_contents($this->source);
        }

        return $data;
    }

    private function setData($ar)
    {
        $data = json_encode($ar, JSON_PRETTY_PRINT);

        file_put_contents($this->source, $data);
    }
}
