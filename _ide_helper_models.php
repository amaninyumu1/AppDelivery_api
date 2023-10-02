<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Admin
 *
 * @property int $id
 * @property string $names
 * @property string $email
 * @property string $tel
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereNames($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperAdmin {}
}

namespace App\Models{
/**
 * App\Models\Categorie
 *
 * @property int $id
 * @property string $categories_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Plat> $plat
 * @property-read int|null $plat_count
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie query()
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereCategoriesName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperCategorie {}
}

namespace App\Models{
/**
 * App\Models\Commande
 *
 * @property int $id
 * @property string $adresse
 * @property string $coutTotal
 * @property string $distance
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $status_commande
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Panier> $panier
 * @property-read int|null $panier_count
 * @method static \Illuminate\Database\Eloquent\Builder|Commande newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commande newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commande query()
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereAdresse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereCoutTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereDistance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereStatusCommande($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperCommande {}
}

namespace App\Models{
/**
 * App\Models\GalerieImage
 *
 * @property int $id
 * @property string $images
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GalerieImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GalerieImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GalerieImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|GalerieImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GalerieImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GalerieImage whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GalerieImage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperGalerieImage {}
}

namespace App\Models{
/**
 * App\Models\Panier
 *
 * @property int $id
 * @property int $nbrePlats
 * @property string $cout
 * @property int $status
 * @property int|null $user_id
 * @property int|null $plat_id
 * @property int|null $commande_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Commande|null $commande
 * @property-read \App\Models\Plat|null $plat
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Panier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Panier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Panier query()
 * @method static \Illuminate\Database\Eloquent\Builder|Panier whereCommandeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Panier whereCout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Panier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Panier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Panier whereNbrePlats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Panier wherePlatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Panier whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Panier whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Panier whereUserId($value)
 * @mixin \Eloquent
 */
	class IdeHelperPanier {}
}

namespace App\Models{
/**
 * App\Models\Plat
 *
 * @property int $id
 * @property string $plat_name
 * @property string $description
 * @property string $prix
 * @property string $dure
 * @property int|null $categorie_id
 * @property int|null $restaurant_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Categorie|null $categorie
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\GalerieImage> $galerieImage
 * @property-read int|null $galerie_image_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Panier> $panier
 * @property-read int|null $panier_count
 * @property-read \App\Models\Restaurant|null $restaurant
 * @method static \Illuminate\Database\Eloquent\Builder|Plat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plat query()
 * @method static \Illuminate\Database\Eloquent\Builder|Plat whereCategorieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plat whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plat whereDure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plat wherePlatName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plat wherePrix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plat whereRestaurantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plat whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperPlat {}
}

namespace App\Models{
/**
 * App\Models\Restaurant
 *
 * @property int $id
 * @property string $restaurant_name
 * @property string $adresse
 * @property string $restaurant_email
 * @property string $restaurant_tel
 * @property string $whatsapp
 * @property string|null $logo
 * @property string $longitude
 * @property string $latitude
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $user_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Plat> $plat
 * @property-read int|null $plat_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereAdresse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereRestaurantEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereRestaurantName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereRestaurantTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereWhatsapp($value)
 * @mixin \Eloquent
 */
	class IdeHelperRestaurant {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $roles
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereRoles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperRole {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $tel
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Panier> $panier
 * @property-read int|null $panier_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Restaurant> $restaurant
 * @property-read int|null $restaurant_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $role
 * @property-read int|null $role_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser {}
}

