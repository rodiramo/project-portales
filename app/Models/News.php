<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\News
 *
 * @property int $news_id
 * @property string $title
 * @property string $description
 * @property string|null $cover
 * @property string|null $cover_description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCoverDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereNewsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent.Builder|News whereUpdatedAt($value)
 * @mixin \Eloquent
 */

class News extends Model
{
    //use HasFactory;

    protected $table = 'news';

    protected $primaryKey = 'news_id';
    
    protected $fillable = ['title', 'cover', 'cover_description', 'description'];

    public static function validationRules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required|min:10',
        ];
    }

    public static function validationMessages(): array
    {
        return [           
            'title.required' => 'Please write a title.',
            'description.min' => 'The description must be at least :min characters.',
        ];
    }
}

