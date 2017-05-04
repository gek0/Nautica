<?php

class Testemonial extends Eloquent {

    /**
     * Testemonial Database Model
     * 	-	id INT UNSIGNED / AUTO_INCREMENT PRIMARY KEY
     *  -	testemonial_author VARCHAR (100)
     *  -	testemonial_text TEXT
     *  - 	created_at TIMESTAMP
     *  - 	updated_at TIMESTAMP
     */

    /**
     * validation rules for entities
     *
     */
    public static $rules = ['testemonial_author' => 'required|max:100',
                            'testemonial_text' => 'required',
    ];

    /**
     * validation error messages
     */
    public static $messages = ['testemonial_author.required' => 'Autor kritike je obavezan.',
                                'testemonial_author.max' => 'Autor kritike je predugačak, max. 100 znakova.',
                                'testemonial_text.required' => 'Tekst kritike je obavezan.'
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'testemonials';

}
