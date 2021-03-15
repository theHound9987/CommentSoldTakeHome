<?php


namespace App\Services\Database;


use App\Exceptions\Database\NoInventoryException;
use App\Repositories\Database\InventoryRepository;

class InventoryService {

    /**
     * @var InventoryRepository
     */
    private $inventoryRepository;

    public function __construct(InventoryRepository $inventoryRepository) {
        $this->inventoryRepository = $inventoryRepository;
    }

    public function find(array $params){
        $returnValue = null;

        if($params['userFriendly'] == true) {
            if (isset($params["pagination"])) {
                $returnValue = $this->inventoryRepository->userFriendlyWithPaginationAll($params["pagination"]);
            }

            if(isset($params["productId"])){
                $returnValue = $this->inventoryRepository->userFriendlyByProductId($params["productId"]);
            }

            if(isset($params["sku"])){
                $returnValue = $this->inventoryRepository->userFriendlyBySKU($params["sku"]);
            }

        }

        if(is_null($returnValue)){
            throw new NoInventoryException("Could not find inventory by: {$params}");
        }

        return $returnValue;
    }

    public function userFriendlyWithPaginationAll(int $items) {
        return $this->inventoryRepository->userFriendlyWithPaginationAll($items);
    }

    public function userFriendlyByProductId(int $id) {
        return $this->inventoryRepository->userFriendlyByProductId($id);
    }

    public function userFriendlyBySKU(string $sku) {
        return $this->inventoryRepository->userFriendlyBySKU($sku);
    }
}
