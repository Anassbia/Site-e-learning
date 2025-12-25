<?php

declare(strict_types=1);

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddToWishlistType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // this is duplication: csrf is enabled by default @see config/packages/csrf.yaml:4
            'csrf_protection' => true, // Ensure to protect this form against the csrf attack
            'csrf_token_id' => 'add_to_wishlist',
            'csrf_field_name' => '__token',
        ]);
    }
}

