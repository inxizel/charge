<?php
 
namespace Zent\Permission\Providers;
 
use Illuminate\Support\ServiceProvider;
 
class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Function boot.
     *
     * @return here
     * @author ThanhTung
     */
    public function  boot() {

    }

	/*
	 * Funtion register
	 */
	
	public function register()
	{	
		/*
		 * Call routes in this modules
		 */
	    $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');

	    /*
	     * When call return view use: return view('permission: view-name');
	     */
	    $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'permission');

	    /*
	     * Call migrations in this modules
	     */
	    $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

	    /*
	     * Call translation
	     */
	}
}
