<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/*
 * Los modelos que implementen Eloquent deben heredar de la clase "Model" de Eloquent.
 * Si estamos siguiendo las convenciones de Laravel para nombres de tablas, campos y clases, solo con la
 * definición de esta clase ya podríamos, potencialmente, hacer un ABM completo.
 * Dicho esto, si no seguimos todas las convenciones, o si queremos usar ciertas funcionalidades, hay un par
 * de cosas debemos configurar.
 */
/**
 * App\Models\Game
 *
 * @property int $game_id
 * @property string $title
 * @property string $release_date
 * @property int $price
 * @property string $description
 * @property string|null $cover
 * @property string|null $cover_description
 * @propnerty \Illuminate\Support\Carbo|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Game newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Game newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Game query()
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereCoverDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereGameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereUpdatedAt($value)
 * @property int $rating_id
 * @property-read \App\Models\Rating $rating
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereRatingId($value)
 * @mixin \Eloquent
 */
class Game extends Model
{
    use SoftDeletes;

    protected $table = 'games';

    protected $primaryKey = 'game_id';
    
    protected $fillable = ['title', 'price', 'release_date', 'cover', 'cover_description', 'description']; 

    public static function validationRules(): array
    {
        return [
            'title' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'release_date' => 'required',
        ];
    }

    public static function validationMessages(): array
    {
        return [
            'title.required' => 'Please write a title for this game.',
            'description.required' => 'Please write a description for this game',
            'price.required' => 'You need to provide a price for this game.',
            'price.numeric' => 'The price needs to be a numeric value.',
            'release_date.required' => 'Please write a release date for this game.',
        ];
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            function (int $price) {
                return $price / 100;
            },
            function (float $price) {
                return $price * 100;
            }
        );
    }
}
