<?php

namespace App\Domains\Auth\Http\Controllers\Backend\Affiliate;

use App\Domains\Auth\Models\Affilate;
use App\Domains\Auth\Services\PermissionService;
use App\Domains\Auth\Services\RoleService;
use App\Domains\Auth\Services\UserService;
use App\Domains\Auth\Services\AffiliateService;

/**
 * Class AffiliateController.
 */
class AffiliateController
{
    /**
     * @var AffiliateService
     */
    protected $affiliateService;

    /**
     * @var UserService
     */
    protected $userService;

    /**
     * @var RoleService
     */
    protected $roleService;

    /**
     * @var PermissionService
     */
    protected $permissionService;

    /**
     * AffiliateController constructor.
     *
     * @param  AffiliateService  $affiliateService
     * @param  UserService  $userService
     * @param  RoleService  $roleService
     * @param  PermissionService  $permissionService
     */
    public function __construct(AffiliateService $affiliateService, UserService $userService, RoleService $roleService, PermissionService $permissionService)
    {
        $this->affiliateService = $affiliateService;
        $this->userService = $userService;
        $this->roleService = $roleService;
        $this->permissionService = $permissionService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->affiliateService->loadFromFile();
        return view('backend.auth.affiliate.index');
    }

}
