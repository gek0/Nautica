<?php

class AdminController extends BaseController {

    /**
     * CSRF validation on requests
     */
    public function __construct()
    {
        $this->beforeFilter('crfs', ['on' => ['post', 'put', 'patch', 'delete']]);
    }

    /**
     * show admin homepage
     * @return mixed
     */
    public function showHome()
    {
        $info_data = Info::first();

        if($info_data == null){
            $info_data['post_body'] = 'Tekst stranice...(HR)';
            $info_data['post_body_eng'] = 'Tekst stranice...(ENG)';
            $info_data['image_file_name'] = null;
        }

        return View::make('admin.index')->with(['page_title' => 'Administracija',
                                                'info_data' => $info_data
        ]);
    }

    /**
     * show admin testemonials
     * @return mixed
     */
    public function showTestemonials()
    {
        $testemonials_data = Testemonial::orderBy('id', 'DESC')->get();

        return View::make('admin.testemonials')->with(['page_title' => 'Administracija',
                                                'testemonials_data' => $testemonials_data
        ]);
    }

    /**
     * add testemonial
     * @return mixed
     */
    public function addTestemonial()
    {
        $form_data = ['testemonial_author' => e(Input::get('testemonial_author')), 'testemonial_text' => e(Input::get('testemonial_text'))];
        $token = Input::get('_token');

        //check if csrf token is valid
        if(Session::token() != $token){
            return Redirect::back()->withErrors('Nevažeći CSRF token!');
        }

        $validator = Validator::make($form_data, Testemonial::$rules, Testemonial::$messages);
        //check validation results and category if ok
        if($validator->fails()){
            return Redirect::back()->withErrors($validator->getMessageBag()->toArray())->withInput();
        }
        else{
            $testemonial = new Testemonial;
            $testemonial->testemonial_author = $form_data['testemonial_author'];
            $testemonial->testemonial_text = $form_data['testemonial_text'];
            $testemonial->save();
        }

        return Redirect::to('admin/kritike')->with(['success' => 'Kritika je uspješno dodana']);
    }

    /**
     * delete testemonial
     * @return mixed
     */
    public function deleteTestemonial($id = null)
    {
        if($id == null){
            return Redirect::to('admin/kritike')->withErrors('Kritika ne postoji');
        }
        else{
            $testemonial = Testemonial::where('id', '=', $id)->first();
            if(!$testemonial){
                return Redirect::to('admin/kritike')->withErrors('Kritika ne postoji');
            }
            else{
                $testemonial->delete();
                return Redirect::to('admin/kritike')->with(['success' => 'Kritika je uspješno obrisana']);
            }
        }
    }

    /**
     * show admin users
     * @return mixed
     */
    public function showUsers()
    {
        $users_data = User::orderBy('id', 'DESC')->get();

        return View::make('admin.users')->with(['page_title' => 'Administracija',
                                                'users_data' => $users_data
        ]);
    }

    /**
     * show admin user edit
     * @return mixed
     */
    public function showUpdateUser($id = null)
    {
        if($id == null){
            return Redirect::to('admin/korisnici')->withErrors('Korisnik ne postoji');
        }
        else{
            $user = User::where('id', '=', $id)->first();
            if(!$user){
                return Redirect::to('admin/korisnici')->withErrors('Korisnik ne postoji');
            }
            else{
                return View::make('admin.users-edit')->with(['page_title' => 'Administracija',
                                                        'user' => $user
                ]);
            }
        }
    }

    /**
     * update user
     * @return mixed
     */
    public function updateUser()
    {
        $form_data = ['username' => e(Input::get('username')), 'password' => Input::get('password'), 'password_again' => Input::get('password_again'), 'email' => e(Input::get('email'))];
        $token = Input::get('_token');
        $user_id = e(Input::get('id'));

        //check if csrf token is valid
        if(Session::token() != $token){
            return Redirect::back()->withErrors('Nevažeći CSRF token!');
        }

        $validator = Validator::make($form_data, User::$rulesLessStrict, User::$messages);
        //check validation results and category if ok
        if($validator->fails()){
            return Redirect::back()->withErrors($validator->getMessageBag()->toArray())->withInput();
        }
        else{
            $user = User::where('id', '=', $user_id)->first();
            $user->username = $form_data['username'];
            if(!empty($form_data['password']) && !empty($form_data['password'])){
                $user->password = Hash::make($form_data['password']);
            }
            $user->email = $form_data['email'];
            $user->save();
        }

        return Redirect::to('admin/korisnici')->with(['success' => 'Korisnik je uspješno izmjenjen']);
    }

    /**
     * add user
     * @return mixed
     */
    public function addUser()
    {
        $form_data = ['username' => e(Input::get('username')), 'password' => Input::get('password'), 'password_again' => Input::get('password_again'), 'email' => e(Input::get('email'))];
        $token = Input::get('_token');

        //check if csrf token is valid
        if(Session::token() != $token){
            return Redirect::back()->withErrors('Nevažeći CSRF token!');
        }

        $validator = Validator::make($form_data, User::$rules, User::$messages);
        //check validation results and category if ok
        if($validator->fails()){
            return Redirect::back()->withErrors($validator->getMessageBag()->toArray())->withInput();
        }
        else{
            $user = new User;
            $user->username = $form_data['username'];
            $user->password = Hash::make($form_data['password']);
            $user->email = $form_data['email'];
            $user->save();
        }

        return Redirect::to('admin/korisnici')->with(['success' => 'Korisnik je uspješno dodan']);
    }

    /**
     * delete user
     * @return mixed
     */
    public function deleteUser($id = null)
    {
        if($id == null){
            return Redirect::to('admin/korisnici')->withErrors('Korisnik ne postoji');
        }
        else{
            $user = User::where('id', '=', $id)->first();
            if(!$user){
                return Redirect::to('admin/korisnici')->withErrors('Korisnik ne postoji');
            }
            else{
                $user->delete();
                return Redirect::to('admin/korisnici')->with(['success' => 'Korisnik je uspješno obrisan']);
            }
        }
    }

    /**
     * show admin about us
     * @return mixed
     */
    public function showAboutUs()
    {
        $about_us_data = AboutUs::first();

        if($about_us_data == null){
            $about_us_data['post_body'] = 'Tekst stranice...(HR)';
            $about_us_data['post_body_eng'] = 'Tekst stranice...(ENG)';
            $about_us_data['text_position'] = 'left';
            $about_us_data['image_file_name'] = null;
        }

        return View::make('admin.about-us')->with(['page_title' => 'Administracija',
                                                    'about_us_data' => $about_us_data
        ]);
    }

    /**
     * update about-us database model
     * @return mixed
     */
    public function updateAboutUs()
    {
        $form_data = ['post_body' => e(Input::get('post_body')), 'post_body_eng' => e(Input::get('post_body_eng')), 'text_position' => e(Input::get('text_position')), 'image_file_name' => Input::file('about_us_image')];
        $token = Input::get('_token');

        //check if csrf token is valid
        if(Session::token() != $token){
            return Redirect::back()->withErrors('Nevažeći CSRF token!');
        }

        $validator = Validator::make($form_data, AboutUs::$rules, AboutUs::$messages);
        //check validation results and category if ok
        if($validator->fails()){
            return Redirect::back()->withErrors($validator->getMessageBag()->toArray())->withInput();
        }
        else{
            //only one record in database
            $check_data = AboutUs::first();
            if($check_data == null){
                $about_us = new AboutUs;
            }
            else{
                $about_us = $check_data;
            }

            $about_us->post_body = $form_data['post_body'];
            $about_us->post_body_eng = $form_data['post_body_eng'];
            $about_us->text_position = $form_data['text_position'];

            //check if there is image
            if($form_data['image_file_name'] == true){
                //check for image directory
                $path = public_path().'/about_us_image/';
                //delete existing image
                File::deleteDirectory($path);

                if(!File::exists($path)){
                    //recreate directory
                    File::makeDirectory($path, 0777);
                }

                $file_name = 'Nautica_o_nama';
                $file_extension = $form_data['image_file_name']->getClientOriginalExtension();
                $full_name = $file_name.'.'.$file_extension;
                $file_size = $form_data['image_file_name']->getSize();

                $form_data['image_file_name']->move($path, $full_name);

                $about_us->image_file_name = $full_name;
                $about_us->image_file_size = $file_size;
            }

            $about_us->save();
        }

        return Redirect::to('admin/o-nama')->with(['success' => 'Stranica je uspješno izmjenjena']);
    }

    /**
 * delete image from abut us section
 * @return mixed
 */
    public function deleteAboutUsImage()
    {
        $about_us = AboutUs::first();

        $path = public_path().'/about_us_image/';

        try {
            // delete from hard disk
            if (File::exists($path)) {
                //delete existing image
                File::deleteDirectory($path);
            }

            // update database
            $about_us->image_file_name = '';
            $about_us->image_file_size = '';
            $about_us->save();

            return Redirect::to('admin/o-nama')->with(['success' => 'Slika je uspješno obrisana']);
        }
        catch(Exception $e){
            return Redirect::to('admin/o-nama')->withErrors('Slika nije mogla biti obrisana');
        }
    }

    /**
     * show admin video gallery
     * @return mixed
     */
    public function showVideoGallery()
    {
        $video_gallery_data = VideoGallery::first();

        return View::make('admin.video-gallery')->with(['page_title' => 'Administracija',
                                                'video_gallery_data' => $video_gallery_data
        ]);
    }

    /**
     * add url to video gallery
     * @return mixed
     */
    public function updateVideoGallery()
    {
        $form_data = ['video_url' => e(Input::get('video_url'))];
        $token = Input::get('_token');

        //check if csrf token is valid
        if(Session::token() != $token){
            return Redirect::back()->withErrors('Nevažeći CSRF token!');
        }

        $validator = Validator::make($form_data, VideoGallery::$rules, VideoGallery::$messages);
        //check validation results and category if ok
        if($validator->fails()){
            return Redirect::back()->withErrors($validator->getMessageBag()->toArray())->withInput();
        }
        else{
            //only one record in database
            $check_data = VideoGallery::first();
            if($check_data == null){
                $video = new VideoGallery();
            }
            else{
                $video = $check_data;
            }
            $video->video_url = $form_data['video_url'];
            $video->save();
        }

        return Redirect::to('admin/video-galerija')->with(['success' => 'Stranica je uspješno izmjenjena']);
    }

    /**
     * delete url from video gallery
     * @return mixed
     */
    public function deleteVideoGalleryUrl()
    {
        $video_gallery = VideoGallery::first();
        $video_gallery->delete();

        return Redirect::to('admin/video-galerija')->with(['success' => 'Video je uspješno obrisan.']);
    }


    /**
     * show admin gallery
     * @return mixed
     */
    public function showImageGallery()
    {
        $image_gallery_data = Gallery::orderBy('id', 'DESC')->get();

        return View::make('admin.image-gallery')->with(['page_title' => 'Administracija',
                                                        'image_gallery_data' => $image_gallery_data
        ]);
    }

    /**
     * add images to image gallery
     * @return mixed
     */
    public function updateImageGallery()
    {
        $gallery_images = Input::file('image_gallery_images');
        $token = Input::get('_token');

        //check if csrf token is valid
        if(Session::token() != $token){
            return Redirect::back()->withErrors('Nevažeći CSRF token!');
        }

        //validate
        $error_list = null;
        if($gallery_images == true){
            foreach($gallery_images as $img){
                $validator_images = Validator::make(['images' => $img], Gallery::$rules, Gallery::$messages);
                if($validator_images->fails()){
                    $error_list = $validator_images->messages()->merge();
                }
            }
        }

        //check for errors
        if($error_list == null){
            //add new images
            if($gallery_images == true && $gallery_images[0] != null){
                //check for image directory
                $path = public_path().'/image_gallery_uploads/';
                $short_path = 'image_gallery_uploads';
                if(!File::exists($path)){
                    File::makeDirectory($path, 0777);
                }

                foreach($gallery_images as $img){
                    $file_name = 'Nautica_galerija_slika_'.Str::random(5);
                    $file_extension = $img->getClientOriginalExtension();
                    $full_name = $file_name.'.'.$file_extension;
                    $file_size = $img->getSize();

                    $file_uploaded = $img->move($path, $full_name);
                    $image_resize = Image::make($path.$full_name)->widen(600, function ($constraint) {
                                                                        $constraint->upsize();
                                                                        })->save();
                    if($file_uploaded){
                        $image = new Gallery;
                        $image->file_name = $full_name;
                        $image->file_size = $file_size;
                        $image->save();
                    }
                }


                //redirect on finish
                return Redirect::to('admin/galerija')->with(['success' => 'Slike uspješno dodane']);
            }
            else{
                return Redirect::to('admin/galerija')->withErrors('Nijedna slika nije odabrana');
            }
        }
        else{
            return Redirect::to('admin/galerija')->withErrors($error_list);
        }
    }

    /**
     * delete image from image gallery
     * @param null $id
     * @return mixed
     */
    public function deleteImageGalleryImage($id = null)
    {
        if($id == null){
            return Redirect::to('admin/galerija')->withErrors('Odabrana slika ne postoji');
        }
        else{
            // find image in database
            $image = Gallery::findOrFail($id);

            if($image){
                try{
                    File::delete(public_path().'/image_gallery_uploads/'.$image->file_name);
                    $image->delete();
                }
                catch(Exception $e){
                    return Redirect::to('admin/galerija')->withErrors('Slika nije mogla biti obrisana');
                }

                //redirect on finish
                return Redirect::to('admin/galerija')->with(['success' => 'Slika je uspješno obrisana']);
            }
            else{
                return Redirect::to('admin/galerija')->withErrors('odabrana slika ne postoji');
            }
        }
    }

}