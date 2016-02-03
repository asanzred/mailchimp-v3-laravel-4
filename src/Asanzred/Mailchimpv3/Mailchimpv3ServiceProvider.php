<?php namespace Asanzred\Mailchimpv3;

use Illuminate\Support\ServiceProvider;

class Mailchimpv3ServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('asanzred/mailchimpv3');

	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['mailchimpv3'] = $this->app->share(function($app){
			$apikey = \Config::get('mailchimpv3::config.apikey');
			
		    return new Mailchimp($apikey);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('mailchimpv3');
	}

}
