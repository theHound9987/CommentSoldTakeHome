<?php


namespace App\Services\Database;


use App\Repositories\Database\ProductsRepository;

class ProductService {

    /**
     * @var ProductsRepository
     */
    private $productRepository;

    public function __construct(ProductsRepository $productsRepository) {
        $this->productRepository = $productsRepository;
    }

    public function all() {
        return $this->productRepository->all();
    }

    public function allWithPagination(int $items) {
        return $this->productRepository->allWithPagination($items);
    }
}
