<?php

class AboutUs extends Eloquent {

    /**
     * AboutUs Database Model
     * 	-	id INT UNSIGNED / AUTO_INCREMENT PRIMARY KEY
     *  -	post_body TEXT
     *  -	post_body_eng TEXT
     *  -   text_position ENUM / ['left', 'right'] DEFAULT 'left'
     *  -	image_file_name VARCHAR(255)
     *  -	image_file_size DOUBLE
     *  - 	created_at TIMESTAMP
     *  - 	updated_at TIMESTAMP
     */

    /**
     * validation rules for entities
     *
     */
    public static $rules = ['post_body' => 'required',
                            'post_body_eng' => 'required',
                            'text_position' => 'required',
                            'image_file_name' => 'image|max:3000'
    ];

    /**
     * validation error messages
     */
    public static $messages = ['post_body.required' => 'Tekst stranice je obavezan.',
                                'post_body_eng.required' => 'Tekst engleske stranice je obavezan.',
                                'text_position.required' => 'Pozicija teksta je obavezna.',
                                'image_file_name.image' => 'Dozvoljeni formati slike su: .jpeg, .png, .bmp i .gif.',
                                'image_file_name.max' => 'Maksimalna veličina slike je 3MB.',
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'about_us';

}
