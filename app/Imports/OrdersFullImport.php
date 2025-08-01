<?php

namespace App\Imports;

use App\Models\Order;
use App\Models\Client;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none'); // preserve original casing and special characters

class OrdersFullImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Normalize keys
        $orderNumber     = $row['Pasūtījuma numurs'] ?? null;
        $date            = $row['Datums'] ?? now()->toDateString();
        $clientName      = $row['Klients (name)'] ?? null;
        $productName     = $row['Produkts (name)'] ?? null;
        $clientId        = $row['Client ID'] ?? null;
        $productId       = $row['Product ID'] ?? null;
        $quantity        = $row['Daudzums'] ?? 0;
        $deliveryDate    = $row['Izpildes datums'] ?? null;
        $priority        = $row['Prioritāte'] ?? 'normāla';
        $status          = $row['Statuss'] ?? 'nav nodots ražošanai';
        $note            = $row['Piezīmes'] ?? null;

        // Skip duplicates
        if ($orderNumber && \App\Models\Order::where('pasutijuma_numurs', $orderNumber)->exists()) {
            return null;
        }

        return new Order([
            'pasutijuma_numurs' => $orderNumber,
            'datums'            => $date,
            'client_id'         => $clientId ?: optional(Client::where('nosaukums', $clientName)->first())->id,
            'klients'           => $clientName,
            'products_id'       => $productId ?: optional(Product::where('nosaukums', $productName)->first())->id,
            'produkts'          => $productName,
            'daudzums'          => $quantity,
            'izpildes_datums'   => $deliveryDate,
            'prioritāte'        => $priority,
            'statuss'           => $status,
            'piezimes'          => $note,
        ]);
    }
}
