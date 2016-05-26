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
        return View::make('admin.index')->with(['page_title' => 'Administracija']);
    }

    /**
     * show admin about us
     * @return mixed
     */
    public function showAboutUs()
    {
        $about_us_data = AboutUs::first();

        if($about_us_data == null){
            $about_us_data['post_body'] = null;
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
        $form_data = ['post_body' => e(Input::get('post_body')), 'image_file_name' => Input::file('about_us_image')];
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

                $file_uploaded = $form_data['image_file_name']->move($path, $full_name);

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
        $about_us = AboutUS::first();

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
}