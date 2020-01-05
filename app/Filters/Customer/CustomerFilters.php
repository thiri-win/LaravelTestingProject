<?php

namespace App\Filters\Customer;

use App\Filters\QueryFilters;
use Illuminate\Support\Carbon;

use Illuminate\Database\Eloquent\Builder;


class UserFilters extends QueryFilters
{

	public function name( $name ) {
		return $this->builder->where('name', 'LIKE', "%". $name . "%" );
	}

	public function email( $email ) {
		return $this->builder->where('email', 'LIKE', "%". $email . "%" );
    }

	public function email_verified_at( $email_verified_at ) {

		if ( $email_verified_at == 'verified' ) {
			return $this->builder->whereNotNull('email_verified_at' );
		} else {
			return $this->builder->whereNull('email_verified_at' );
		}
	}

}
