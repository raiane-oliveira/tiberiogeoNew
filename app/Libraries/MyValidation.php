<?php


namespace App\Libraries;

class MyValidation
{

    /**
     * [Description for equalCategory]
     *
     * @param string $newCategory
     * @param string $category
     * @param array $data
     * 
     * @return bool
     * 
     */
    public function equalCategory(string $newCategory, string $category, array $data): bool
    {
        if (strpos($category, '.') === false) {
            return $newCategory !== dot_array_search($category, $data);
        }

        return array_key_exists($category, $data) && $newCategory === $data[$category];  
    }
}
