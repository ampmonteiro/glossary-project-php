<?php

declare(strict_types=1);

class FileDataProvider implements DataProviderInterface
{
    // apply php 8 feature promoting class properties on source prop
    function __construct(private string $source)
    {
    }

    public function getTerms(): array
    {
        $data = $this->getData();

        return  json_decode(json: $data, associative: true);
    }

    // using union types in return value, PHP 8 feature
    public function getTerm(string $term): array | bool
    {
        $terms = $this->getTerms();
        foreach ($terms as $item) {

            if ($item['term'] == $term) {
                return $item;
            }
        }
        return false;
    }

    public function updateTerm(string $originalTerm, string $newTerm, string $definition): void
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

        $this->setData(values: $terms);
    }

    public function searchTerms(string $search): array
    {
        $terms = $this->getTerms();

        $results = array_filter(array: $terms, callback: function ($item) use ($search) {

            if (
                strpos($item['term'], $search) !== false ||
                strpos($item['definition'], $search) !== false
            ) {
                return  $item;
            }
        });

        return $results;
    }

    public function addTerm(string $term, string $definition): void
    {
        $items = $this->getTerms();

        $items[] =  [
            'term' => $term,
            'definition' => $definition
        ];

        $this->setData(values: $items);
    }

    public function deleteTerm(string $term): void
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

        $this->setData(values: $items);
    }

    private function getData(): string
    {
        $data = '';

        if (!file_exists(filename: $this->source)) {
            file_put_contents(filename: $this->source, data: '');
        } else {
            $data = file_get_contents(filename: $this->source);
        }

        return $data;
    }

    private function setData($values): void
    {
        $data = json_encode(value: $values, flags: JSON_PRETTY_PRINT);

        file_put_contents(filename: $this->source, data: $data);
    }
}
