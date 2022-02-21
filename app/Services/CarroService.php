<?php

namespace App\Services;

use App\Actions\QuestCarDataSearch;
use App\Models\Carro;

class CarroService
{
    private Carro $model;
    private QuestCarDataSearch $dataSearch;

    public function __construct(Carro $carro, QuestCarDataSearch $dataSearch)
    {
        $this->model = $carro;
        $this->dataSearch = $dataSearch;
    }

    public function listAll(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->model->all();
    }

    public function store($data): array
    {
        $imports = [];

        $cars = $this->dataSearch->handle($data['search_term']);
        foreach ($cars as $car) {
            $status = false;
            $new_car = Carro::firstOrNew(['link' => $car['link']]);

            if (!$new_car->id) {
                $new_car->fill($car)->save();
                $status = true;
            }

            $imports[] = [
                'status' => $status,
                'id' => $new_car->id,
                'name' => $new_car->nome_veiculo
            ];
        }

        return $imports;
    }

    public function destroy(Carro $carro): ?bool
    {
        $result = $carro->delete();

        session()->flash('flash_messages', [
            'status' => $result,
            'message' => ($result ? 'Veículo excluído com sucesso!' : 'Falha ao tentar remover o veículo')
        ]);

        return $result;
    }
}
