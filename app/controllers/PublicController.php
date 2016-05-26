<?php

class PublicController extends BaseController {

	/**
	 * CSRF validation on requests
	 */
	public function __construct()
	{
		$this->beforeFilter('crfs', ['on' => ['post', 'put', 'patch', 'delete']]);
	}

	/**
	 * show homepage
	 * @return mixed
	 */
	public function showHome()
	{
		return View::make('public.index')->with(['page_title' => 'Dobrodošli']);
	}

	/**
	 * show gallery
	 * @return mixed
	 */
	public function showGallery()
	{
		$image_gallery_data = Gallery::orderBy('id', 'DESC')->get();

		return View::make('public.image-gallery')->with(['page_title' => 'Galerija',
														'image_gallery_data' => $image_gallery_data
		]);
	}

	/**
	 * show about us
	 * @return mixed
	 */
	public function showAboutUs()
	{
		$about_us_data = AboutUs::first();

		if($about_us_data == null){
			$about_us_data['post_body'] = null;
			$about_us_data['image_file_name'] = null;
		}

		return View::make('public.about-us')->with(['page_title' => 'O nama',
													'about_us_data' => $about_us_data
        ]);
	}

	/**
	 * show contact
	 * @return mixed
	 */
	public function showContact()
	{
		return View::make('public.contact')->with(['page_title' => 'Kontakt']);
	}

	/**
	 * show info
	 * @return mixed
	 */
	public function showInfo()
	{
		return View::make('public.info')->with(['page_title' => 'Rute - Informacije']);
	}
}
