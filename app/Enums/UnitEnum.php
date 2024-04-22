<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;


/**
 * @method static self Pieces()
 * @method static self Pack()
 * @method static self Kg()
 */
final class UnitEnum extends Enum
{
  protected static function values(): array
  {
    return [
      'Pieces' => 'pcs',
      'Pack' => 'pack',
      'Kg' => 'kg',
    ];
  }
}
