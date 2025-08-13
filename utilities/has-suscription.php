<?php

function user_has_subscription() {
    if ( ! function_exists( 'wcs_get_users_subscriptions' ) ) {
        return false;
    }

    $user_id = get_current_user_id();
    if ( ! $user_id ) {
        return false;
    }

    $suscripciones = wcs_get_users_subscriptions( $user_id );
		foreach ( $suscripciones as $suscripcion ) {
        if ( $suscripcion->has_status( 'active' ) || $suscripcion->has_status( 'pending-cancel' ) ) {
            return true;
        }
    }

    return false;
}
