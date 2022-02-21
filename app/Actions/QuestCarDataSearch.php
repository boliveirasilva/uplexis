<?php

namespace App\Actions;

use DOMDocument;
use DOMXPath;

class QuestCarDataSearch
{
    private string $url;

    public function __construct($base_url)
    {
        $this->url = $base_url;
    }

    private function getPreparedRegex($field_name, $field_rule = null): ?string
    {
        $default_regex = '/<li.*\s*.*card-list__title.*\s.*' . $field_name . ':.*\s*.*card-list__info.*\s*(' . $field_rule . ').*?\s?<\/span>/imu';
        $title_regex = '/<h2.*card__title.*<a.*">(.*)<\/a>/imu';
        $link_regex = '/<h2.*card__title.*<a.*href="(.*?)">/imu';
        $price_regex = '/<div.*\s*.*card__price.*' . $field_name . ':.*card__price-number.*?(' . $field_rule . ')<span/imu';
        $image_regex = '/<img(?:.*?|\s)*src="(.*?)"/imu';

        return match (strtolower($field_name)) {
            'ano', 'quilometragem', 'combustível', 'câmbio', 'portas', 'cor' => $default_regex,
            'titulo' => $title_regex,
            'link' => $link_regex,
            'preço' => $price_regex,
            'img' => $image_regex,
            default => null,
        };
    }

    public function handle(string $search_term): array
    {
        $data = [];

        // Desativando temporariamente os erros da libxml.
        $internal_errors_original = libxml_use_internal_errors(true);

        $dom = new DOMDocument();
        $dom->loadHTMLFile($this->url . '?termo=' . $search_term);
        $xpath = new DOMXPath($dom);

        // Separando a página em pequenos fragmentos para facilitar o uso das Regex.
        $searchedField = $xpath->query('//main[@class="main-content"]//article');
        foreach ($searchedField as $field) {
            $html = Str($dom->saveHtml($field));

            $data[] = [
                'nome_veiculo' => $html->match($this->getPreparedRegex('Titulo'))->value(),
                'link' => $html->match($this->getPreparedRegex('Link'))->value(),
                'ano' => $html->match($this->getPreparedRegex('Ano', '\d{4}'))->value(),
                'combustivel' => $html->match($this->getPreparedRegex('Combustível','(\w+)'))->value(),
                'portas' => $html->match($this->getPreparedRegex('Portas','\d+'))->value(),
                'quilometragem' => $html->match($this->getPreparedRegex('Quilometragem', '[0-9\.]+'))->value(),
                'cambio' => $html->match($this->getPreparedRegex('Câmbio','\w+'))->value(),
                'cor' => $html->match($this->getPreparedRegex('Cor','\w+'))->value(),
                'image' => $html->match($this->getPreparedRegex('Img'))->value(),
                'preco' => $html->match($this->getPreparedRegex('Preço','[0-9\.,]+'))->value(),
            ];
        };

        // Retornando ao status original os erros da libxml.
        libxml_use_internal_errors($internal_errors_original);

        return $data;
    }
}
