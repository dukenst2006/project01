<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Alert Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain alert messages for various scenarios
    | during CRUD operations. You are free to modify these language lines
    | according to your application's requirements.
    |
    */

    'backend' => [
        'permissions' => [
            'created' => 'Permission créée avec succès.',
            'deleted' => 'Permission supprimée avec succès.',

            'groups'  => [
                'created' => 'Groupe de permissions créé avec succès.',
                'deleted' => 'Groupe de permissions supprimé avec succès.',
                'updated' => 'Groupe de permissions mis à jour avec succès.',
            ],

            'updated' => 'Permission mise à jour avec succès.',
        ],

        'roles' => [
            'created' => 'Rôle créé avec succès.',
            'deleted' => 'Rôle supprimé avec succès.',
            'updated' => 'Rôle mis à jour avec succès.',
        ],

        'users' => [
            'confirmation_email' => "Un email de confirmation a été adressé à l'adresse indiquée",
            'created' => "Utilisateur créé avec succès.",
            'deleted' => "Utilisateur supprimé avec succès.",
            'deleted_permanently' => "L'utilisateur a été supprimé définitivement.",
            'restored' => "L'utilisateur a été ré-activé.",
            'updated' => "Utilisateur mis à jour avec succès.",
            'updated_password' => "Le mot de passe utilisateur a été mis à jour avec succès.",
        ],

        'customers' => [
            'created' => "Clients créé avec succès.",
            'deleted' => "Clients supprimé avec succès.",
            'deleted_permanently' => "L'Clients a été supprimé définitivement.",
            'restored' => "L'Clients a été ré-activé.",
            'updated' => "Clients mis à jour avec succès.",
            'updated_password' => "Le mot de passe Clients a été mis à jour avec succès.",
        ],

        'transactions' => [
            'created' => "Transaction créé avec succès.",
            'deleted' => "Transaction supprimé avec succès.",
            'deleted_permanently' => "Transaction a été supprimé définitivement.",
            'restored' => "Transaction a été ré-activé.",
            'updated' => "Transaction mis à jour avec succès.",
            'failed'  => "Ce compte n'a pas assez de fond pour effectuer cette transaction",
        ],
        'backup' => [
            'success' => "Le Back up a été effectué avec succès.",
            'fail' => "Le Back up a échoué, veuillez essayer a nouveau!",
        ]


    ],
];