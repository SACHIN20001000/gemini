<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class AppBaseController extends Controller
{
    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Pet Parents API Documentation",
     *      description="L5 Swagger OpenApi description",
     *      @OA\Contact(
     *          email="admin@admin.com"
     *      ),
     *      @OA\License(
     *          name="Apache 2.0",
     *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *      )
     * )
     *
     * @OA\Server(
     *      url="http://3.132.243.209/api",
     *      description="Demo API Server"
     * )
     *
     * @OA\Tag(
     *     name="Pet Parents",
     *     description="API Endpoints of Pet Parents"
     * )
      * @OA\SecurityScheme(
     *       scheme="Bearer",
     *       securityScheme="Bearer",
     *       type="apiKey",
     *       in="header",
     *       name="Authorization",
     * )
     */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
