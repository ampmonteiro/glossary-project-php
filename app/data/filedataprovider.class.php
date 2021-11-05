<?php

#should be an interface because none of methods or
# dont have a method that is used cross child

class FileDataProvider extends DataProvider
{

    public function get_terms($ar = false)
    {
        $json = $this->get_data();

        return  json_decode($json, $ar);
    }

    public function get_term($term)
    {
        $terms = $this->get_terms();
        foreach ($terms as $item) {

            if ($item->term == $term) {
                return $item;
            }
        }

        return false;
    }

    public function update_term($original_term, $new_term, $definition)
    {
        $terms = $this->get_terms();

        foreach ($terms as $item) {

            if ($item->term == $original_term) {
                $item->term = $new_term;
                $item->definition = $definition;
                break;
            }
        }

        $this->set_data($terms);
    }


    public function search_terms($search)
    {
        $terms = $this->get_terms();

        $results = array_filter($terms, function ($item) use ($search) {

            if (
                strpos($item->term, $search) !== false ||
                strpos($item->definition, $search) !== false
            ) {
                return  $item;
            }
        });

        return $results;
    }


    public function add_term($term, $definition)
    {
        $items = $this->get_terms();

        $items[] = new GlossaryTerm($term, $definition);

        $this->set_data($items);
    }


    public function delete_term($term)
    {
        $terms = $this->get_terms();

        /* 
        my note: 
            this should not use in indexed array 
            only in assoc array
        
        */

        for ($i = 0; $i < count($terms); $i++) {
            if ($terms[$i]->term === $term) {

                unset($terms[$i]);
                break;
            }
        }

        /*     
        note: 
            because of unset, you need to create new indexed array
            with correted sequence index values 
        */

        $items = array_values($terms);

        $this->set_data($items);
    }

    private function get_data()
    {

        $json = '';

        if (!file_exists($this->source)) {
            file_put_contents($this->source, '');
        } else {
            $json = file_get_contents($this->source);
        }

        return $json;
    }


    private function set_data($ar)
    {
        $json = json_encode($ar);

        file_put_contents($this->source, $json);
    }
}
