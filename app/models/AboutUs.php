<?php

class AboutUS extends Eloquent {

    /**
     * AboutUs Database Model
     * 	-	id INT UNSIGNED / AUTO_INCREMENT PRIMARY KEY
     *  -	post_body TEXT
     *  -	image_file_name VARCHAR(255)
     *  -	image_file_size DOUBLE
     *  - 	created_at TIMESTAMP
     *  - 	updated_at TIMESTAMP
     */

    /**
     * validation rules for entities
     *
     */
    public static $rules = ['post_body' => 'required|',
                            'image_file_name' => 'image|max:3000'
    ];

    /**
     * validation error messages
     */
    public static $messages = ['post_body.required' => 'Tekst stranice je obavezan.',
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
