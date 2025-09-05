<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Incident extends Model
{
    use HasFactory;


protected $fillable = [
'contract_id',
'date',
'description',
'location',
'status',
];


protected $casts = [
'date' => 'datetime',
];


// helper pour vérifier transitions
public static array $allowedTransitions = [
   'ouvert'           => ['prise_en_charge'],
    'prise_en_charge'  => ['clos', 'rejete'],
    'clos'             => [],
    'rejete'           => [],
];


public function canTransitionTo(string $newStatus): bool
{
$current = $this->status;
return in_array($newStatus, self::$allowedTransitions[$current] ?? []);
}
}
