<?php
/**
 *  app/Traits/ScopeFilter.php
 *
 * Date-Time: 04.06.21
 * Time: 10:05
 * @author suspended values
 */

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait ScopeFilter
{

    /**
     * @param  $request
     *
     * @return Builder
     */
    public function filter($request): Builder
    {
        $data = $this->query();
        $filterScopes = $this->getFilterScopes();
        foreach ($this->getActiveFilters($request) as $filter => $value) {
            if (!array_key_exists($filter, $filterScopes)) {
                continue;
            }
            $filterScopeData = $filterScopes[$filter];

            if (false === $filterScopeData['hasParam']) {
                $data->{$value}();
                continue;
            }
            $methodToExecute = $filterScopeData['scopeMethod'];
            $data->{$methodToExecute}($value);
        }

        $sortParams = ['sort' => 'id', 'order' => 'desc'];

        if ($request->filled('sort') && $request->filled('order')) {
            $sortParams = $request->only('sort', 'order');
        }

        return $data->sorted($sortParams);
    }

    /**
     * @param  $request
     *
     * @return array
     */
    public function getActiveFilters($request): array
    {
        $activeFilters = [];
        foreach ($this->getFilterScopes() as $key => $value) {
            if ($request->filled($key)) {
                $activeFilters [$key] = $request->{$key};
            }
        }
        return $activeFilters;
    }

    /**
     * @param $query
     * @param array $sortParams
     *
     * @return mixed
     */
    public function scopeSorted($query, array $sortParams)
    {
        return $query->orderBy($sortParams['sort'], $sortParams['order']);
    }

    /**
     * @param $query
     * @param $id
     *
     * @return mixed
     */
    public function scopeId($query, $id)
    {
        return $query->where('id', $id);
    }

    /**
     * @param $query
     * @param $name
     *
     * @return mixed
     */
    public function scopeName($query, $name)
    {
        return $query->where('name', 'like', '%' . $name . '%');
    }

    /**
     * @param $query
     * @param $name
     *
     * @return mixed
     */
    public function scopeFirstName($query, $name)
    {
        return $query->whereHas('profile', function ($query) use ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        });
    }

    /**
     * @param $query
     * @param $email
     *
     * @return mixed
     */
    public function scopeEmail($query, $email)
    {
        return $query->where('email', 'like', '%' . $email . '%');
    }

    /**
     * @param $query
     * @param $surname
     *
     * @return mixed
     */
    public function scopeLastName($query, $surname)
    {
        return $query->whereHas('profile', function ($query) use ($surname) {
            $query->where('surname', 'like', '%' . $surname . '%');
        });
    }

    /**
     * @param $query
     * @param $locale
     *
     * @return mixed
     */
    public function scopeLocale($query, $locale)
    {
        return $query->where('locale', 'like', '%' . $locale . '%');
    }

    /**
     * @param $query
     * @param $status
     *
     * @return mixed
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * @param $query
     * @param $moderator
     *
     * @return mixed
     */
    public function scopeModerator($query, $moderator)
    {
        return $query->where('is_moderator', $moderator);
    }

    /**
     * @param $query
     * @param $admin
     *
     * @return mixed
     */
    public function scopeAdmin($query, $admin)
    {
        return $query->where('is_admin', $admin);
    }

    /**
     * @param $query
     * @param $text
     *
     * @return mixed
     */
    public function scopeText($query, $text)
    {
        return $query->where('text', 'like', '%' . $text . '%');
    }

    /**
     * @param $query
     * @param $slug
     *
     * @return mixed
     */
    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', 'like', '%' . $slug . '%');
    }

    /**
     * @param $query
     * @param $slug
     *
     * @return mixed
     */
    public function scopeKey($query, $slug)
    {
        return $query->where('key', 'like', '%' . $slug . '%');
    }

    /**
     * @param $query
     * @param $title
     *
     * @return mixed
     */
    public function scopeTitleTranslation($query, $title)
    {
        return $query->whereHas('translations', function ($query) use ($title) {
            return $query->where('title', 'like', '%' . $title . '%');
        });
    }

    /**
     * @param $query
     * @param $title_1
     *
     * @return mixed
     */
    public function scopeTitle1Translation($query, $title_1)
    {
        return $query->whereHas('translations', function ($query) use ($title_1) {
            return $query->where('title_1', 'like', '%' . $title_1 . '%');
        });
    }

    /**
     * @param $query
     * @param $title_2
     *
     * @return mixed
     */
    public function scopeTitle2Translation($query, $title_2)
    {
        return $query->whereHas('translations', function ($query) use ($title_2) {
            return $query->where('title_2', 'like', '%' . $title_2 . '%');
        });
    }

    /**
     * @param $query
     * @param $description
     *
     * @return mixed
     */
    public function scopeDescriptionTranslation($query, $description)
    {
        return $query->whereHas('translations', function ($query) use ($description) {
            return $query->where('description', 'like', '%' . $description . '%');
        });
    }

    /**
     * @param $query
     * @param $name
     *
     * @return mixed
     */
    public function scopeNameTranslation($query, $name)
    {
        return $query->whereHas('translations', function ($query) use ($name) {
            return $query->where('name', 'like', '%' . $name . '%');
        });
    }

    /**
     * @param $query
     * @param $title
     *
     * @return mixed
     */
    public function scopeTitle($query, $title)
    {
        return $query->where('title', 'like', '%' . $title . '%');
    }

    /**
     * @param $query
     * @param $position
     *
     * @return mixed
     */
    public function scopePositionTranslation($query, $position)
    {
        return $query->whereHas('translations', function ($query) use ($position) {
            return $query->where('position', 'like', '%' . $position . '%');
        });
    }

    /**
     * @param $query
     * @param $content
     *
     * @return mixed
     */
    public function scopeContentTranslation($query, $content)
    {
        return $query->whereHas('translations', function ($query) use ($content) {
            return $query->where('content', 'like', '%' . $content . '%');
        });
    }


    /**
     * @param $query
     * @param $value
     * @return mixed
     */
    public function scopeValueTranslation($query, $value)
    {
        return $query->whereHas('translations', function ($query) use ($value) {
            return $query->where('value', 'like', '%' . $value . '%');
        });
    }
}
